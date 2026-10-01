<?php

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');

$symbol = $_GET['symbol'] ?? 'GALLANTT.NS';
$period = $_GET['period'] ?? '5d';

$symbol = trim($symbol);
$period = strtolower(trim($period));

$displaySymbol = strtoupper($symbol);

// -------------------------------------------------------------
// CONFIGURATION
// -------------------------------------------------------------
$config = [
    '5d' => [
        'range'    => '5d',
        'interval' => '15m'
    ],
    '10d' => [
        'range'    => '1mo',
        'interval' => '1h'
    ],
    'weekly' => [
        'range'    => '1mo',
        'interval' => '1h'
    ],
    'monthly' => [
        'range'    => '3mo',
        'interval' => '1d'
    ],
    'yearly' => [
        'range'    => '1y',
        'interval' => '1d'
    ]
];

if (!isset($config[$period])) {
    $period = '5d';
}

$range    = $config[$period]['range'];
$interval = $config[$period]['interval'];

// -------------------------------------------------------------
// YAHOO HISTORICAL DATA FALLBACK FOR BSE
// -------------------------------------------------------------
// Yahoo does not keep multi-month daily candles under .BO for small caps,
// but full history exists under .NS. We query .NS for long historical trends
// and preserve the .BO live price.
$querySymbol = $symbol;
$isBse = (strtoupper($symbol) === 'GALLANTT.BO');

if ($isBse && in_array($period, ['monthly', 'yearly'])) {
    $querySymbol = 'GALLANTT.NS';
}

$url = 'https://query1.finance.yahoo.com/v8/finance/chart/' .
       rawurlencode($querySymbol) .
       '?range=' . rawurlencode($range) .
       '&interval=' . rawurlencode($interval) .
       '&events=history';

// -----------------------------
// CURL REQUEST
// -----------------------------
$ch = curl_init();

curl_setopt_array($ch, [
    CURLOPT_URL            => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_CONNECTTIMEOUT => 10,
    CURLOPT_TIMEOUT        => 20,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_HTTPHEADER     => [
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
        'Accept: application/json'
    ]
]);

$response  = curl_exec($ch);
$curlError = curl_error($ch);
$httpCode  = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($response === false || empty($response)) {
    echo json_encode([
        'success'    => false,
        'error'      => 'Yahoo API request failed',
        'curl_error' => $curlError,
        'http_code'  => $httpCode
    ]);
    exit;
}

$data = json_decode($response, true);

if (!isset($data['chart']['result'][0])) {
    echo json_encode([
        'success' => false,
        'error'   => 'No Yahoo Finance data found',
        'raw'     => $data
    ]);
    exit;
}

// -----------------------------
// PARSE YAHOO DATA
// -----------------------------
$result     = $data['chart']['result'][0];
$meta       = $result['meta'] ?? [];
$timestamps = $result['timestamp'] ?? [];
$prices     = $result['indicators']['quote'][0]['close'] ?? [];

$chartData = [];

foreach ($prices as $i => $price) {
    if ($price === null || !isset($timestamps[$i]) || !is_numeric($price)) {
        continue;
    }

    $timestamp = (int) $timestamps[$i];
    $date = new DateTime('@' . $timestamp);
    $date->setTimezone(new DateTimeZone('Asia/Kolkata'));

    $chartData[] = [
        'timestamp' => $timestamp,
        'date'      => $date->format('Y-m-d H:i:s'),
        'price'     => round((float) $price, 2)
    ];
}

// -----------------------------
// FILTER PERIOD
// -----------------------------
$totalPoints = count($chartData);

if ($period === '10d') {
    $slice = min($totalPoints, 70);
    $chartData = array_slice($chartData, -$slice);
} elseif ($period === 'weekly') {
    $slice = min($totalPoints, 35);
    $chartData = array_slice($chartData, -$slice);
} elseif ($period === 'monthly') {
    if ($totalPoints > 22) {
        $chartData = array_slice($chartData, -22);
    }
}
// For '5d' and 'yearly', do not slice.

$cleanPrices = array_column($chartData, 'price');
$dates       = array_column($chartData, 'date');

// If we used the fallback for BSE, fetch the live BSE quote price so the header shows the real BSE price
$latestPrice = $meta['regularMarketPrice'] ?? null;

if ($isBse) {
    // Keep exact BSE price if available from prices or meta
    $liveBseCh = curl_init();
    curl_setopt_array($liveBseCh, [
        CURLOPT_URL            => 'https://query1.finance.yahoo.com/v8/finance/chart/GALLANTT.BO?range=1d&interval=1m',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT        => 5,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTPHEADER     => ['User-Agent: Mozilla/5.0']
    ]);
    $liveBseRes = curl_exec($liveBseCh);
    curl_close($liveBseCh);

    if ($liveBseRes) {
        $liveBseJson = json_decode($liveBseRes, true);
        $bsePrice = $liveBseJson['chart']['result'][0]['meta']['regularMarketPrice'] ?? null;
        if ($bsePrice !== null) {
            $latestPrice = $bsePrice;
            if (!empty($cleanPrices)) {
                $cleanPrices[count($cleanPrices) - 1] = round((float) $bsePrice, 2);
            }
        }
    }
}

if ($latestPrice === null && !empty($cleanPrices)) {
    $latestPrice = end($cleanPrices);
}

// -----------------------------
// OUTPUT
// -----------------------------
echo json_encode([
    'success'       => true,
    'symbol'        => $displaySymbol, // Outputs "GALLANTT.BO" for your badge and header
    'period'        => $period,
    'range'         => $range,
    'interval'      => $interval,
    'price'         => $latestPrice !== null ? (float) $latestPrice : null,
    'previousClose' => $meta['previousClose'] ?? $meta['chartPreviousClose'] ?? null,
    'currency'      => $meta['currency'] ?? 'INR',
    'prices'        => $cleanPrices,
    'dates'         => $dates,
    'data_count'    => count($cleanPrices),
    'updated'       => date('Y-m-d H:i:s')
]);
exit;
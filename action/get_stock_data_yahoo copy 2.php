<?php

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');

$symbol = $_GET['symbol'] ?? 'GALLANTT.NS';

// Yahoo Finance chart API
$url = 'https://query1.finance.yahoo.com/v8/finance/chart/' .
       rawurlencode($symbol) .
       '?interval=1m&range=1d';

$ch = curl_init();

curl_setopt_array($ch, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_CONNECTTIMEOUT => 10,
    CURLOPT_TIMEOUT => 20,
    CURLOPT_HTTPHEADER => [
        'User-Agent: Mozilla/5.0',
        'Accept: application/json'
    ]
]);

$response = curl_exec($ch);

$curlError = curl_error($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);

if ($response === false || empty($response)) {
    echo json_encode([
        'success' => false,
        'error' => 'Yahoo request failed',
        'curl_error' => $curlError,
        'http_code' => $httpCode
    ]);
    exit;
}

$data = json_decode($response, true);

if (
    !isset($data['chart']['result'][0]) ||
    empty($data['chart']['result'][0])
) {
    echo json_encode([
        'success' => false,
        'error' => 'Invalid Yahoo Finance response',
        'http_code' => $httpCode,
        'response' => $response
    ]);
    exit;
}

$result = $data['chart']['result'][0];

$meta = $result['meta'] ?? [];

/*
 * THIS IS THE IMPORTANT VALUE
 *
 * Yahoo provides the latest available market price here.
 */
$latestPrice = $meta['regularMarketPrice'] ?? null;

/*
 * Fallback to intraday chart data if regularMarketPrice
 * is not available.
 */
if ($latestPrice === null) {

    $prices =
        $result['indicators']['quote'][0]['close'] ?? [];

    if (!empty($prices)) {

        for ($i = count($prices) - 1; $i >= 0; $i--) {

            if (
                isset($prices[$i]) &&
                $prices[$i] !== null
            ) {
                $latestPrice = $prices[$i];
                break;
            }
        }
    }
}

/*
 * Get intraday prices for chart/history if available
 */
$timestamps = $result['timestamp'] ?? [];

$prices =
    $result['indicators']['quote'][0]['close'] ?? [];

$cleanPrices = [];
$dates = [];

foreach ($prices as $i => $price) {

    if ($price === null) {
        continue;
    }

    $cleanPrices[] = (float)$price;

    if (isset($timestamps[$i])) {

        $dt = new DateTime(
            '@' . $timestamps[$i]
        );

        $dt->setTimezone(
            new DateTimeZone('Asia/Kolkata')
        );

        $dates[] = $dt->format('Y-m-d H:i:s');
    }
}

if ($latestPrice === null) {

    echo json_encode([
        'success' => false,
        'error' => 'No current price available from Yahoo',
        'symbol' => strtoupper($symbol),
        'meta' => $meta
    ]);

    exit;
}

$output = [
    'success' => true,
    'symbol' => strtoupper($symbol),

    // CURRENT / LATEST PRICE
    'price' => (float)$latestPrice,

    // Useful additional information
    'regularMarketPrice' => $meta['regularMarketPrice'] ?? null,
    'previousClose' => $meta['previousClose'] ?? null,
    'currency' => $meta['currency'] ?? 'INR',

    // Intraday data
    'prices' => $cleanPrices,
    'dates' => $dates,

    'updated' => date(
        'Y-m-d H:i:s',
        time()
    )
];

echo json_encode($output);

exit;
?>
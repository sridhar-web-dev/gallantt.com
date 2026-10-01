<?php
$symbol = $_GET['symbol'] ?? 'GALLANTT.NS';
$url = "https://query1.finance.yahoo.com/v8/finance/chart/$symbol?interval=1d&range=1mo";
$headers = [
    'User-Agent: Mozilla/5.0' // Required to prevent 403
];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$response = curl_exec($ch);
curl_close($ch);
$data = json_decode($response, true);
if (!isset($data['chart']['result'][0]['timestamp'])) {
    echo json_encode(['error' => 'Unable to fetch stock data.']);
    exit;
}
$timestamps = $data['chart']['result'][0]['timestamp'];
$prices = $data['chart']['result'][0]['indicators']['quote'][0]['close'];
$dates = array_map(function($ts) {
    return date('Y-m-d', $ts);
}, $timestamps);
echo json_encode([
    'dates' => $dates,
    'prices' => $prices,
    'symbol' => strtoupper($symbol)
]);

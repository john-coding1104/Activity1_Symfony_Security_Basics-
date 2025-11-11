<?php
$opts = [
    'http' => [
        'method' => 'GET',
        'header' => "Authorization: Basic " . base64_encode('admin:adminpass') . "\r\n",
        'ignore_errors' => true,
    ]
];
$context = stream_context_create($opts);
$url = 'http://127.0.0.1:8002/dashboard';
$response = @file_get_contents($url, false, $context);
if ($response === false) {
    echo "Request failed.\n";
    var_export($http_response_header ?? null);
} else {
    echo "--- RESPONSE BODY ---\n";
    echo $response;
    echo "\n--- RESPONSE HEADERS ---\n";
    var_export($http_response_header);
}

<?php

$ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];

$data = [
    'request_uri' => $_SERVER['REQUEST_URI'],
    'request_method' => $_SERVER['REQUEST_METHOD'],
    'request_user_agent' => $_SERVER['HTTP_USER_AGENT'],
    'request_ip' => $ip,
    'request_date' => date("d/m/Y H:i:s"),
];

$logFile = isset($_ENV["LOG_FILE"]) ? $_ENV["LOG_FILE"] : 'log.txt';
file_put_contents($logFile, json_encode($data)."\n", FILE_APPEND);

echo "OK";
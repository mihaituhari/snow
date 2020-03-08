<?php declare(strict_types=1);

require_once __DIR__ . '/init.php';

/*
 * Proxy unsecure webcam URLs.
 */

/** @var string|null $url */
$url = $_GET['url'] ?? null;

if (!$url) {
    http_response_code(404);
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
$data = curl_exec($ch);
curl_close($ch);

echo $data;

<?php declare(strict_types=1);

require_once __DIR__ . '/init.php';

/** @var string|null $imageUrl */
$imageUrl = $_GET['url'] ?? null;

/** @var string|null $refererKey */
$refererKey = $_GET['referer'] ?? null;

if (!$imageUrl || !$refererKey) {
    http_response_code(404);
}

/** @var string|null $referer */
$referer = $referers[$refererKey] ?? null;

if (!$referer) {
    http_response_code(412);
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $imageUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_REFERER, $referer);
$image = curl_exec($ch);

header('Content-type: image/jpeg');

echo $image;
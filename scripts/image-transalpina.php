<?php declare(strict_types=1);

require_once __DIR__ . '/libs.php';

/** @var string|null $imageUrl */
$imageUrl = $_GET['url'] ?? null;

if (!$imageUrl) {
    http_response_code(404);
}

/** @var string $referer */
$referer = 'https://www.trans-alpina.ro/?page_id=343';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $imageUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_REFERER, $referer);
$image = curl_exec($ch);

header('Content-type: image/jpeg');

echo $image;
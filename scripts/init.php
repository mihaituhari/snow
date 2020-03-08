<?php declare(strict_types=1);

require_once __DIR__ . '/libs.php';

/*
 * Data setup.
 */

/** @var array $resorts */
$resorts = [
    [
        'name' => 'Sinaia',
        'meteoblue_id' => 'furnica_românia_677759',
        'webcams' => 'sinaia',
    ],
    [
        'name' => 'Poiana Brașov',
        'meteoblue_id' => 'poiana-brasov_românia_6693026',
        'webcams' => 'poiana-brasov',
    ],
    [
        'name' => 'Predeal',
        'meteoblue_id' => 'predeal_românia_669704',
        'webcams' => 'predeal',
    ],
];

/*
 * Initializer.
 */

/**
 * Force HTTPs and nonWWW on live site.
 */
if (!isLocal()) {
    if (!isHTTPs() || isWWW()) {
        header('Location: ' . str_replace(['http://', 'www.'], ['https://', ''], baseUrl()));
        exit;
    }
}
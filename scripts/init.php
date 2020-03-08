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
    // Disabled because the webcams are HTTP and cannot be loaded
//    [
//        'name' => 'Straja',
//        'meteoblue_id' => 'straja_romania_666019',
//        'webcams' => 'straja',
//    ],
    [
        'name' => 'Transalpina',
        'meteoblue_id' => 'transalpina_romania_8236900',
        'webcams' => 'transalpina',
    ],
];

/**
 * These are used for fetching the images via proxy request.
 *
 * @var array $referers
 */
$referers = [
    'poiana-brasov' => 'https://www.freecam.ro/partii-de-schi/partia-de-schi-poiana-brasov',
    'transalpina' => 'https://www.trans-alpina.ro/?page_id=343',
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

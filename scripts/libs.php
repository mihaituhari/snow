<?php declare(strict_types=1);

/**
 * Debug data.
 *
 * @param mixed $debug
 */
function dd($debug)
{
    print '<pre>';
    print_r($debug);
    exit;
}

/**
 * Get full base URL of website.
 *
 * @return string
 */
function baseUrl()
{
    return 'https://' . "{$_SERVER['HTTP_HOST']}/";
}

/**
 * Check if URL is local.
 *
 * @return bool
 */
function isLocal()
{
    return substr_count(baseUrl(), 'local') ? true : false;
}

/**
 * Check if URL is with www.
 *
 * @return bool
 */
function isWWW()
{
    return substr_count(baseUrl(), 'www') ? true : false;
}

/**
 * Check if URL is HTTPs.
 *
 * @return bool
 */
function isHTTPs()
{
    $isSecure = false;

    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
        $isSecure = true;
    } elseif ((!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') || (!empty($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] === 'on')) {
        $isSecure = true;
    }

    return $isSecure;
}

/**
 * Timestamp of last modified time for CSS file.
 *
 * @return string
 */
function cssTimestamp()
{
    $path = __DIR__ . implode(DIRECTORY_SEPARATOR, ['', '..', 'static', 'css', 'index']) . '.css';

    return filemtime($path);
}

/**
 * Timestamp of last modified time for JS file.
 *
 * @return string
 */
function jsTimestamp()
{
    $path = __DIR__ . implode(DIRECTORY_SEPARATOR, ['', '..', 'static', 'css', 'index']) . '.css';

    return filemtime($path);
}

/**
 * Generate embed URL for Meteoblue.
 *
 * @param string $id
 *
 * @return string
 */
function getMeteoblueEmbedUrl(string $id): string
{
    /** @var string $url */
    $url = "https://www.meteoblue.com/ro/vreme/widget/daily/{$id}?";

    /** @var array $options */
    $options = [
        'geoloc' => 'fixed',
        'days' => '7',
        'tempunit' => 'CELSIUS',
        'windunit' => 'KILOMETER_PER_HOUR',
        'precipunit' => 'MILLIMETER',
        'coloured' => 'coloured', // coloured, monochrome
        'pictoicon' => '1',
        'maxtemperature' => '1',
        'mintemperature' => '1',
        'windspeed' => '1',
        'windgust' => '0',
        'winddirection' => '0',
        'uv' => '0',
        'humidity' => '0',
        'precipitation' => '1',
        'precipitationprobability' => '1',
        'spot' => '0',
        'pressure' => '0',
        'layout' => 'light', // light, dark
    ];

    return $url . http_build_query($options);
}

/**
 * Generate forecast URL for Meteoblue.
 *
 * @param string $id
 *
 * @return string
 */
function getMeteoblueForecastUrl(string $id): string
{
    /** @var string $url */
    $url = "https://www.meteoblue.com/ro/vreme/săptămâna/{$id}?";

    $options = [
        'utm_source' => 'weather_widget',
        'utm_medium' => 'linkus',
        'utm_content' => 'daily',
        'utm_campaign' => 'Weather%2BWidget',
    ];

    return $url . http_build_query($options);
}

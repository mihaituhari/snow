<?php require_once __DIR__ . '/scripts/init.php';?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>snow</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
    <meta content="en" name="language"/>
    <meta content="snow" name="title"/>
    <meta content="#gooutandexplore" name="description" property="og:description"/>
    <meta content="noindex,nofollow" name="robots"/>
    <meta content="snow" property="og:title"/>
    <meta content="website" property="og:type"/>
    <meta content="<?php echo baseUrl() ?>" property="og:url"/>
    <meta content="<?php echo baseUrl() ?>static/images/cover.png" property="og:image"/>
    <meta content="snow.tuhari.ro" property="og:site_name"/>

    <link href="https://fonts.googleapis.com/css?family=Rubik:300" rel="stylesheet">
    <link href="/static/css/index.css?v=<?php echo cssTimestamp() ?>" rel="stylesheet" type="text/css"/>

    <link rel="apple-touch-icon" sizes="57x57" href="/static/images/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/static/images/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/static/images/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/static/images/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/static/images/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/static/images/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/static/images/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/static/images/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/static/images/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/static/images/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/static/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/static/images/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/static/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="/static/images/favicon/manifest.json">
    <link rel="canonical" href="https://snow.tuhari.ro/"/>
    <meta name="msapplication-TileColor" content="#547F8E">
    <meta name="msapplication-TileImage" content="/static/images/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#547F8E">
</head>
<body>

<main>
    <div class="tabset">
        <?php
        /** @var array $resort */
        foreach ($resorts as $i => $resort) {
            ?>
            <input type="radio" name="tabset" id="tab<?php echo $i; ?>" aria-controls="<?php echo $i ?>" <?php echo($i === 0 ? 'checked' : '') ?>>
            <label for="tab<?php echo $i; ?>"><?= $resort['name'] ?></label>
            <?php
        }
        ?>

        <div class="tab-panels">
            <?php
            /**
             * @var int $i
             * @var array $resort
             */
            foreach ($resorts as $i => $resort) {
                ?>
                <section id="<?php echo $i ?>" class="tab-panel">
                    <div class="weather">
                        <div class="box">
                            <iframe src="<?php echo getMeteoblueEmbedUrl($resort['meteoblue_id']) ?>" frameborder="0" scrolling="no" allowtransparency="true"></iframe>
                        </div>
                    </div>
                    <div class="webcams">
                        <?php require_once __DIR__ . '/webcams/' . $resort['webcams'] . '.php' ?>
                    </div>
                </section>
                <?php
            }
            ?>
        </div>
    </div>
</main>

<script type="text/javascript" src="/static/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="/static/js/main.js?v=<?php echo jsTimestamp() ?>"></script>

</body>
</html>

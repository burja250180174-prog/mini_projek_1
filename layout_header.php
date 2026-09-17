<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= defined("APP_NAME") ? APP_NAME : "Katalog Produk" ?> - Pemrograman Web</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Header Navigasi / Identitas Sistem -->
    <header class="header-wrapper">
        <div class="container">
            <div class="header-content">
                <div class="brand-badge">
                    <div class="brand-logo">P</div>
                    <div class="brand-text">
                        <h1><?= defined("APP_NAME") ? APP_NAME : "Product Information System" ?></h1>
                        <p><?= defined("NAMA_MATA_KULIAH") ? NAMA_MATA_KULIAH : "Mata Kuliah Pemrograman Web" ?></p>
                    </div>
                </div>
                <div class="header-meta">
                    <span class="version-pill">v<?= defined("APP_VERSION") ? APP_VERSION : "1.0.0" ?></span>
                </div>
            </div>
        </div>
    </header>

    <main class="container">

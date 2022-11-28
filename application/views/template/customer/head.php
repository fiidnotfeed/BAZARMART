<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/bootstrap-5.2.2/css/bootstrap.min.css') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm mb-3">
        <div class="container">
            <a class="navbar-brand" href="#">Bazar-Mart</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link <?= $title == "Home" ? "active" : ""; ?>"
                            href="<?= base_url("/"); ?>">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Kategori
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                            <?php if ($category) : ?>
                            <?php foreach ($category as $c) : ?>
                            <li><a class="dropdown-item"
                                    href="<?= base_url("produk/kategori/" . $c["id_category"]); ?>"><i
                                        class="fas fa-bookmark"></i>
                                    <?= $c['category_name']; ?></a>
                            </li>
                            <?php endforeach ?>
                            <?php else : ?>
                            <p>Kategori tidak ada</p>
                            <?php endif ?>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $title == "Pesanan" || $title == "Detail Pesanan" ? "active" : ""; ?>"
                            href="<?= base_url("customer/pesanan"); ?>">Pesanan</a>
                    </li>
                    <?php if ($this->session->userdata("email")) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url("auth/logout"); ?>">Logout</a>
                    </li>
                    <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url("auth"); ?>">Login</a>
                    </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>
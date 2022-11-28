<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?= base_url('assets/plugins/bootstrap-5.2.2/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/trix.css') ?>">
    <title><?= $title; ?></title>
</head>

<body>
    <header class="navbar navbar-dark sticky-top bg-primary flex-md-nowrap shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Dashboard</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <form action="/logout" method="post">
                    <a href="<?= base_url("auth/logout"); ?>" class="nav-link px-3 bg-primary border-0 text-white">
                        Logout</a>
                </form>
            </div>
        </div>
    </header>
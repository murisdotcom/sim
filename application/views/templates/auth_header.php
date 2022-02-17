<!DOCTYPE html>
<!--<html><head></head><body></body></html>-->
<html lang="id">

<head>
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/bootstrap.min.css">

    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style.css?">
    <!-- <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery-3.3.1.min.js"></script> -->
    <script src="<?= base_url('assets/'); ?>js/bootstrap.min.js"></script>
    <div id="main" style="margin-left: 0px;">
        <header style="margin:-20px;margin-bottom:20px;">
            <div class="container-fluid" style="background-color:#031a40;">
                <div class="row top-header">
                    <div class="pull-left" style="padding-left:20px;"><strong><?= date('D, d F Y'); ?></strong></div>
                </div>
                <div class="container">
                    <div class="row middle-header">
                        <div class="col-xs-12">
                            <div class="img">
                                <img src="<?= base_url('assets/img/Logo Unbaja.png'); ?>" height="" width="70">
                            </div>
                            <div class="text">
                                <h3>Sistem Informasi Administrasi Perpustakaan</h3>
                                <span>UNIVERSITAS BANTEN JAYA</span>
                            </div>
                        </div>
                        <div class="clearfix"></div>

                    </div>
                </div>
                <div class="row">
                    <div id="bordertop"></div>
                </div>
                <div class="row top-nav" style="background-color:#031a40;">
                    <div class="container">
                        <ul class="nav">
                            <li class="nav-item">
                                <a href="<?= base_url('auth'); ?>"><i class="fas fa-fw fa-home"></i>Home</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </header>
</head>

<body>
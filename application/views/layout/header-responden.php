<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?> - Website Survey Kepuasan Masyarakat Salatiga</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css');?>">

    <link rel="stylesheet" href="<?= base_url('assets/vendors/iconly/bold.css');?>">

    <link rel="stylesheet" href="<?= base_url('assets/vendors/perfect-scrollbar/perfect-scrollbar.css');?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/bootstrap-icons/bootstrap-icons.css');?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/app.css');?>">
    <link rel="shortcut icon" href="<?= base_url('assets/images/favicon.svg');?>" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="main" class="layout-horizontal">
            <header class="mb-5">
                <!-- <div class="header-top">
                    <div class="container">
                       
                        <div class="header-top-right">


                            <a href="#" class="burger-btn d-block d-xl-none">
                                <i class="bi bi-justify fs-3"></i>
                            </a>
                        </div>
                    </div>
                </div> -->
                <nav class="main-navbar">
                    <div class="container">
                        <ul>

                            <li class="menu-item  ">
                                <a href="<?php echo base_url('login'); ?>" class='menu-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Login Admin</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </nav>

            </header>

            <div class="content-wrapper container">

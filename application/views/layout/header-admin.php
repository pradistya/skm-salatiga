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
    <link rel="stylesheet" href="<?= base_url('assets/vendors/simple-datatables/style.css'); ?>">

    <link rel="stylesheet" href="<?= base_url('assets/vendors/perfect-scrollbar/perfect-scrollbar.css');?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/bootstrap-icons/bootstrap-icons.css');?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/app.css');?>">
    <link rel="shortcut icon" href="<?= base_url('assets/images/favicon.svg');?>" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <!-- <a href="index.html"><img src="<?= base_url('assets/images/logo/logo.png');?>" alt="Logo" srcset=""></a> -->
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item  ">
                            <a href="<?php echo base_url('dashboard'); ?>" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Data Master</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="<?php echo base_url('odp'); ?>">Kelola OPD</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="<?php echo base_url('pelayanan'); ?>">Kelola Pelayanan</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="<?php echo base_url('users'); ?>">Kelola User</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="<?php echo base_url('kuisioner'); ?>" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>Kelola Kuisioner</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="<?php echo base_url('result'); ?>" class='sidebar-link'>
                                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                <span>Hasil Kuisioner</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="<?php echo base_url('users/profil'); ?>" class='sidebar-link'>
                                <i class="bi bi-person-badge-fill"></i>
                                <span>Setting Profile</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="<?php echo base_url('login/logout'); ?>" class='sidebar-link'>
                                <svg class="bi" width="1em" height="1em" fill="currentColor">
                                                <use
                                                    xlink:href="<?= base_url('assets/vendors/bootstrap-icons/bootstrap-icons.svg#arrow-bar-left');?>" />
                                            </svg>
                                <span>Logout</span>
                            </a>
                        </li>
                        
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3><?php echo $title; ?></h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
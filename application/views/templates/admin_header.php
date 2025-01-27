<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    <?= $title; ?>
  </title>
  <!-- Favicon -->
  <link href="<?= base_url('assets/'); ?>img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="<?= base_url('assets/'); ?>js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="<?= base_url('assets/'); ?>js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="<?= base_url('assets/'); ?>css/argon-dashboard.css?v=1.1.0" rel="stylesheet" />
  <!-- CUSTOM CSS -->
  <link href="<?= base_url('assets/'); ?>css/tables.css" rel="stylesheet" />
</head>

<?php
$admin = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
?>

<body class="">
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-default text-light" id="sidenav-main ">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="<?= base_url('admin'); ?>">
        <img src="<?= base_url('assets/'); ?>img/logo.png" class="navbar-brand-img" alt="...">
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="<?= base_url('assets/'); ?>img/theme/team-1-800x800.jpg
">
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
            <a href="<?= base_url('admin/myProfile'); ?>" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>My profile</span>
            </a>
            <a href="<?= base_url('admin/settings'); ?>" class="dropdown-item">
              <i class="ni ni-settings-gear-65"></i>
              <span>Settings</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?= base_url('auth/logout'); ?>" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </a>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse bg-default" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="#">
                <img src="<?= base_url('assets/'); ?>img/logo.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended bg-light" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form>
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item text-light">
            <a class="nav-link" href="<?= base_url('admin'); ?>"> <i class="ni ni-tv-2 text-primary"></i>
              <span class="text-light">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/users'); ?>">
              <i class="ni ni-single-02 text-blue"></i><span class="text-light">Users</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/orders'); ?>">
              <i class="ni ni-chart-bar-32 text-orange"></i><span class="text-light">Orders</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="<?= base_url('admin/products'); ?>">
              <i class="ni ni-books text-yellow"></i><span class="text-light">Products</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="<?= base_url('admin/invoices'); ?>">
              <i class="ni ni-money-coins text-green"></i><span class="text-light">Invoices / Transactions</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/reports'); ?>">
              <i class="ni ni-chart-pie-35 text-red"></i><span class="text-light">Reports</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" href="#navbar-tables" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-tables">
              <i class="ni ni-align-left-2 text-default"></i>
              <span class="nav-link-text text-light">Tables</span>
            </a>
            <div class="collapse" id="navbar-tables">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="../../pages/tables/tables.html" class="nav-link">
                    <span class="sidenav-normal text-light"> Tables </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
        <!-- Divider -->
        <hr class="my-3 bg-light">
        <!-- Heading -->
        <!-- Navigation -->
        <ul class="navbar-nav mb-md-3">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/help'); ?>">
              <i class="ni ni-support-16 text-danger"></i><span class="text-light">Help</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/settings'); ?>">
              <i class="ni ni-settings-gear-65 text-gray"></i><span class="text-light">Settings</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
              <i class="ni ni-user-run text-danger"></i><span class="text-light">Logout</span>
            </a>
          </li>
        </ul>
        <small class="text-center mt-3">Version 0.1.0</small>
      </div>
    </div>
  </nav>
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Form -->
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
          <div class="form-group mb-0">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
              </div>
              <input class="form-control" placeholder="Search" type="text">
            </div>
          </div>
        </form>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="<?= base_url('assets/'); ?>img/theme/team-1-800x800.jpg">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold"><?= $admin['name']; ?></span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <a href="<?= base_url('admin/myProfile'); ?>" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My profile</span>
              </a>
              <a href="<?= base_url('admin/settings'); ?>" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>Settings</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?= base_url('auth/logout'); ?>" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
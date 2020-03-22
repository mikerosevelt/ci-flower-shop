<!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-default" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header d-flex align-items-center">
        <a class="navbar-brand" href="#">
          <img src="<?= base_url('assets/'); ?>img/logo.png" class="navbar-brand-img" alt="...">
        </a>
        <div class=" ml-auto ">
          <!-- Sidenav toggler -->
          <div class="sidenav-toggler d-none d-xl-block sidenav-toggler-dark" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse bg-default" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('admin') ?>" role="button" aria-controls="navbar-dashboards">
                <i class="ni ni-shop text-primary"></i>
                <span class="nav-link-text text-light">Dashboards</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('admin/users'); ?>">
                <i class="ni ni-single-02 text-blue"></i>
                <span class="nav-link-text text-light">Users</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('admin/orders'); ?>">
                <i class="ni ni-chart-bar-32 text-orange"></i>
                <span class="nav-link-text text-light">Orders</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="<?= base_url('admin/products'); ?>">
                <i class="ni ni-books text-yellow"></i>
                <span class="nav-link-text text-light">Products</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="<?= base_url('admin/invoices'); ?>">
                <i class="ni ni-money-coins text-green"></i>
                <span class="nav-link-text text-light">Invoices / Transactions</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('admin/reports'); ?>">
                <i class="ni ni-chart-pie-35 text-red"></i>
                <span class="nav-link-text text-light">Reports</span>
              </a>
            </li>
            <!-- <li class="nav-item">
            <a class="nav-link" href="#navbar-maps" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-maps">
              <i class="ni ni-map-big text-primary"></i>
              <span class="nav-link-text">Maps</span>
            </a>
            <div class="collapse" id="navbar-maps">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="../../pages/maps/google.html" class="nav-link">
                    <span class="sidenav-mini-icon"> G </span>
                    <span class="sidenav-normal"> Google </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../pages/maps/vector.html" class="nav-link">
                    <span class="sidenav-mini-icon"> V </span>
                    <span class="sidenav-normal"> Vector </span>
                  </a>
                </li>
              </ul>
            </div>
          </li> -->
          </ul>
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          <!-- <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Documentation</span>
            <span class="docs-mini">D</span>
          </h6> -->
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('admin/help'); ?>">
                <i class="ni ni-support-16 text-danger"></i>
                <span class="nav-link-text text-light">Help</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('admin/settings'); ?>">
                <i class="ni ni-settings-gear-65 text-gray"></i>
                <span class="nav-link-text text-light">Settings</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
                <i class="ni ni-user-run text-danger"></i>
                <span class="nav-link-text text-light">Logout</span>
              </a>
            </li>
          </ul>
          <small class="text-center mt-3">Version 0.1.0</small>
        </div>
      </div>
    </div>
  </nav>
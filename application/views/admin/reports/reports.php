<!-- Header -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('swal'); ?>"></div>
<div class="header bg-default pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <!-- Card stats -->
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Reports overview</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Dashboards</a></li>
              <li class="breadcrumb-item active" aria-current="page">Reports</li>
            </ol>
          </nav>
        </div>
        <div class="col-lg-6 col-5 text-right">
          <a href="#" class="btn btn-sm btn-neutral">Generate report</a>
          <!-- <a href="#" class="btn btn-sm btn-neutral">Filters</a> -->
        </div>
      </div>
      <!-- Card stats -->

    </div>
  </div>
</div>
<div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-8">
          <div class="card bg-default">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-light text-uppercase ls-1 mb-1">Overview</h6>
                  <h5 class="h3 text-white mb-0">Sales value</h5>
                </div>
                <div class="col">
                  <ul class="nav nav-pills justify-content-end">
                    <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales-dark" data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}' data-prefix="$" data-suffix="k">
                      <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                        <span class="d-none d-md-block">Month</span>
                        <span class="d-md-none">M</span>
                      </a>
                    </li>
                    <li class="nav-item" data-toggle="chart" data-target="#chart-sales-dark" data-update='{"data":{"datasets":[{"data":[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}' data-prefix="$" data-suffix="k">
                      <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                        <span class="d-none d-md-block">Week</span>
                        <span class="d-md-none">W</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">
                <!-- Chart wrapper -->
                <canvas id="chart-sales-dark" class="chart-canvas"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4">
          <div class="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
                  <h5 class="h3 mb-0">Total orders</h5>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">
                <canvas id="chart-bars" class="chart-canvas"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-12">
          <div class="row">
            <div class="col">
              <div class="card shadow bg-default">
                <!-- Card header -->
                <div class="card-header border-0 bg-default">
                  <div class="row align-items-center">
                    <div class="col">
                      <h3 class="mb-0 text-light">Recent Orders</h3>
                    </div>
                    <div class="col text-right">
                      <a href="<?= base_url('admin/users'); ?>" class="mb-0 btn btn-sm btn-primary">See all orders</a>
                    </div>
                  </div>
                </div>
                <div class="table-responsive mb-3">
                  <table class="table align-items-center table-hover table-dark">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Total Order</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
<!--                     <tbody class="list">
                      <?php foreach ($list as $l) : ?>
                    <tr>
                      <th scope="row">
                        <?= $l['name']; ?>
                      </th>
                      <td>
                        <?= $l['email']; ?>
                      </td>
                      <td>
                        <?= $l['role']; ?>
                      </td>
                      <td>
                        <?= time_ago($l['last_login']) ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                    </tbody> -->
                  </table>
                </div>
              </div>
            </div>
          </div>
      <div class="row">
        <div class="col-xl-4">
          <!-- Members list group card -->
          <div class="card">
            <!-- Card header -->
            <div class="card-header">
              <!-- Title -->
              <h5 class="h3 mb-0">Admin members</h5>
            </div>
            <!-- Card body -->
            <div class="card-body">
              <!-- List group -->
              <ul class="list-group list-group-flush list my--3">
                <li class="list-group-item px-0">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <!-- Avatar -->
                      <a href="#" class="avatar rounded-circle">
                        <img alt="Image placeholder" src="<?= base_url('assets/'); ?>img/theme/team-1-800x800.jpg">
                      </a>
                    </div>
                    <div class="col ml--2">
                      <h4 class="mb-0">
                        <a href="#!">John Michael</a>
                      </h4>
                      <span class="text-success">●</span>
                      <small>Online</small>
                    </div>
                    <div class="col-auto">
                      <!-- <button type="button" class="btn btn-sm btn-primary">Chat</button> -->
                      <a href="" class="btn btn-sm btn-primary">
                        <i class="ni ni-email-83"></i>
                      </a>
                    </div>
                  </div>
                </li>
                
              </ul>
            </div>
          </div>
        </div>
        <div class="col-xl-4">
          <!-- Checklist -->
          <div class="card shadow bg-default">
            <!-- Card header -->
            <div class="card-header bg-default">
              <!-- Title -->
              <div class="row align-items-center">
                    <div class="col">
                      <h3 class="mb-0 text-light">To Do List</h3>
                    </div>
                    <div class="col text-right">
                      <a href="#" class="mb-0 btn btn-sm btn-primary">
                        <i class="ni ni-fat-add"></i></a>
                    </div>
                  </div>
            </div>
            <!-- Card body -->
            <div class="card-body p-0 bg-default">
              <!-- List group -->
              <ul class="list-group list-group-flush" data-toggle="checklist">
                <li class="checklist-entry list-group-item flex-column align-items-start py-4 px-4 bg-default">
                  <div class="checklist-item checklist-item-info">
                    <div class="checklist-info">
                      <h5 class="checklist-title mb-0 text-white">Call with Dave</h5>
                      <small class="text-light">10:30 AM</small>
                    </div>
                    <div>
                      <div class="custom-control custom-checkbox custom-checkbox-info">
                        <input class="custom-control-input" id="chk-todo-task-1" type="checkbox" checked>
                        <label class="custom-control-label" for="chk-todo-task-1"></label>
                      </div>
                    </div>
                  </div>
                </li>
                
              </ul>
            </div>
          </div>
        </div>
        <div class="col-xl-4">
          <!-- Progress track -->
          <div class="card">
            <!-- Card header -->
            <div class="card-header">
              <!-- Title -->
              <h5 class="h3 mb-0">Progress track</h5>
            </div>
            <!-- Card body -->
            <div class="card-body">
              <!-- List group -->
              <ul class="list-group list-group-flush list my--3">
                <li class="list-group-item px-0">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <!-- Avatar -->
                      <a href="#" class="avatar rounded-circle">
                        <img alt="Image placeholder" src="<?= base_url('assets/'); ?>img/theme/bootstrap.jpg">
                      </a>
                    </div>
                    <div class="col">
                      <h5>Argon Design System</h5>
                      <div class="progress progress-xs mb-0">
                        <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                      </div>
                    </div>
                  </div>
                </li>
                
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-12">
          <div class="row">
            <div class="col">
              <div class="card shadow bg-default">
                <!-- Card header -->
                <div class="card-header border-0 bg-default">
                  <div class="row align-items-center">
                    <div class="col">
                      <h3 class="mb-0 text-light">Recent Activities</h3>
                    </div>
                    <div class="col text-right">
                      <a href="<?= base_url('admin/users'); ?>" class="mb-0 btn btn-sm btn-primary">See all users</a>
                    </div>
                  </div>
                </div>
                <div class="table-responsive mb-3">
                  <table class="table align-items-center table-hover table-dark" id="datatable-basic">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Last Login</th>
                      </tr>
                    </thead>
<!--                     <tbody class="list">
                      <?php foreach ($list as $l) : ?>
                    <tr>
                      <th scope="row">
                        <?= $l['name']; ?>
                      </th>
                      <td>
                        <?= $l['email']; ?>
                      </td>
                      <td>
                        <?= $l['role']; ?>
                      </td>
                      <td>
                        <?= time_ago($l['last_login']) ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                    </tbody> -->
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="card-deck">
            <div class="card bg-gradient-default col-md-6">
              <div class="card-body">
                <div class="mb-2">
                  <sup class="text-white">$</sup> <span class="h2 text-white">3,300</span>
                  <div class="text-light mt-2 text-sm">Your current balance</div>
                  <div>
                    <span class="text-success font-weight-600">+ 15%</span> <span class="text-light">($250)</span>
                  </div>
                </div>
                <button class="btn btn-sm btn-block btn-neutral">Add credit</button>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <small class="text-light">Orders: 60%</small>
                    <div class="progress progress-xs my-2">
                      <div class="progress-bar bg-success" style="width: 60%"></div>
                    </div>
                  </div>
                  <div class="col"><small class="text-light">Sales: 40%</small>
                    <div class="progress progress-xs my-2">
                      <div class="progress-bar bg-warning" style="width: 40%"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="card bg-default">
              <div class="card-body">
                <div class="row justify-content-between align-items-center">
                  <div class="col">
                    <img src="<?= base_url('assets/'); ?>img/icons/cards/bitcoin.png" alt="" />
                  </div>
                  <div class="col-auto">
                    <span class="badge badge-lg badge-success">Active</span>
                  </div>
                </div>
                <div class="my-4">
                  <span class="h6 surtitle text-light">
                    Username
                  </span>
                  <div class="h1 text-white">@johnsnow</div>
                </div>
                <div class="row">
                  <div class="col">
                    <span class="h6 surtitle text-light">Name</span>
                    <span class="d-block h3 text-white">John Snow</span>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
<!-- Header -->
<div class="header pb-8 pt-5 pt-md-8 bg-default">
<div class="container-fluid">
  <div class="header-body">
    <!-- Card stats -->
    <div class="row">
      <div class="col-xl-3 col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0 bg-light">
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">Orders</h5>
                <span class="h2 font-weight-bold mb-0"><?= $totalorder; ?></span>
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                  <i class="fas fa-chart-bar"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0 bg-light">
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">Products</h5>
                <span class="h2 font-weight-bold mb-0"><?= $totalproduct; ?></span>
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                  <i class="fas fa-chart-pie"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0 bg-light">
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">Users</h5>
                <span class="h2 font-weight-bold mb-0"><?= $total; ?></span>
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                  <i class="fas fa-users"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0 bg-light">
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">Visitors</h5>
                <span class="h2 font-weight-bold mb-0">0</span>
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                  <i class="fas fa-percent"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<div class="container-fluid mt--7 bg-default">
  <div class="row">
  <div class="col-xl mb-5 mb-xl-0">
    <div class="card bg-gradient-default shadow">
      <div class="card-header bg-transparent">
        <div class="row align-items-center">
          <div class="col">
            <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
            <h2 class="text-white mb-0">Sales value</h2>
          </div>
          <div class="col">
            <ul class="nav nav-pills justify-content-end">
              <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales" data-update="{&quot;data&quot;:{&quot;datasets&quot;:[{&quot;data&quot;:[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}" data-prefix="$" data-suffix="k">
                <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                  <span class="d-none d-md-block">Month</span>
                  <span class="d-md-none">M</span>
                </a>
              </li>
              <li class="nav-item" data-toggle="chart" data-target="#chart-sales" data-update="{&quot;data&quot;:{&quot;datasets&quot;:[{&quot;data&quot;:[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}" data-prefix="$" data-suffix="k">
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
        <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
          <!-- Chart wrapper -->
          <canvas id="chart-sales" class="chart-canvas chartjs-render-monitor" width="414" height="350" style="display: block; width: 414px; height: 350px;"></canvas>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4">
    <div class="card shadow bg-gradient-default">
      <div class="card-header bg-transparent">
        <div class="row align-items-center">
          <div class="col">
            <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
            <h2 class="mb-0 text-white">Total orders</h2>
          </div>
        </div>
      </div>
      <div class="card-body">
        <!-- Chart -->
        <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
          <canvas id="chart-orders" class="chart-canvas chartjs-render-monitor" width="414" height="350" style="display: block; width: 414px; height: 350px;"></canvas>
        </div>
      </div>
    </div>
  </div>
<div class="row mt-5 mx-auto col-lg">
  <div class="col-xl mb-5 mb-xl-0">
    <div class="card shadow bg-default">
      <div class="card-header bg-default">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0 text-light">User Activity</h3>
          </div>
          <div class="col text-right">
            <a href="<?= base_url('admin/users'); ?>" class="btn btn-sm btn-primary">See all user</a>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <!-- Projects table -->
        <div>
        <table class="table align-items-center table-flush table-dark">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">status</th>
              <th scope="col">Last Login</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($list as $l) : ?>
            <tr>
              <th scope="row">
                <?= $l['name']; ?>
              </th>
              <td>
                <?= $l['email']; ?>
              </td>
              <td>
                <?= $l['status'] = 'Active'; ?>
              </td>
              <td>
                <?= time_ago($l['last_login']) ?>
              </td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
        </div>

      </div>
    </div>
  </div>
</div>
</div>


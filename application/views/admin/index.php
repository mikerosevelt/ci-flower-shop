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
<div class="row mt-6">
  <div class="col-xl mb-5 mb-xl">
    <div class="card shadow bg-default">
      <div class="card-header bg-default">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0 text-light">User List</h3>
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
              <th scope="col">Customer name</th>
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

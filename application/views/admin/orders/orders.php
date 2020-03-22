<!-- Header -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('swal'); ?>"></div>
<div class="header bg-default pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">View all orders</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Dashboards</a></li>
              <li class="breadcrumb-item active" aria-current="page">Orders</li>
            </ol>
          </nav>
        </div>
        <div class="col-lg-6 col-5 text-right">
          <a href="#" class="btn btn-sm btn-neutral">New</a>
          <a href="#" class="btn btn-sm btn-neutral">Filters</a>
        </div>
      </div>

        <div class="row">
        <div class="col-xl-4 col-md-6">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Total orders</h5>
                  <span class="h2 font-weight-bold mb-0"><?= $total; ?></span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                    <i class="ni ni-active-40"></i>
                  </div>
                </div>
              </div>
              <p class="mt-3 mb-0 text-sm">
                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                <span class="text-nowrap">Since last month</span>
              </p>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-6">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">completed orders</h5>
                  <span class="h2 font-weight-bold mb-0">2,356</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                    <i class="ni ni-chart-pie-35"></i>
                  </div>
                </div>
              </div>
              <p class="mt-3 mb-0 text-sm">
                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                <span class="text-nowrap">Since last month</span>
              </p>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-6">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Cancelled Order</h5>
                  <span class="h2 font-weight-bold mb-0">2,356</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                    <i class="ni ni-chart-pie-35"></i>
                  </div>
                </div>
              </div>
              <p class="mt-3 mb-0 text-sm">
                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                <span class="text-nowrap">Since last month</span>
              </p>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</div>
<div class="container-fluid mt--6 bg-default">
  <div class="row mt-5">
    <div class="col-xl mb-5 mb-xl">
      <!-- <?= $this->session->flashdata('message'); ?> -->
      <div class="card shadow bg-default">
        <div class="card-header mb-2 bg-default">
          <h2 class="text-light">All Orders</h2>
        </div>
        <div class="mb-3">
          <div class="table-responsive">
            <table class="table table-hover table-dark" id="datatable-basic">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">
                    #
                  </th>
                  <th scope="col">
                    Full Name
                  </th>
                  <th scope="col">
                    Email
                  </th>
                  <th scope="col">
                    status
                  </th>
                  <th scope="col">
                    Order Total
                  </th>
                  <th scope="col">
                    Order Date
                  </th>
                  <th scope="col">
                    Action
                  </th>
                </tr>
              </thead>
              <tbody class="list">
                <?php if (!$list) : ?>
                  <tr>
                    <td class="text-center" colspan="7">No Records Found</td>
                  </tr>
                <?php else : ?>
                  <?php foreach ($list as $ol) : ?>
                    <tr>
                      <td>
                        <?= $ol['order_number']; ?>
                      </td>
                      <td class="budget">
                        <?= $ol['name']; ?>
                      </td>
                      <td class="status">
                        <span class="badge badge-dot mr-4">
                          <?= $ol['email']; ?>
                        </span>
                      </td>
                      <td>
                        <span class=""><?= $ol['status']; ?></span>
                      </td>
                      <td>
                        Rp.<?= number_format($ol['total'], 0, ",", "."); ?>
                      </td>
                      <td class="completion">
                        <div class="d-flex align-items-center">
                          <span class="mr-2"><?= date('d F Y H:i:s', $ol['date_order']); ?></span>
                        </div>
                      </td>
                      <td class="text-right">
                        <div class="dropdown">
                          <a class="btn btn-sm btn-icon-only" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v text-light"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow bg-light">
                            <a class="dropdown-item text-dark" href="<?= base_url('admin/orderdetail/') . $ol['id']; ?>">Detail</a>
                            <a class="dropdown-item text-danger del-btn" href="<?= base_url('admin/deleteorder/') . $ol['id']; ?>">Delete</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
        <div>
        </div>
      </div>
    </div>
  </div>
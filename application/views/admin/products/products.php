<!-- Header -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('swal'); ?>"></div>
<div class="header bg-default pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">View all products</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Dashboards</a></li>
              <li class="breadcrumb-item active" aria-current="page">Products</li>
            </ol>
          </nav>
        </div>
        <div class="col-lg-6 col-5 text-right">
          <a href="<?= base_url('admin/addProduct'); ?>" class="btn btn-sm btn-neutral">Add New Product</a>
        </div>
      </div>
    </div>
    <!-- Cards -->
    <div class="row">
      <div class="col-xl-4 col-md-6">
        <div class="card card-stats">
          <!-- Card body -->
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">Total products</h5>
                <span class="h2 font-weight-bold mb-0"><?= $total ?></span>
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
                <h5 class="card-title text-uppercase text-muted mb-0">All Product stock</h5>
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
                <h5 class="card-title text-uppercase text-muted mb-0">Sold</h5>
                <span class="h2 font-weight-bold mb-0">924</span>
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                  <i class="ni ni-money-coins"></i>
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
<!-- Page content -->
<div class="container-fluid mt--6 bg-default">
  <div class="row">
    <div class="col-xl mb-5 mb-xl">
      <div class="card shadow bg-default">
        <div class="card-header mb-2 bg-default">
          <h2 class="text-light">All Products</h2>
          <!-- <input class="form-control col-md-3 float-right bg-light" type="text" id="search" placeholder="Type to search"> -->
        </div>
        <div class="mb-3">
          <div class="table-responsive">
            <table class="table table-hover align-items-center table-dark" id="datatable-basic">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">
                    #
                  </th>
                  <th scope="col">
                    Product Name
                  </th>
                  <th scope="col">
                    Description
                  </th>
                  <th scope="col">
                    Price
                  </th>
                  <th scope="col">
                    Date Added
                  </th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody class="list">
                <?php $no = 1;
                foreach ($list as $li) : ?>
                  <tr>
                    <td>
                      <?= $no++; ?>
                    </td>
                    <td class="budget">
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                          <img alt="img" src="<?= base_url('assets/img/') . $li['image']; ?>">
                        </a>
                        <div class="media-body">
                          <span class="mb-0 text-sm"><?= $li['name']; ?></span>
                        </div>
                      </div>
                    </td>
                    <td class="status">
                      <span class="badge badge-dot mr-4">
                        <?= $li['description']; ?>
                      </span>
                    </td>
                    <td>
                      Rp.<?= number_format($li['price'], 0, ",", "."); ?>
                    </td>
                    <td class="completion">
                      <div class="d-flex align-items-center">
                        <span class="mr-2"><?= date('d F Y', $li['date_added']); ?></span>
                      </div>
                    </td>
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v text-light"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow bg-light">
                          <a class="dropdown-item text-dark" href="<?= base_url('admin/detail_product/') . $li['id']; ?>">Detail</a>
                          <!-- <a class="dropdown-item" href="<?= base_url('admin/edit_product/') . $li['id']; ?>">Edit</a> -->
                          <a class="dropdown-item text-danger del-btn" href="<?= base_url('admin/delete_product/') . $li['id']; ?>">Delete</a>
                        </div>
                      </div>
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
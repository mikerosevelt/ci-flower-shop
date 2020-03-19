    <!-- Header -->
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('swal'); ?>"></div>
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
                      <h5 class="card-title text-uppercase text-muted mb-0">Products</h5>
                      <span class="h2 font-weight-bold mb-0"><?= $total; ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="fas fa-chart-pie"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <a class="btn shadow btn-primary mt-4 col-xl" href="<?= base_url('admin/addProduct'); ?>">Add New Product</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid mt--7 bg-default">
      <div class="row mt-5">
        <div class="col-xl mb-5 mb-xl">
          <div class="card shadow bg-default">
            <div class="card-header bg-default">
              <input class="form-control col-md-3 float-right bg-light" type="text" id="search" placeholder="Type to search">
            </div>
            <div class="table-responsive">
              <div>
                <table class="table table-hover align-items-center table-sortable table-dark">
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
                              <img alt="Image placeholder" src="<?= base_url('assets/img/') . $li['image']; ?>">
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
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                              <a class="dropdown-item" href="<?= base_url('admin/detail_product/') . $li['id']; ?>">Detail</a>
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
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
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid mt--7 bg-default">
      <?= $this->session->flashdata('message'); ?>
      <div class="row mt-7">
        <div class="col-xl mb-5 mb-xl">
          <div class="card shadow bg-default">
            <div class="card-header bg-default">
              <!-- <h2 class="float-left text-light">All Customers</h2> -->
              <!-- <input class="form-control col-md-3 float-right bg-light" type="text" id="search" placeholder="Type to search"> -->
              <div class="form-group row m-0">
                <select name="" class="float-left bg-light form-control col-sm-1">
                <option value="">5</option>
                <option value="">10</option>
                option
              </select>
              <div class="col-sm-11">
                <input class="form-control float-right bg-light col-sm-3" type="text" id="search" placeholder="Type to search">
              </div>
            </div>
            </div>
            <div class="table-responsive">
              <div>
              <table class="table table-hover table-sortable table-dark" id="table">
                  <thead class="thead-dark">
                      <tr>
                          <th scope="col">#</th>
                          <th scope="col">Full Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">status</th>
                          <th scope="col">Date Registration</th>
                          <th scope="col"></th>
                      </tr>
                  </thead>
                  <tbody class="list">
                    <?php $no = 1;
                         foreach ($list as $l) : ?>
                        <?php if($l['role_id'] != 1): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td class="budget">
                                <?= $l['name']; ?>
                            </td>
                            <td class="status">
                                <span class="badge badge-dot mr-4">
                                 <?= $l['email']; ?>
                                </span>
                            </td>
                            <td>
                              <?php if($l['is_active'] == 1): ?>
                                <span class="text-success">Active</span>
                              <?php else: ?>
                                <span class="text-danger">Inactive</span>
                              <?php endif; ?>
                            </td>
                            <td class="completion">
                                <div class="d-flex align-items-center">
                                    <span class="mr-2"><?= date('d F Y', $l['date_created']); ?></span>
                                </div>
                            </td>
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <i class="fas fa-ellipsis-v text-light"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" href="<?= base_url('admin/user_detail/').$l['id']; ?>">Detail</a>
                                        <a class="dropdown-item text-danger del-btn" href="<?= base_url('admin/delete_user/').$l['id']; ?>">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php endif; ?>
                      <?php endforeach; ?>
                  </tbody>
              </table>
          </div>

      </div>
          </div>
        </div>
      </div>
      <!-- Mo
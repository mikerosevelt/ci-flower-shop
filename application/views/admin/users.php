    <!-- Header -->
    <div class="header pb-8 pt-5 pt-md-8" style="background-color:#82ae46">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
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
    <div class="container-fluid mt--7">
      <?= $this->session->flashdata('message'); ?>
      <div class="row mt-5">
        <div class="col-xl mb-5 mb-xl">
          <div class="card shadow">
            <div class="table-responsive">
              <div>
              <table class="table align-items-center">
                  <thead class="thead-light">
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
                          <th scope="col">status</th>
                          <th scope="col">
                              Date Registration
                          </th>
                          <th scope="col"></th>
                      </tr>
                  </thead>
                  <tbody class="list">
                    <?php $no = 1;
                         foreach ($list as $l) : ?>
                      <tr>
                          <th scope="row" class="name">
                              <div class="media align-items-center">
                                  <?= $no++; ?>
                              </div>
                          </th>
                          <td class="budget">
                              <?= $l['name']; ?>
                          </td>
                          <td class="status">
                              <span class="badge badge-dot mr-4">
                               <?= $l['email']; ?>
                              </span>
                          </td>
                          <td>
                            <?= $l['status'] = 'Active'; ?>
                          </td>
                          <td class="completion">
                              <div class="d-flex align-items-center">
                                  <span class="mr-2"><?= date('d F Y', $l['date_created']); ?></span>
                              </div>
                          </td>
                          <td class="text-right">
                              <div class="dropdown">
                                  <a class="btn btn-sm btn-icon-only text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                  </a>
                                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                      <a class="dropdown-item" href="<?= base_url('admin/user_detail/').$l['id']; ?>">Detail</a>
                                      <a class="dropdown-item text-danger" onclick="return confirm('Delete user?')" href="<?= base_url('admin/delete_user/').$l['id']; ?>">Delete</a>
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
      <!-- Mo
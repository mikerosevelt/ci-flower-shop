<!-- Header -->
<div class="header pb-8 pt-5 pt-md-8 bg-default">
<div class="container-fluid">
  <div class="header-body">
    <!-- Card stats -->
    <div class="row">
      <div class="col-xl col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0 bg-light">
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">Invoices</h5>
                <span class="h2 font-weight-bold mb-0"><?= $total; ?></span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0 bg-light">
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">Paid</h5>
                <span class="h2 font-weight-bold mb-0 text-success">Rp.0</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0 bg-light">
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">Unpaid</h5>
                <span class="h2 font-weight-bold mb-0 text-danger">Rp.0</span>
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
<div class="row mt-7">
  <div class="col-xl mb-5 mb-xl">
    <?= $this->session->flashdata('message'); ?>
    <div class="card shadow bg-default">
      <div class="card-header bg-default">
        <h2 class="float-left text-light">Invoice List</h2>
        <input class="form-control col-md-3 float-right bg-light" type="text" id="search" placeholder="Type to search">
      </div>
      <div class="table-responsive">
        <div>
        <table class="table align-items-center table-hover table-sortable table-dark" id="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">
                        #
                    </th>
                    <th scope="col">
                      Invoice Number
                    </th>
                    <th scope="col">
                        Customer Name
                    </th>
                    <th scope="col">
                    Invoice Date
                    </th>
                    <th scope="col">
                    Order Total
                    </th>
                    <th scope="col">
                        Status
                    </th>
                    <th scope="col">
                      Action
                    </th>
                </tr>
            </thead>
            <tbody class="list">
              <?php if(!$list): ?>
              <tr>
                <td colspan="7" class="text-center">No Records Found</td>
              </tr>
            <?php endif; ?>
            <?php $n = 1; foreach($list as $l): ?>
              <tr class="">
                <td><?= $n++ ?></td>
                <td>#<?= $l['invoice_number']; ?></td>
                <td><?= $l['name']; ?></td>
                <td><?= date('d F Y', $l['invoice_date']); ?></td>
                <td>Rp.<?= number_format($l['total'], 0, ".","."); ?></td>
                <td><?= $l['payment_status']; ?></td>
                <td class="">
                  <div class="dropdown">
                    <a class="btn btn-sm btn-icon-only" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v text-light"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <a class="dropdown-item" href="<?= base_url('admin/invoice_detail/').$l['id']; ?>">Detail</a>
                        <a class="dropdown-item text-danger del-btn" href="<?= base_url('admin/delete_invoice/').$l['id']; ?>">Delete</a>
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

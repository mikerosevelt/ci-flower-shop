<!-- Header -->
<div class="header pb-8 pt-5 pt-md-8" style="background-color:#82ae46">
<div class="container-fluid">
  <div class="header-body">
    <!-- Card stats -->
    <div class="row">
      <div class="col-xl col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0">
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">Invoices</h5>
                <span class="h2 font-weight-bold mb-0"><?= $total; ?></span>
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                  <i class="fas fas"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0">
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
        <div class="card card-stats mb-4 mb-xl-0">
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
<div class="container-fluid mt--7">
<div class="row mt-5">
  <div class="col-xl mb-5 mb-xl">
    <?= $this->session->flashdata('message'); ?>
    <div class="card shadow">
      <div class="card-header">
        <h2 class="float-left">Invoice List</h2>
        <input class="form-control col-md-3 float-right" type="text" id="search" placeholder="Type to search">
      </div>
      <div class="table-responsive">
        <div>
        <table class="table align-items-center table-hover table-sortable" id="table">
            <thead class="thead-light">
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
              <tr>
                <td colspan="7" class="text-center">No Records Found</td>
              </tr>
            </tbody>
        </table>
      </div>

      </div>
    </div>
  </div>
</div>

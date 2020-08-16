<!-- Header -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('swal'); ?>"></div>
<div class="header bg-default pb-6">
  <!-- Header container -->
  <div class="container-fluid">
    <div class="row align-items-center py-4">
      <div class="col-lg col-md-10">
        <h1 class="display-2 text-white"><?= $admin['name']; ?></h1>
        <a class="btn btn-sm btn-secondary" href="<?= base_url('admin'); ?>">back</a>
      </div>
    </div>
  </div>
</div>

<!-- Page content -->
<div class="container-fluid mt--6 bg-default">
  <div class="row">
    <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
      <div class="card card-profile shadow bg-default">
        <div class="row justify-content-center">
          <div class="col-lg-3 order-lg-2">
          </div>
        </div>
        <div class="card-header text-center border-1 pt-8 pt-md-4 pb-0 pb-md-4 bg-default">
          <div class="d-flex justify-content-between">
            <a href="#" class="btn btn-sm btn-info mr-4">Connect</a>
            <a href="#" class="btn btn-sm btn-primary float-right">Message</a>
          </div>
        </div>
        <div class="card-body pt-0 pt-md-0">
          <div class="text-center pt-3">
            <h3 class="text-white">
              <?= $admin['name']; ?>
            </h3>
            <div class="h5 font-weight-300">
              <?php if ($admin['is_active'] == 1) : ?>
                <i class="ni location_pin mr-2"></i><span class="text-success">Active</span>
              <?php else : ?>
                <i class="ni location_pin mr-2"></i><span class="text-danger">Inactive</span>
              <?php endif; ?>
            </div>
            <div class="text-white">
              Assigned since <?= date('d F Y', $admin['date_created']); ?>
            </div>
          </div>
          <div>
            <hr class="my-4" />
            <h3 class="text-center text-light">Recent Activity</h3>
            <table class="mx-auto text-light" width="100%">
              <tr>
                <td><small>Last Login</small></td>
                <td class="float-right"><small><?= date('H:i:s d F Y', $admin['last_login']); ?></small></td>
              </tr>
              <tr>
                <td width="25%"><small>IP Address</small></td>
                <td class="float-right"><small><?= $admin['ip_address'] ?></small></td>
              </tr>
              <tr>
                <td width="25%"><small>Host</small></td>
                <td class="float-right"><small><?= $admin['host'] ?></small></td>
              </tr>
              <tr>
                <td colspan="2"><small>User Agent : <i class="fas fa-arrow-down"></i> </small></td>
              </tr>
              <tr>
                <td colspan="2"><small><?= $admin['user_agent'] ?></small></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-8 order-xl-1">
      <div class="card bg-default shadow">
        <div class="card-header bg-transparent border-0">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0 text-white">Admin Detail</h3>
            </div>
            <div class="col-4 text-right">
              <a href="#!" class="btn btn-sm btn-danger">Delete</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form>
            <h6 class="heading-small text-muted mb-4">User information</h6>
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Phone</label>
                    <input type="text" id="input-username" class="form-control form-control-alternative bg-light" placeholder="" value="<?= $admin['phone']; ?>">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-email">Email address</label>
                    <input type="email" id="input-email" class="form-control form-control-alternative bg-light" placeholder="" value="<?= $admin['email']; ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label" for="input-first-name">Full name</label>
                    <input type="text" id="input-first-name" class="form-control form-control-alternative bg-light" placeholder="" value="<?= $admin['name']; ?>">
                  </div>
                </div>
              </div>
            </div>
            <hr class="my-4" />
            <!-- Address -->
            <h6 class="heading-small text-muted mb-4">Address information</h6>
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="form-control-label" for="input-address">Address</label>
                    <input id="input-address" class="form-control form-control-alternative bg-light" placeholder="Home Address" value="<?= $admin['address']; ?>" type="text">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="form-control-label" for="input-address">Address 2</label>
                    <input id="input-address" class="form-control form-control-alternative bg-light" placeholder="Appartment, suite, unit etc: (optional)" value="<?= $admin['address_2']; ?>" type="text">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label" for="input-city">City</label>
                    <input type="text" id="input-city" class="form-control bg-light form-control-alternative" placeholder="City" value="<?= $admin['city']; ?>">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label" for="input-city">State</label>
                    <input type="text" id="input-city" class="form-control bg-light form-control-alternative" placeholder="City" value="<?= $admin['state']; ?>">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label" for="input-country">Country</label>
                    <input type="text" id="input-country" class="form-control bg-light form-control-alternative" placeholder="Country" value="<?= $admin['country']; ?>">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label" for="input-country">Postal code</label>
                    <input type="text" id="input-postal-code" class="form-control bg-light form-control-alternative" placeholder="Postal Code" value="<?= $admin['zipcode']; ?>">
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
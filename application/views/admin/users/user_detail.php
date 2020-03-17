    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="background-color:#82ae46">
      <!-- Mask -->
      <span class="mask opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg col-md-10">
            <h1 class="display-2 text-white"><?= $detail['name']; ?></h1>
            <a class="btn btn-secondary" href="<?= base_url('admin/users'); ?>">back</a>
            <?php if($detail['is_active'] != 1): ?>
              <form action="<?= base_url('admin/resendActivationEmail'); ?>" method="POST">
                <input type="hidden" name="email" value="<?= $detail['email']; ?>">
                <input type="hidden" name="id" value="<?= $detail['id']; ?>">
                <button class="btn btn-secondary mt-3" type="submit">Resend Activation Email</button>
              </form>
              <!-- <a class="btn btn-secondary float-right" href="<?= base_url('admin/resendActivationEmail'); ?>"></a> -->
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
              </div>
            </div>
<!--             <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                <a href="#" class="btn btn-sm btn-info mr-4">Connect</a>
                <a href="#" class="btn btn-sm btn-default float-right">Message</a>
              </div>
            </div> -->
            <div class="card-body pt-0 pt-md-0">
              <div class="text-center pt-3">
                <h3>
                  <?= $detail['name']; ?>
                </h3>
                <div class="h5 font-weight-300">
                  <?php if($detail['is_active'] == 1): ?>
                  <i class="ni location_pin mr-2"></i><span class="text-success">Active</span>
                  <?php else:?>
                    <i class="ni location_pin mr-2"></i><span class="text-danger">Inactive</span>
                <?php endif; ?>
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i>Member since <?= date('d F Y', $detail['date_created']); ?>
                </div>
              </div>
              <div>
                <hr class="my-4" />
                <h3 class="text-center">User Id[<?= $detail['id'] ?>]</h3>
                <table class="table-striped mx-auto" width="100%">
                  <tr>
                   <td><small>Last Login</small></td> 
                   <td class="float-right"><small><?= date('H:i:s d F Y', $detail['last_login']); ?></small></td> 
                  </tr>
                  <tr>
                    <td width="25%"><small>IP Address</small></td>
                    <td class="float-right"><small><?= $detail['ip_address'] ?></small></td>
                  </tr>
                  <tr>
                    <td width="25%"><small>Host</small></td>
                    <td class="float-right"><small><?= $detail['host'] ?></small></td>
                  </tr>
                  <tr>
                    <td colspan="2"><small>User Agent : <i class="fas fa-arrow-down"></i> </small></td>
                  </tr>
                  <tr>
                    <td colspan="2"><small><?= $detail['user_agent'] ?></small></td>
                  </tr>
                </table>
                <!-- <a href="#">Show more</a> -->
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <?= $this->session->flashdata('message'); ?>
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">User Detail</h3>
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
                        <input type="text" id="input-username" class="form-control form-control-alternative" placeholder="" value="<?= $detail['phone']; ?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="input-email" class="form-control form-control-alternative" placeholder="" value="<?= $detail['email']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Full name</label>
                        <input type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="" value="<?= $detail['name']; ?>">
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
                        <input id="input-address" class="form-control form-control-alternative" placeholder="Home Address" value="<?= $detail['address']; ?>" type="text">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Address 2</label>
                        <input id="input-address" class="form-control form-control-alternative" placeholder="Appartment, suite, unit etc: (optional)" value="<?= $detail['address_2']; ?>" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">City</label>
                        <input type="text" id="input-city" class="form-control form-control-alternative" placeholder="City" value="<?= $detail['city']; ?>">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">State</label>
                        <input type="text" id="input-city" class="form-control form-control-alternative" placeholder="City" value="<?= $detail['state']; ?>">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Country</label>
                        <input type="text" id="input-country" class="form-control form-control-alternative" placeholder="Country" value="<?= $detail['country']; ?>">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Postal code</label>
                        <input type="number" id="input-postal-code" class="form-control form-control-alternative" placeholder="<?= $detail['zipcode']; ?>">
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
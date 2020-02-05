<div class="header py-7 py-lg-8" style="background-color:#82ae46">
  <div class="container">
    <div class="header-body text-center mb-7">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-6">
          <h1 class="text-white">Change Password</h1>
          <!-- <p class="text-lead text-light">We will send link to reset your account password</p> -->
        </div>
      </div>
    </div>
  </div>
  <div class="separator separator-bottom separator-skew zindex-100">
    <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
      <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
    </svg>
  </div>
</div>
<!-- Page content -->
<div class="container mt--9 pb-5">
  <div class="row justify-content-center">
    <div class="col-lg-5 col-md-5">
      <div class="card shadow bg-transparent border-0">
        <div class="card-header">
          <div class="card-body px-lg py-lg">
            <div class="text-center text-muted mb-4">
              <h3 class="text-muted">Enter your email</h3>
            </div>
            <?= $this->session->flashdata('message'); ?>
            <form method="post" action="<?= base_url('auth/changepassword'); ?>">
              <div class="form-group mb-3">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                  </div>
                  <input class="form-control" placeholder="Enter New Password" type="password" id="password1" name="password1">
                </div>
                <?= form_error('password1', '<small class="text-danger pl-1">', '</small>'); ?>
              </div>
              <div class="form-group mb-3">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                  </div>
                  <input class="form-control" placeholder="Repeat New Password" type="password" id="password2" name="password2">
                </div>
                <?= form_error('password2', '<small class="text-danger pl-1">', '</small>'); ?>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary my-4">Change Password</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
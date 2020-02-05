<div class="header py-7 py-lg-8" style="background-color:#82ae46">
  <div class="container">
    <div class="header-body text-center mb-7">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-6">
          <h1 class="text-white">Reset Password</h1>
          <p class="text-lead text-light">We will send link to reset your account password</p>
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
            <form method="post" action="<?= base_url('auth/forgotpassword'); ?>">
              <div class="form-group mb-3">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                  </div>
                  <input class="form-control" placeholder="Email" type="text" id="email" name="email" value="<?= set_value('email'); ?>">
                </div>
                <?= form_error('email', '<small class="text-danger pl-1">', '</small>'); ?>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary my-4">Reset Password</button>
              </div>
            </form>
          </div>
        </div>
        <div class="row mt-3 p-1">
          <div class="col-6">
            <a href="<?= base_url('auth'); ?>" class="text-black"><small><i class="fas fa-arrow-left"></i> Back to Login</small></a>
          </div>
          <div class="col-6 text-right">
            <a href="<?= base_url('auth/register'); ?>" class="text-black"><small>Create new account</small></a>
          </div>
        </div>
      </div>
    </div>
  </div>
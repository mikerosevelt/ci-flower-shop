    <!-- Header -->
    <div class="header py-7 py-lg-8" style="background-color:#82ae46">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              <h1 class="text-white">Welcome!</h1>
              <p class="text-lead text-light">If you don't have an account, fill the registration form.<br>
                Provide your details to make purchases easier.</p>
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
      <!-- Table -->
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-5">
          <div class="card bg-secondary shadow border-0">
            <div class="card-body px-lg py-lg">
              <div class="text-center text-muted mb-4">
                <h3 class="text-muted">Sign up with email</h3>
              </div>
              <form method="post" action="<?= base_url('auth/register'); ?>">
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                    <input class="form-control" placeholder="Name" type="text" id="name" name="name" value="<?= set_value('name'); ?>">
                  </div>
                  <?= form_error('name', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Email" type="text" id="email" name="email" value="<?= set_value('email'); ?>">
                  </div>
                  <?= form_error('email', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" type="password" id="password" name="password">
                  </div>
                  <!-- <small class="pl-1">Passowrd min 3 Characters</small><br> -->
                  <?= form_error('password', '<small class="text-danger pl-1">', '</small>'); ?>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary mt-4">Create account</button>
                  </div>
              </form>
              <div class="row mt-3 p-1">
                <div class="col text-center">
                  <a href="<?= base_url('auth'); ?>" class="text-black"><small>Already have an account ? Login!</small></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
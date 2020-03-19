<!-- Header -->
<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(<?= base_url('assets/');?>img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
<!-- Mask -->
<span class="mask bg-gradient-default opacity-8"></span>
<!-- Header container -->
<div class="container-fluid d-flex align-items-center">
  <div class="row">
    <div class="col-lg-7 col-md-10">
      <h1 class="display-3 text-white">Hello <?= $detail['name']; ?></h1>
      <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with your work and manage your projects or assigned tasks</p>
      <a href="#!" class="btn btn-info">Edit profile</a>
    </div>
  </div>
</div>
</div>
<!-- Page content -->
<div class="container-fluid mt--7 bg-default">
<div class="row">
  <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
    <div class="card card-profile shadow bg-default">
      <div class="row justify-content-center">
        <div class="col-lg-3 order-lg-2">
          <div class="card-profile-image">
            <a href="#">
              <img src="<?= base_url('assets/');?>img/theme/team-1-800x800.jpg" class="rounded-circle">
            </a>
          </div>
        </div>
      </div>
      <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4 bg-default">
        <div class="d-flex justify-content-between">
          <a href="#" class="btn btn-sm btn-info mr-4">Connect</a>
          <a href="#" class="btn btn-sm btn-default float-right">Message</a>
        </div>
      </div>
      <div class="card-body pt-0 pt-md-4 bg-default">
        <div class="row">
          <div class="col">
            <div class="card-profile-stats d-flex justify-content-center mt-md-5 text-light">
              <div>
                <span class="heading">22</span>
                <span class="description">Friends</span>
              </div>
              <div>
                <span class="heading">10</span>
                <span class="description">Photos</span>
              </div>
              <div>
                <span class="heading">89</span>
                <span class="description">Comments</span>
              </div>
            </div>
          </div>
        </div>
        <div class="text-center text-light">
          <h3 class="text-light">
            <?= $detail['name']; ?><span class="font-weight-light">, 21</span>
          </h3>
          <div class="h5 font-weight-300 text-light">
            <i class="ni location_pin mr-2"></i><?= $detail['city']; ?>, <?= $detail['country']; ?>
          </div>
          <div class="h5 mt-4 text-light">
            <i class="ni business_briefcase-24 mr-2"></i>Software Engineer - Team Lead
          </div>
          <div>
            <i class="ni education_hat mr-2 text-light"></i>University of Computer Science
          </div>
          <hr class="my-4" />
          <p>Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music.</p>
          <a href="#">Show more</a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-8 order-xl-1">
    <div class="card bg-default shadow">
      <div class="card-header bg-default border-0">
        <div class="row align-items-center">
          <div class="col-8">
            <h3 class="mb-0 text-light">My account</h3>
          </div>
          <div class="col-4 text-right">
            <a href="<?= base_url('admin/settings'); ?>" class="btn btn-sm btn-primary">Settings</a>
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
                  <label class="form-control-label" for="input-username">Username</label>
                  <input type="text" id="input-username" class="form-control form-control-alternative bg-light" placeholder="Username" value="admin">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label" for="input-email">Email address</label>
                  <input type="email" id="input-email" class="form-control form-control-alternative bg-light" placeholder="jesse@example.com" value="<?= $detail['email']; ?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label" for="input-first-name">First name & Last Name</label>
                  <input type="text" id="input-first-name" class="form-control form-control-alternative bg-light" placeholder="First name & Last Name" value="<?= $detail['name']; ?>">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label" for="input-last-name">Phone</label>
                  <input type="text" id="input-last-name" class="form-control form-control-alternative bg-light" placeholder="Last name" value="<?= $detail['phone']; ?>">
                </div>
              </div>
            </div>
          </div>
          <hr class="my-4" />
          <!-- Address -->
          <h6 class="heading-small text-muted mb-4">Contact information</h6>
          <div class="pl-lg-4">
            <div class="row">
              <div class="col-md-9">
                <div class="form-group">
                  <label class="form-control-label" for="input-address">Address</label>
                  <input id="input-address" class="form-control form-control-alternative bg-light" placeholder="Home Address" value="<?= $detail['address']; ?> <?= $detail['address_2']; ?>" type="text">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="form-control-label" for="input-address">State</label>
                  <input id="input-address" class="form-control form-control-alternative bg-light" placeholder="Home Address" value="<?= $detail['state']; ?>" type="text">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label" for="input-city">City</label>
                  <input type="text" id="input-city" class="form-control form-control-alternative bg-light" placeholder="City" value="<?= $detail['city']; ?>">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label" for="input-country">Country</label>
                  <input type="text" id="input-country" class="form-control form-control-alternative bg-light" placeholder="Country" value="<?= $detail['country']; ?>">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label" for="input-country">Postal code</label>
                  <input type="number" id="input-postal-code" class="form-control form-control-alternative bg-light" placeholder="Postal code" value="<?= $detail['zipcode']; ?>">
                </div>
              </div>
            </div>
          </div>
          <hr class="my-4" />
          <!-- Description -->
          <h6 class="heading-small text-muted mb-4">About me</h6>
          <div class="pl-lg-4">
            <div class="form-group">
              <label>About Me</label>
              <textarea rows="4" class="form-control form-control-alternative bg-light" placeholder="A few words about you ...">If you see a good move look for better one.</textarea>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
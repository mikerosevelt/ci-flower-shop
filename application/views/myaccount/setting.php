<div class="container">
	<div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<br>
            <h1 class="mt-3 bread">Account Setting</h1>
          </div>
        </div>

    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
            <form action="<?= base_url('myaccount/setting'); ?>" method="POST">
                <div class="form-group">
                    <label for="current_password" class="col-form-label">Current Password</label>
                    <input class="form-control" type="password" name="current_password" id="current_password">
                    <?= form_error('current_password', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="new_password1" class="col-form-label">New Password</label>
                    <input class="form-control" type="password" name="new_password1" id="new_password1">
                    <small class="pl-1">Password min 8 characters</small><br>
                    <?= form_error('new_password1', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="new_password2" class="col-form-label">Repeat New Password</label>
                    <input class="form-control" type="password" name="new_password2" id="new_password2">
                    <?= form_error('new_password2', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </div>
            </form>
        </div>
    </div>

    <div class="mt-3 col-lg mb-3">
        <h5>Join our mailing list</h5>
        <p>We would like to send you occasional news, information and special offers by email. To join our mailing list, simply click the switch button below. You can unsubscribe at any time.</p>
        <div class="custom-control custom-switch">
            <input type="hidden" class="custom-control-input" id="" name="mailinglist" value="0">
            <input type="checkbox" class="custom-control-input" id="customSwitch1" name="mailinglist" value="1" checked>
            <label class="custom-control-label" for="customSwitch1">Join mailing list</label>
        </div>
    </div>
</div>
<div class="container">
	<div class="row no-gutters slider-text align-items-center justify-content-center">
		<div class="col-md-9 ftco-animate text-center">
			<br>
			<h1 class="mb-0 bread">My Account</h1>
		</div>
	</div>
</div>
<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-xl-7 ftco-animate card shadow pb-3 pt-3">
				<?= $this->session->flashdata('message'); ?>
				<form action="<?= base_url('myaccount'); ?>" class="billing-form" method="post">
					<input type="hidden" name="id" id="id" value="<?= $user['id']; ?>">
					<h3 class="mb-4 billing-heading">Billing Details</h3>
					<div class="row align-items-end">
						<div class="col-md-12">
							<div class="form-group">
								<label for="firstname">Full Name</label>
								<input type="text" class="form-control" id="name" name="name" placeholder="" value="<?= $data['name']; ?>">
								<?= form_error('name', '<small class="text-danger pl-1">', '</small>'); ?>
							</div>
						</div>
						<div class="col-md">
						</div>
						<div class="w-100"></div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="phone">Phone</label>
								<input type="text" class="form-control" placeholder="+62 xxx xxxx xxxx" id="phone" name="phone" value="<?= $data['phone']; ?>">
								<?= form_error('phone', '<small class="text-danger pl-1">', '</small>'); ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="emailaddress">Email Address</label>
								<input type="text" class="form-control" placeholder="" value="<?= $data['email']; ?>" readonly>
							</div>
						</div>
						<div class="w-100"></div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="address">Street Address</label>
								<input type="text" class="form-control" placeholder="House number and street name" id="address" name="address" value="<?= $data['address']; ?>">
								<?= form_error('address', '<small class="text-danger pl-1">', '</small>'); ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Appartment, suite, unit etc: (optional)" id="address2" name="address2" value="<?= $data['address_2']; ?>">
								<?= form_error('address2', '<small class="text-danger pl-1">', '</small>'); ?>
							</div>
						</div>
						<div class="w-100"></div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="towncity">Town / City</label>
								<input type="text" class="form-control" placeholder="" id="city" name="city" value="<?= $data['city']; ?>">
								<?= form_error('city', '<small class="text-danger pl-1">', '</small>'); ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="postcodezip">Post Code / Zip Code</label>
								<input type="text" class="form-control" placeholder="" id="zipcode" name="zipcode" value="<?= $data['zipcode']; ?>">
								<?= form_error('zipcode', '<small class="text-danger pl-1">', '</small>'); ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="state">State / Province</label>
								<input type="text" class="form-control" placeholder="" id="state" name="state" value="<?= $data['state']; ?>">
								<?= form_error('state', '<small class="text-danger pl-1">', '</small>'); ?>
							</div>
						</div>
						<!-- <div class="w-100"></div> -->
						<div class="col-md-6">
							<div class="form-group">
								<label for="country">Country</label>
								<div class="select-wrap">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="" id="country" name="country" value="<?= $data['country']; ?>">
										<?= form_error('country', '<small class="text-danger pl-1">', '</small>'); ?>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group mt-3">
								<div class="radio">
									<label><input type="checkbox" name="shipaddress"> Ship to different address</label>
								</div>
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-primary col-md-12" href="">Save Changes</button>
				</form><!-- END -->
			</div>
			<div class="col-xl-5">
				<div class="row mt-5 pt-3">
					<div class="col-md-12">
						<div class="cart-detail p-2 p-md-4 card shadow">
							<h4 class="billing-heading mb-2">Menu</h4>
							<ul style="list-style: none">
								<li>
									<h5><a href="<?= base_url('myaccount/myorder'); ?>" class="">My Order</a></h5>
								</li>
								<li>
									<h5><a href="<?= base_url('myaccount/mywishlist'); ?>" class="">My Wishlist</a></h5>
								</li>
								<li>
									<h5><a href="<?= base_url('myaccount/setting'); ?>" class="">Account Setting</a></h5>
								</li>
							</ul>

						</div>
					</div>
				</div>
			</div> <!-- .col-md-8 -->
		</div>
	</div>
</section> <!-- .section -->
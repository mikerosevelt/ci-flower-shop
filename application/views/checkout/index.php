    <div class="hero-wrap hero-bread" style="background-image: url('http://localhost/flower/assets/images/bg_1.jpg');">
    	<div class="container">
    		<div class="row no-gutters slider-text align-items-center justify-content-center">
    			<div class="col-md-9 ftco-animate text-center">
    				<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span></p>
    				<h1 class="mb-0 bread">Checkout</h1>
    			</div>
    		</div>
    	</div>
    </div>

    <?php
$id = $user['id'];
$query = "SELECT `user`.*, `user_detail`.*
          FROM `user` JOIN `user_detail`
          ON `user`.`id` = `user_detail`.`user_id`
          WHERE `user`.`id` = $id";
$detail = $this->db->query($query)->row_array();

$cartInfo = $this->cart->contents();
// var_dump($cartInfo);
// die();
?>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-xl-7 ftco-animate">
    				<form action="<?= base_url('cart/complete_order'); ?>" class="billing-form" method="post">
    					<h3 class="mb-4 billing-heading">Shipping Details</h3>
    					<div class="row align-items-end">
    						<div class="col-md-12">
    							<div class="form-group">
    								<label for="name">Full Name</label>
    								<input type="text" class="form-control" placeholder="" id="name" name="name" value="<?= $user['name']; ?>" >
    							</div>
    						</div>
    						<div class="w-100"></div>
    						<div class="col-md-6">
                                <div class="form-group">
                                    <label for="streetaddress">Country</label>
                                    <input type="text" class="form-control" id="country" name="country" value="<?= $detail['country']; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="streetaddress">State / Province</label>
                                    <input type="text" class="form-control" id="state" name="state" value="<?= $detail['state']; ?>">
                                </div>
                            </div>
    						<div class="w-100"></div>
    						<div class="col-md-6">
    							<div class="form-group">
    								<label for="streetaddress">Street Address</label>
    								<input type="text" class="form-control" placeholder="House number and street name" id="address" name="address" value="<?= $detail['address']; ?>">
    							</div>
    						</div>
    						<div class="col-md-6">
    							<div class="form-group">
    								<input type="text" class="form-control" placeholder="Appartment, suite, unit etc: (optional)" id="address2" name="address2" value="<?= $detail['address_2']; ?>">
    							</div>
    						</div>
    						<div class="w-100"></div>
    						<div class="col-md-6">
    							<div class="form-group">
    								<label for="towncity">Town / City</label>
    								<input type="text" class="form-control" placeholder="" id="city" name="city" value="<?= $detail['city']; ?>">
    							</div>
    						</div>
    						<div class="col-md-6">
    							<div class="form-group">
    								<label for="postcodezip">Post Code / Zip Code</label>
    								<input type="text" class="form-control" placeholder="" id="zipcode" name="zipcode" value="<?= $detail['zipcode']; ?>">
    							</div>
    						</div>
    						<div class="w-100"></div>
    						<div class="col-md-6">
    							<div class="form-group">
    								<label for="phone">Phone</label>
    								<input type="text" class="form-control" placeholder="" id="phone" name="phone" value="<?= $detail['phone']; ?>">
    							</div>
    						</div>
    						<div class="col-md-6">
    							<div class="form-group">
    								<label for="emailaddress">Email Address</label>
    								<input type="text" id="email" name="email" class="form-control" placeholder="" value="<?= $user['email']; ?>" readonly>
    							</div>
    						</div>
                            <div class="w-100"></div>
                            <p>* Enter new address if you want to ship to different address</p>
    						<!-- <div class="w-100"></div>
    						<div class="col-md-6">
    							<div class="form-group mt-4">
    								<div class="radio">
    									<label><input type="checkbox" name="shipping"> Same as billing address ?</label>
                                        <br>
                                        <label class="mr-3"><input type="radio" name="optradio" checked> Free Shipping (3 - 5 Day) </label><br>
    									<label><input type="radio" name="optradio"> Regular Shipping (2 - 3 Day) </label><br>
                                        <label class="mr-3"><input type="radio" name="optradio"> Express Shipping (1 Day) </label>
    								</div>
    							</div>
    						</div> -->
    					</div>
    				<!-- END -->
    			</div>
    			<div class="col-xl-5">
    				<div class="row mt-5 pt-3">
    					<div class="col-md-12 d-flex mb-5">
    						<div class="cart-detail cart-total p-3 p-md-4">
    							<h3 class="billing-heading mb-4">Cart Total</h3>
    							<p class="d-flex">
    								<span>Subtotal</span>
    								<span>Rp.<?= number_format($this->cart->total(), 0, ",", "."); ?></span>
    							</p>
    							<p class="d-flex">
    								<span>Delivery</span>
    								<span>Free Shipping</span>
    							</p>
    							<p class="d-flex">
    								<span>Discount</span>
    								<span>Rp.0</span>
    							</p>
    							<hr>
    							<p class="d-flex total-price">
    								<span>Total</span>
    								<span>Rp.<?= number_format($this->cart->total(), 0, ",", "."); ?></span>
    							</p>
    						</div>
    					</div>
    					<div class="col-md-12">
    						<div class="cart-detail p-3 p-md-4">
    							<h3 class="billing-heading mb-4">Payment Method</h3>
    							<div class="form-group">
    								<div class="col-md-12">
    									<div class="radio">
    										<label>
    											<input type="radio" name="payment" class="mr-2" value="Bank Transfer"> Direct Bank Tranfer
    										</label>
    									</div>
    									<div class="radio">
    										<label>
    											<input type="radio" name="payment" class="mr-2" value="Credit Card"> Credit Card
    										</label>
    									</div>
    									<div class="radio">
    										<label>
    											<input type="radio" name="payment" class="mr-2" value="Paypal"> Paypal
    										</label>
    									</div>
    								</div>
    							</div>
    							<div class="form-group">
    								<div class="col-md-12">
    									<div class="checkbox">
    										<label><input type="checkbox" value="" class="mr-2" required> I have read and accept the terms and conditions</label>
    									</div>
    								</div>
    							</div>
                                <input type="hidden" name="id" id="" value="<?= $user['id']; ?>">
    							<p><button type="submit" class="btn btn-primary py-3 px-4">Place an order</button></p>
    						</div>
                            </form>
    					</div>
    				</div>
    			</div> <!-- .col-md-8 -->
    		</div>
    	</div>
    </section> <!-- .section -->
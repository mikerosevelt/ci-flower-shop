    <div class="hero-wrap hero-bread" style="background-image: url('http://localhost/flower/assets/img/banner-1.jpg');">
    	<div class="container">
    		<div class="row no-gutters slider-text align-items-center justify-content-center">
    			<div class="col-md-9 ftco-animate text-center">
    				<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
    				<h1 class="mb-0 bread">My Cart</h1>
    			</div>
    		</div>
    	</div>
    </div>
    <?php
	if ($cart = $this->cart->contents()) {
		?>
    	<section class="ftco-section ftco-cart">
    		<div class="container">
    			<form method="post" action="<?= base_url('product/update'); ?>" enctype="multipart/form-data">
    				<div class="row">
    					<div class="col-md-12 ftco-animate">
    						<div class="cart-list">
    							<table class="table">
    								<thead class="thead-primary">
    									<tr class="text-center">
    										<th>&nbsp;</th>
    										<th>&nbsp;</th>
    										<th>Product name</th>
    										<th>Price</th>
    										<th>Quantity</th>
    										<th>Total</th>
    									</tr>
    								</thead>
    								<tbody>
    									<?php foreach ($cart as $item) : ?>
    										<input type="hidden" name="cart[<?php echo $item['id']; ?>][id]" value="<?php echo $item['id']; ?>" />
    										<input type="hidden" name="cart[<?php echo $item['id']; ?>][rowid]" value="<?php echo $item['rowid']; ?>" />
    										<input type="hidden" name="cart[<?php echo $item['id']; ?>][name]" value="<?php echo $item['name']; ?>" />
    										<input type="hidden" name="cart[<?php echo $item['id']; ?>][price]" value="<?php echo $item['price']; ?>" />
    										<input type="hidden" name="cart[<?php echo $item['id']; ?>][image]" value="<?php echo $item['image']; ?>" />
    										<input type="hidden" name="cart[<?php echo $item['id']; ?>][qty]" value="<?php echo $item['qty']; ?>" />
    										<tr class="text-center">
    											<td class="product-remove"><a href="<?= base_url('product/deleteCart/') . $item['rowid']; ?>"><span class="ion-ios-close"></span></a></td>

    											<td class="image-prod">
    												<div class="img" style="background-image:url(<?= base_url('assets/img/') . $item['image']; ?>);"></div>
    											</td>

    											<td class="product-name">
    												<h3><?= $item['name']; ?></h3>
    											</td>

    											<td class="price">Rp.<?= number_format($item['price'], 0, ",", "."); ?></td>

    											<td class="quantity">
    												<div class="input-group mb-3">
    													<input type="number" name="cart[<?php echo $item['id']; ?>][qty]" class="quantity form-control input-number" value="<?= $item['qty']; ?>">
    												</div>
    											</td>

    											<td class="total">Rp.<?= number_format($item['subtotal'], 0, ",", "."); ?></td>
    										</tr><!-- END TR-->
    									<?php endforeach; ?>

    								</tbody>
    							</table>
    						</div>
    					</div>
    				</div>
    				<br>
    				<p align="right">
    					<input type="submit" class="btn btn-primary py-1 px-2 mr-1" name="update" value="Update cart">
    					<!-- <a href="" class="btn btn-primary py-1 px-2 mr-2">Update cart</a> -->
    					<a href="<?= base_url('product/deleteCart/all'); ?>" class="btn btn-primary py-1 px-2">Empty cart</a>
    				</p>
    			</form>
    			<div class="row justify-content-end">
    				<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    					<div class="cart-total mb-3">
    						<h3>Coupon Code</h3>
    						<p>Enter your coupon code if you have one</p>
    						<form action="#" class="info">
    							<div class="form-group">
    								<label for="">Coupon code</label>
    								<input type="text" class="form-control text-left px-3" placeholder="">
    							</div>
    						</form>
    					</div>
    					<p><a href="" class="btn btn-primary py-3 px-4">Apply Coupon</a></p>
    				</div>
    				<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    					<div class="cart-total mb-3">
    						<h3>Estimate shipping and tax</h3>
    						<p>Enter your destination to get a shipping estimate</p>
    						<form action="#" class="info">
    							<div class="form-group">
    								<label for="">Country</label>
    								<input type="text" class="form-control text-left px-3" placeholder="" value="Indonesia">
    							</div>
    							<div class="form-group">
    								<label for="country">State/Province</label>
    								<input type="text" class="form-control text-left px-3" placeholder="" value="">
    							</div>
    							<div class="form-group">
    								<label for="country">Zip/Postal Code</label>
    								<input type="text" class="form-control text-left px-3" placeholder="" value="">
    							</div>
    						</form>
    					</div>
    					<p><a href="" class="btn btn-primary py-3 px-4">Estimate</a></p>
    				</div>
    				<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    					<div class="cart-total mb-3">
    						<h3>Cart Totals</h3>
    						<p class="d-flex">
    							<span>Subtotal</span>
    							<span>Rp.<?= number_format($this->cart->total(), 0, ",", "."); ?></span>
    						</p>
    						<p class="d-flex">
    							<span>Delivery</span>
    							<span>Free</span>
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
    					<p><a href="<?= base_url('cart/checkout'); ?>" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
    				</div>
    			</div>
    		</div>
    	</section>
    <?php
	} else {
		echo "<h2 class='mt-5 mb-5' align='center'>Cart is empty</h2>";
	}
	?>
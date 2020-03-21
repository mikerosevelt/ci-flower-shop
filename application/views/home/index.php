<section id="home-section" class="hero">
	<div class="home-slider owl-carousel">
		<div class="slider-item" style="background-image: url(assets/img/banner.jpg);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
					<div class="col-md-12 ftco-animate text-center">
						<!-- 	              <h1 class="mb-2">We serve Fresh Vegestables &amp; Fruits</h1>
				<h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2>
				<p><a href="<?= base_url('product'); ?>" class="btn btn-primary">View Details</a></p> -->
					</div>
				</div>
			</div>
		</div>
		<div class="slider-item" style="background-image: url(assets/img/banner-1.jpg);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
					<div class="col-sm-12 ftco-animate text-center">
						<h1 class="mb-2">100% Fresh Flower</h1>
						<h2 class="subheading mb-4">We deliver fresh Flower</h2>
						<p><a href="<?= base_url('product'); ?>" class="btn btn-primary">View Details</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section">
	<div class="container">
		<div class="row no-gutters ftco-services">
			<div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services mb-md-0 mb-2">
					<div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
						<span class="flaticon-shipped"></span>
					</div>
					<div class="media-body">
						<h3 class="heading">Free Shipping</h3>
						<span>On order over Rp.50.000</span>
					</div>
				</div>
			</div>
			<div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services mb-md-0 mb-2">
					<div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
						<span class="flaticon-diet"></span>
					</div>
					<div class="media-body">
						<h3 class="heading">Always Fresh</h3>
						<span>Product well package</span>
					</div>
				</div>
			</div>
			<div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services mb-md-0 mb-2">
					<div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
						<span class="flaticon-award"></span>
					</div>
					<div class="media-body">
						<h3 class="heading">Superior Quality</h3>
						<span>Quality Products</span>
					</div>
				</div>
			</div>
			<div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services mb-md-0 mb-2">
					<div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
						<span class="flaticon-customer-service"></span>
					</div>
					<div class="media-body">
						<h3 class="heading">Support</h3>
						<span>24/7 Support</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center mb-3 pb-3">
			<div class="col-md-12 heading-section text-center ftco-animate">
				<span class="subheading">Featured Products</span>
				<h2 class="mb-4">Our Products</h2>
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<?php foreach ($list as $li) : ?>
				<div class="col-md-6 col-lg-3 ftco-animate">
					<div class="product">
						<input type="hidden" name="id" id="id" value="<?= $li['id']; ?>">
						<a href="<?= base_url('product/detail/') . $li['id']; ?>" class="img-prod"><img class="img-fluid" src="<?= base_url('assets/img/') . $li['image']; ?>" alt="...">
							<div class="overlay"></div>
						</a>
						<div class="text py-3 pb-4 px-3 text-center">
							<h3><a href="#"><?= $li['name']; ?></a></h3>
							<div class="d-flex">
								<div class="pricing">
									<p class="price"><span class="price-sale">Rp.<?= number_format($li['price'], 0, ",", "."); ?></span></p>
								</div>
							</div>
							<form action="<?= base_url('product/addToCart'); ?>" method="POST" accept-charset="utf-8">
								<input type="hidden" name="id" value="<?= $li['id']; ?>" />
								<input type="hidden" name="name" value="<?= $li['name']; ?>" />
								<input type="hidden" name="price" value="<?= $li['price']; ?>" />
								<input type="hidden" name="image" value="<?= $li['image']; ?>" />
								<input type="hidden" name="quantity" value="1" />
								<div class="bottom-area d-flex px-3">
									<div class="m-auto d-flex">
										<input type="submit" name="add" class="btn btn-black" value="Add to cart">

										</button>
									</div>
							</form>
						</div>
					</div>
				</div>
		</div>
	<?php endforeach; ?>
	</div>

	</div>
</section>
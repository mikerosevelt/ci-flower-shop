 <div class="hero-wrap hero-bread" style="background-image: url('http://localhost/flower/assets/img/banner-1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a href="index.html">Product</a></span> <span>Product Detail</span></p>
            <h1 class="mb-0 bread">Product Detail</h1>
          </div>
        </div>
      </div>
    </div>
    
    <section class="ftco-section">
        <form method="POST" action="<?= base_url('product/addToCart'); ?>" accept-charset="utf-8">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-6 mb-5 ftco-animate">
    				<input type="hidden" name="id" id="id" value="<?= $item['id']; ?>">
    				<a href="<?= base_url('assets/img/'). $item['image']; ?>" class="image-popup"><img src="<?= base_url('assets/img/'). $item['image']; ?>" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
    				<h3><?= $item['name']; ?></h3>
    				<div class="rating d-flex">
							<p class="text-left mr-4">
								<a href="#" class="mr-2">5.0</a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
							</p>
							<p class="text-left mr-4">
								<a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Rating</span></a>
							</p>
							<p class="text-left">
								<a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>
							</p>
						</div>
    				<p class="price"><span>Rp.<?= number_format($item['price'],0,",","."); ?></span></p>
    				<p><?= $item['description']; ?>
						</p>
						<div class="row mt-4">
							<div class="col-md-6">
								<div class="form-group d-flex">
		              <div class="select-wrap">
	                   
	                </div>
		            </div>
							</div>
							<div class="w-100"></div>
							<div class="input-group col-md-6 d-flex mb-3">
	             	<input type="number" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
	          	</div>
	          	<div class="w-100"></div>
          	</div>
            <input type="hidden" name="id" value="<?= $item['id']; ?>" />
            <input type="hidden" name="name" value="<?= $item['name']; ?>" />
            <input type="hidden" name="price" value="<?= $item['price']; ?>" />
            <input type="hidden" name="image" value="<?= $item['image']; ?>" />
            <input type="hidden" name="quantity" value="1" />
          		<!-- <a href="#" name="add" data-replacement="submit" class="btn btn-black py-3 px-5 add">Add to Cart</a> -->
                <!-- <button type="submit" name="add" class="btn btn-light add">Add to Cart</button> -->
                <input type="submit" name="add" class="btn btn-black py-3 px-5" value="Add to Cart">
          			
    			</div>
    		</div>
    	</div>
        </form>
    </section>
    

<!-- RELATED PRODUCT -->
    <section class="ftco-section">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<span class="subheading">Products</span>
            <h2 class="mb-4">Related Products</h2>
            <!-- <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p> -->
          </div>
        </div>   		
    	</div>
    	<div class="container">
    		<div class="row justify-content-center">
                <div class="row ">
                <p class="text text-muted">No related products available</p>
                </div>
    			<!-- <div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="images/product-1.jpg" alt="Colorlib Template">
    						<span class="status">30%</span>
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="#">Bell Pepper</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span class="mr-2 price-dc">$120.00</span><span class="price-sale">$80.00</span></p>
		    					</div>
	    					</div>
	    					<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-menu"></i></span>
	    							</a>
	    							<a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
	    								<span><i class="ion-ios-cart"></i></span>
	    							</a>
	    							<a href="#" class="heart d-flex justify-content-center align-items-center ">
	    								<span><i class="ion-ios-heart"></i></span>
	    							</a>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div> -->
    			
    		</div>
    	</div>
    </section>

<!--     <script type="text/javascript">
        $(fuction() {
            $('.add').on('click', function() {
                console.log('ok');
            });
        });
    </script> -->
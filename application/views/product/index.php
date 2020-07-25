<div class="hero-wrap hero-bread" style="background-image: url('http://localhost/flower/assets/img/banner-1.jpg');">
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <p class="breadcrumbs"><span class="mr-2"><a href="<?= base_url(); ?>">Home</a></span> <span>Products</span></p>
        <h1 class="mb-0 bread">Products</h1>
      </div>
    </div>
  </div>
</div>

<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10 mb-5 text-center">
        <ul class="product-category">
          <li><a href="#" class="active">All</a></li>
          <li><a href="#">Mawar</a></li>
          <li><a href="#">Anggrek</a></li>
          <li><a href="#">Matahari</a></li>
          <li><a href="#">Tulip</a></li>
        </ul>
      </div>
    </div>

    <div class="row">
      <?php foreach ($list as $li) : ?>
        <div class="col-md-6 col-lg-3 ftco-animate">
          <div class="product">
            <a href="<?= base_url('product/detail/') . $li['id']; ?>" class="img-prod"><img class="img-fluid" src="<?= base_url('assets/img/') . $li['image']; ?>" alt="Colorlib Template">
              <div class="overlay"></div>
            </a>
            <div class="text py-3 pb-4 px-3 text-center">
              <h3><a href="<?= base_url('product/detail/') . $li['id']; ?>"><?= $li['name']; ?></a></h3>
              <div class="d-flex">
                <div class="pricing">
                  <p class="price"><span class="price-sale">Rp.<?= number_format($li['price'], 0, ",", "."); ?></span></p>
                </div>
              </div>
              <div class="bottom-area d-flex px-3">
                <div class="m-auto d-flex">
                  <a href="javascript:void(0)" title="Add to cart" class="buy-now d-flex justify-content-center align-items-center mx-1 btn-add-cart" data-id="<?= $li['id']; ?>" data-name="<?= $li['name']; ?>" data-price="<?= $li['price']; ?>" data-image="<?= $li['image']; ?>" data-quantity=1>
                    <span><i class="ion-ios-cart"></i></span>
                  </a>
                  <?php if ($this->session->userdata('status') == 'login') : ?>
                    <a href="javascript:void(0)" title="Add to wishlist" class="heart d-flex justify-content-center align-items-center btn-add-wishlist" data-id="<?= $li['id']; ?>">
                      <span><i class="ion-ios-heart"></i></span>
                    </a>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="col text-center">
      <?= $links; ?>
    </div>

  </div>
</section>
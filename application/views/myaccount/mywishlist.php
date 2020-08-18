<div class="hero-wrap hero-bread" style="background-image: url('<?= base_url('assets/') ?>images/bg_1.jpg');">
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Wishlist</span></p>
        <h1 class="mb-0 bread">My Wishlist</h1>
      </div>
    </div>
  </div>
</div>

<section class="ftco-section ftco-cart">
  <div class="container">
    <div class="row">
      <div class="col-md-12 ftco-animate">
        <?= $this->session->flashdata('message'); ?>
        <div class="cart-list">
          <table class="table">
            <thead class="thead-primary">
              <tr class="text-center">
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>Product Name & Description</th>
                <th>Price</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!$wishlist) : ?>
                <tr class="text-center">
                  <td colspan="6" class="h4 text-secondary">Your wishlist is empty!</td>
                </tr>
              <?php endif; ?>
              <?php foreach ($wishlist as $list) : ?>
                <tr class="text-center">
                  <td class="product-remove">
                    <a href="<?= base_url('/myaccount/remove/') . $list['id']; ?>"><span class="ion-ios-close"></span></a>
                  </td>
                  <td class="image-prod">
                    <div class="img" style="background-image:url(<?= base_url('assets/img/') . $list['image'] ?>);"></div>
                  </td>
                  <td class="product-name">
                    <h3><?= $list['name'] ?></h3>
                    <p><?= $list['description'] ?></p>
                  </td>
                  <td class="price">Rp.<?= number_format($list['price'], 0, ",", "."); ?></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr><!-- END TR-->
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
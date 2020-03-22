<!-- Header -->
<div class="header bg-default pb-6">
  <!-- Header container -->
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-8 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Detail product</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Dashboards</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('admin/products'); ?>">Products</a></li>
              <li class="breadcrumb-item active" aria-current="page">Detail product</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6 bg-default">
  <div class="row">
    <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
      <div class="card card-profile shadow bg-default" style="width: 18rem;">
        <img class="card-img-top" src="<?= base_url('assets/img/') . $detail['image']; ?>" alt="Card image cap">
        <div class="card-body pt-0 pt-md-0 text-white">
          <h3 class="card-title mt-3 text-white"><?= $detail['name']; ?></h3>
          <small>Added <?= date('d F Y H:i:s', $detail['date_added']); ?></small><br>
          <small>Rp.<?= number_format($detail['price'], 0, ",", "."); ?></small>
          <p class="card-text"><?= $detail['description']; ?></p>
        </div>
      </div>
    </div>
    <div class="col-xl-8 order-xl-1">
      <div class="card bg-default shadow">
        <div class="card-header bg-default border-0">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0 text-light">Product Detail</h3>
            </div>
            <div class="col-4 text-right">
              <a onclick="return confirm('Delete product?')" href="<?= base_url('admin/delete_product/') . $detail['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form method="post" action="<?= base_url('admin/editProduct'); ?>">
            <input type="hidden" name="id" value="<?= $detail['id']; ?>">
            <div class="pl-lg">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Product Name</label>
                    <input type="text" id="name" name="name" class="form-control bg-light form-control-alternative" value="<?= $detail['name']; ?>">
                    <?= form_error('name', '<small class="text-danger pl-1">', '</small>'); ?>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-email">Price</label>
                    <input type="text" id="price" name="price" class="form-control form-control-alternative bg-light" value="<?= $detail['price']; ?>">
                    <?= form_error('price', '<small class="text-danger pl-1">', '</small>'); ?>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Upload an image</label>
                    <input type="file" class="form-control-file" id="image" name="image" required value="<?= $detail['image']; ?>">
                  </div>
                </div>
              </div>
            </div>
            <hr class="my-2" />
            <!-- Description -->
            <h6 class="heading-small text-muted mb-2">About Product</h6>
            <div class="pl-lg-4">
              <div class="form-group">
                <label>Description</label>
                <textarea id="description" name="description" required rows="4" value="<?= $detail['description']; ?>" class="form-control form-control-alternative bg-light"></textarea>
                <?= form_error('description', '<small class="text-danger pl-1">', '</small>'); ?>
              </div>
            </div>
            <button type="submit" class="btn btn-info col-lg">Save Changes</button>
          </form>
        </div>
      </div>
    </div>
  </div>
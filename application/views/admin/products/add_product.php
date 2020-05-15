<div class="header bg-default pb-6">
  <!-- Header container -->
  <div class="container-fluid">
    <div class="row align-items-center py-4">
      <div class="col-lg-8 col-7">
        <h6 class="h2 text-white d-inline-block mb-0">Add new product</h6>
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
          <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Dashboards</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('admin/products'); ?>">Products</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add new product</li>
          </ol>
        </nav>
      </div>
      <div class="col-lg-4 col-5 text-right">
        <a href="#" class="btn btn-sm btn-danger">Cancel</a>
      </div>
    </div>
  </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6 bg-default">
  <div class="row">
    <div class="col-xl-8 order-xl">
      <div class="card bg-default shadow">
        <div class="card-header bg-default border-0">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0 text-light">Product Detail</h3>
            </div>
          </div>
        </div>
        <div class="card-body bg-default">
         <?= form_open_multipart('admin/addProduct'); ?>
          <!-- <form method="post" action="<?= base_url('admin/addProduct'); ?>" enctype="multipart/form-data"> -->
            <div class="pl-lg">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Product Name</label>
                    <input type="text" id="name" name="name" class="form-control form-control-alternative bg-light" placeholder="Product Name">
                    <?= form_error('name', '<small class="text-danger pl-1">', '</small>'); ?>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-email">Price</label>
                    <input type="text" id="price" name="price" class="form-control form-control-alternative bg-light" placeholder="10000">
                    <?= form_error('price', '<small class="text-danger pl-1">', '</small>'); ?>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="custom-file">
                    <label>Upload an image</label>
                    <input type="file" class="form-control-file" id="image" name="image">
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
                <textarea id="description" name="description" rows="4" class="form-control form-control-alternative bg-light" placeholder="A few words about product ..."></textarea>
                <?= form_error('description', '<small class="text-danger pl-1">', '</small>'); ?>
              </div>
            </div>
            <button type="submit" class="btn btn-info col-lg">Add Product</button>
          <!-- </form> -->
          <?= form_close(); ?>
        </div>
      </div>
    </div>
  </div>
<div class="header pb-8 pt-5 pt-md-8 bg-gradient-default">
  <!-- Mask -->
  <span class="mask opacity-8"></span>
  <!-- Header container -->
  <div class="container-fluid d-flex align-items-center">
    <div class="row">
      <div class="col-lg col-md-0">
        <h1 class="text-white">Add New Product</h1>
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
              <h3 class="mb-0">Product Detail</h3>
            </div>
          </div>
        </div>
        <div class="card-body bg-default">
          <form method="post" action="<?= base_url('admin/addProduct'); ?>">
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
                <textarea id="description" name="description" rows="4" class="form-control form-control-alternative" placeholder="A few words about product ..."></textarea>
                <?= form_error('description', '<small class="text-danger pl-1">', '</small>'); ?>
              </div>
            </div>
            <button type="submit" class="btn btn-info col-lg">Add Product</button>
          </form>
        </div>
      </div>
    </div>
  </div>
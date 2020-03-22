<!-- Header -->
<div class="header bg-default pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <!-- <div class="row align-items-center py-4">
        <a class="btn btn-light" href="<?= base_url('admin/orders'); ?>" class="btn btn-sm btn-danger">back</a>
      </div> -->
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">#<?= $detail['order_number'] ?> <?= $detail['shipping_name'] ?></h6>
          <div>
            <a class="btn btn-sm btn-neutral mt-2" href="<?= base_url('admin/orders'); ?>" class="btn btn-sm btn-danger">back</a>
          </div>
        </div>
        <div class="col-lg-6 col-5 text-right">
          <a href="#" class="btn btn-sm btn-neutral">New</a>
          <a href="#" class="btn btn-sm btn-neutral">Filters</a>
        </div>
      </div>
      <!-- Card stats -->
      <div class="row">
        <div class="col-xl col-lg-6">
          <div class="card shadow card-stats mb-3 mb-xl-0 bg-transparent">
            <div class="card-body">
              <table class="table-striped table-dark" width="100%">
                <tbody>
                  <tr>
                    <td width="50%" class="">Date / Time</td>
                    <td width="50%"><?= date('d F Y H:i:s', $detail['date_order']); ?></td>
                  </tr>
                  <tr>
                    <td width="50%">Order #</td>
                    <td width="50%"><?= $detail['order_number'] ?></td>
                  </tr>
                  <tr>
                    <td width="50%">Customer</td>
                    <td width="50%"><?= $detail['shipping_name'] ?></td>
                  </tr>
                  <tr>
                    <td width="50%">Shipping</td>
                    <td width="50%"><?= $detail['shipping_address'] ?></td>
                  </tr>
                  <tr>
                    <td width="50%"></td>
                    <td width="50%"><?= $detail['shipping_city'] ?>, <?= $detail['shipping_state'] ?>, <?= $detail['shipping_zipcode'] ?></td>
                  </tr>
                  <tr>
                    <td width="50%"></td>
                    <td width="50%"><?= $detail['shipping_country'] ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-xl col-lg-6">
          <div class="card shadow card-stats mb-3 mb-xl-0 bg-transparent">
            <div class="card-body">
              <table class="table-striped table-dark" width="100%">
                <tbody>
                  <tr>
                    <td width="50%">Payment Method</td>
                    <td width="50%"><?= $detail['payment_method'] ?></td>
                  </tr>
                  <tr>
                    <td width="50%">Total</td>
                    <td width="50%">Rp.<?= number_format($detail['total'], 0, ",", "."); ?></td>
                  </tr>
                  <tr>
                    <td width="50%">Invoice #</td>
                    <td width="50%">1</td>
                  </tr>
                  <tr>
                    <td width="50%">Status</td>
                    <td width="50%">
                      <input type="hidden" name="id" value="<?= $detail['id']; ?>" id="id">
                      <select name="orderStatus" class="" id="orderStatus">
                        <?php foreach ($orderstat as $os) : ?>
                          <?php if ($detail['status'] == $os) : ?>
                            <option value="<?= $os ?>" selected><?= $os ?></option>
                          <?php else : ?>
                            <option value="<?= $os ?>"><?= $os ?></option>
                          <?php endif; ?>
                        <?php endforeach; ?>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td width="50%">Payment Status</td>
                    <td width="50%">
                      <select name="payStatus" class="" id="payStatus">
                        <?php foreach ($paystatus as $ps) : ?>
                          <?php if ($detail['payment_status'] == $ps) : ?>
                            <option value="<?= $ps ?>" selected><?= $ps ?></option>
                          <?php else : ?>
                            <option value="<?= $ps ?>"><?= $ps ?></option>
                          <?php endif; ?>
                        <?php endforeach; ?>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td width="50%">IP Address</td>
                    <td width="50%"><?= $detail['ipaddress'] ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid mt--6 bg-default">
  <div class="row mt-5">
    <div class="col-xl mb-5 mb-xl">
      <div class="card shadow bg-default">
        <div class="card-header mb-2 border-0 bg-default">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0 text-light">Item List</h3>
            </div>
          </div>
        </div>
        <div class="table-responsive mb-3">
          <table class="table table-dark" id="datatable-basic">
            <thead class="thead-dark">
              <th scope="col">Product</th>
              <th scope="col">Price</th>
              <th scope="col">Quantity</th>
              <th scope="col">Subtotal</th>
            </thead>
            <tbody>
              <?php foreach ($items as $i) : ?>
                <tr>
                  <td><?= $i['items']; ?></td>
                  <td><?= $i['price']; ?></td>
                  <td><?= $i['quantity']; ?></td>
                  <td><?= $i['subtotal']; ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
            <tfoot class="thead-dark">
              <th colspan="2" class="text-right">Total :</th>
              <th colspan="2" class="">Rp.<?= number_format($detail['total'], 0, ",", "."); ?></th>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
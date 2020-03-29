  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <br>
        <h1 class="mt-3 bread">My Order</h1>
      </div>
    </div>
  </div>
  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="table-responsive-sm">
          <table class="table table-sm table-hover table-sortable">
            <thead class="thead-light">
              <th>No</th>
              <th>Order #</th>
              <th>Order Date</th>
              <th>Total Price</th>
              <th>Status</th>
            </thead>
            <tbody>
              <?php if (!$myorder) : ?>
                <tr>
                  <td colspan="5" class="text-center">You haven't make an order yet</td>
                </tr>
              <?php endif; ?>
              <?php $n = 1;
              foreach ($myorder as $res) : ?>
                <tr>
                  <td><?= $n++; ?></td>
                  <td><a href="<?= base_url('myaccount/orderdetail/') . $res['id']; ?>"><?= $res['id']; ?></a></td>
                  <td><?= date('d F Y H:i:s', $res['date_order']); ?></td>
                  <td>Rp.<?= number_format($res['total'], 0, ",", "."); ?></td>
                  <td><?= $res['status']; ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
            <tfoot class="thead-light">
              <th>No</th>
              <th>Order #</th>
              <th>Order Date</th>
              <th>Total Price</th>
              <th>Status</th>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </section> <!-- .section -->
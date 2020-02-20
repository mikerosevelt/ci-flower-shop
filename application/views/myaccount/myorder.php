      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<br>
            <h1 class="mt-3 bread">My Order</h1>
          </div>
        </div>
      </div>

<?php
$id = $user['id'];
$query = "SELECT `order`.*, `order_detail`.*, `order_status`.status,`order_status`.color
          FROM `order`
          JOIN `order_detail` ON `order_detail`.`order_id` = `order`.`id`
          JOIN `order_status` ON `order_status`.`id` = `order`.`status_id`
          WHERE `order`.`user_id` = $id";
$result = $this->db->query($query)->result_array();
 ?>
    
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          	<div class="table-responsive-sm">
          		<table class="table table-sm table-hover table-sortable">
          			<thead>
          				<th>#</th>
          				<th>Items</th>
          				<th>Order Date</th>
          				<th>Total Price</th>
          				<th>Status</th>
          			</thead>
          			<tbody>
          				<?php foreach ($result as $res) : ?>
          			<tr>
          				<td><?= $res['order_number']; ?></td>
          				<td><?= $res['items']; ?></td>
          				<td><?= date('H:i:s d F Y', $res['date_order']); ?></td>
          				<td>Rp.<?= number_format($res['total'], 0, ",", "."); ?></td>
          				<td><?= $res['status']; ?></td>
          			</tr>
          		<?php endforeach; ?>
          		</tbody>
          		</table>
          	</div>
        </div>
      </div>
    </section> <!-- .section -->
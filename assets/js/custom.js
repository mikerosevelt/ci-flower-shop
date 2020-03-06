// UPDATE ORDER STATUS
$('#orderStatus').on('change', function() {
  let id = $("#id").val();
  let status = this.value;
  $.post("http://localhost/flower/admin/updateOrderStatus", {id: id, status: status});
});

// UPDATE PAYMENT STATUS
$('#payStatus').on('change', function() {
  let id = $("#id").val();
  let status = this.value;
  $.post("http://localhost/flower/admin/updateOrderPayStatus", {id: id, status: status});
});
// The url is on admin_footer file

// UPDATE ORDER STATUS
$('#orderStatus').on('change', function() {
  let id = $("#id").val();
  let status = this.value;
  $.post(`${url}admin/updateOrderStatus`, {id: id, status: status});
});

// UPDATE PAYMENT STATUS
$('#payStatus').on('change', function() {
  let id = $("#id").val();
  let status = this.value;
  $.post(`${url}admin/updateOrderPayStatus`, {id: id, status: status});
});

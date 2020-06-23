$(function() {
// Province select to get City/Suburb
	$("#province").on("change", function () {
		const id = $(this).val();
		$.post(`${url}cart/getCity`, { id: id }, function (data) {
			$("#city").html(data);
			$("#city").removeAttr("disabled");
		});
	});

	// Set postcode
	$("#city").on("change", function () {
		const selected = $(this).find("option:selected");
		const postcode = selected.data("postcode");
		$("#postcode").val(postcode);
		$("#postcode").removeAttr("disabled");
	});

	// Get shipping cost
	$("#estimate").on("click", function () {
		const cityid = $("#city").val();
		$.ajax({
			url: `${url}cart/test`,
			data: {cityid: cityid},
			method:'post',
			dataType: 'json',
			success: function(data) {
				// console.log(data)
			}
		})	
	});
});
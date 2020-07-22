$(function () {
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
		const list = $("#list-service");
		$.ajax({
			url: `${url}cart/test`,
			data: { cityid: cityid },
			method: "post",
			async: true,
			dataType: "json",
			success: function (data) {
				let li = data.map((d) => {
					let service = d.costs.map((c) => {
						return `<input type="radio" name="shipping" id="shipping" value="${c.cost[0].value}"/> <label for="shipping">${c.service} Rp.${c.cost[0].value} (${c.cost[0].etd} day)</label><br>`;
					});
					return `<li class="list-item">${d.name}</li>${service}`;
				});
				list.empty();
				list.append(li[0]);
			},
		});
	});
});

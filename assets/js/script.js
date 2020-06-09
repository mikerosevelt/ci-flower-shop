$(function () {
	// Btn add to cart
	$(".btn-add-cart").on("click", function () {
		const id = $(this).data("id");
		const name = $(this).data("name");
		const price = $(this).data("price");
		const image = $(this).data("image");
		const quantity = $(this).data("quantity");
		$.post(
			`${url}product/addToCart`,
			{ id: id, name: name, price: price, image: image, quantity: quantity },
			function () {
				// console.log('added');
				loadTotal();
			}
		);
	});

	function loadTotal() {
		$.get(`${url}product/loadTotalPrice`, function (data) {
			$("#total").html(`<span class="icon-shopping_cart"></span>[Rp.${data}]`);
		});
	}

	// Btn add to wishlist
	$(".btn-add-wishlist").on("click", function () {
		const id = $(this).data("id");
		$.post(`${url}product/addWishlist`, { id: id }, function () {
			alert("added to wishlist");
		});
	});

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
		$.post(`${url}cart/getCost`, { cityid: cityid }, function (data) {
			$("#list-courier").html(data);
			// console.log(data);
		});
	});
	/** End of document.ready func() */
});

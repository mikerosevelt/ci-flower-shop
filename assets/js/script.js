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
		$.post(`${url}product/addWishlist`, { id: id }, function (data) {
			alert(data);
		});
	});

	/** End of document.ready func() */
});

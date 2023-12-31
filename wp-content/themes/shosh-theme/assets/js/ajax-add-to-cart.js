(function ($) {
	// Update mini cart data
	var data2 = {
		'action': 'mode_theme_update_mini_cart'
	};
    $(document).on('click', '.single_add_to_cart_button', function (e) {
        e.preventDefault();

        var $thisbutton = $(this),
                $form = $thisbutton.closest('form.cart'),
                id = $thisbutton.val(),
                product_qty = $form.find('input[name=quantity]').val() || 1,
                product_id = $form.find('input[name=product_id]').val() || id,
                variation_id = $form.find('input[name=variation_id]').val() || 0;

        var data = {
            action: 'woocommerce_ajax_add_to_cart',
            product_id: product_id,
            product_sku: '',
            quantity: product_qty,
            variation_id: variation_id,
        };

        $(document.body).trigger('adding_to_cart', [$thisbutton, data]);

        $.ajax({
            type: 'post',
            url: wc_add_to_cart_params.ajax_url,
            data: data,
            beforeSend: function (response) {
                $thisbutton.removeClass('added').addClass('loading');
            },
            complete: function (response) {
                $thisbutton.addClass('added').removeClass('loading');
            },
            success: function (response) {

                if (response.error && response.product_url) {
                    window.location = response.product_url;
                    return;
                } else {
                    $(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash, $thisbutton]);
					// Update mini cart
					$.post(
						woocommerce_params.ajax_url, // The AJAX URL
						data2, // Send our PHP function
						function(response){
							$('#mode-mini-cart').html(response).parents("section#mini-cart").addClass("active");
						}
					);
                }
            },
        });

        return false;
    });

    // Remove Button
	// Ajax delete product in the cart
	$(document).on('click', '#mini-cart-list a.remove', function (e) {
		e.preventDefault();
		
		var product_id = $(this).attr("data-product_id"),
			cart_item_key = $(this).attr("data-cart_item_key"),
			product_container = $(this).parent('.mini_cart_item');

		// Add loader
		product_container.block({
			message: null,
			overlayCSS: {
				cursor: 'none'
			}
		});

		$.ajax({
			type: 'POST',
			dataType: 'json',
			url: wc_add_to_cart_params.ajax_url,
			data: {
				action: "product_remove",
				product_id: product_id,
				cart_item_key: cart_item_key
			},
			success: function(response) {
				if ( ! response || response.error )
					return;

				$('#mode-mini-cart').html(response);
			}
		});
	});
	
})(jQuery);
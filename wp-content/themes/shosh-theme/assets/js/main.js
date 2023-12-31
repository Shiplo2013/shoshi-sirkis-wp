jQuery(document).ready(function() {
    // Mobile Menu
	jQuery("button#menu-btn").click(function() {
		jQuery(this).parent(".site-branding.fix").next("nav#site-navigation").addClass("active");
	});
	jQuery("button#close-btn").click(function() {
		jQuery(this).parents("nav#site-navigation").removeClass("active");
	});
    // Cart Button
    jQuery("ul#primary-menu button.cart-link").click(function() {
        if(jQuery(window).width() < 900) {
            jQuery(this).parents("nav#site-navigation").removeClass("active").parents("body").find("#mini-cart").addClass("active");
        } else {
            jQuery(this).parents("body").find("#mini-cart").addClass("active");
        }
    });
    jQuery("ul#works-menu button.cart-link").click(function() {
        jQuery(this).parents("#works-popup").removeClass("active").prev("#mini-cart").addClass("active");
    });

    // Mini Cart Close
    jQuery("button#cart-close, .mini-cart-overlay.fix").click(function() {
        jQuery(this).parent("#mini-cart").removeClass("active");
    });

    // Menu Link
    jQuery("ul#primary-menu > li.menu-item-type-custom > a, ul#home-footer-menu > li.menu-item-type-custom > a").click(function(e) {
        // Work Popup
        if(e.target.hash === "#works-popup") {
            e.preventDefault();
            if(jQuery(window).width() < 900) {
				if(jQuery('body').find("nav#site-navigation").length !== 0) {
                	jQuery(this).parents("nav#site-navigation").removeClass("active").parents("body").find("#works-popup").addClass("active");
				} else if(jQuery('body').find("nav#blog-navigation").length !== 0) {
					jQuery(this).parents("#blog-menu-area").removeClass("active").parents("body").find("#works-popup").addClass("active");
				}
            } else {
                jQuery("#works-popup").addClass("active");
            }
        }
        // Contact Popup
        if(e.target.hash === "#contact-popup") {
            e.preventDefault();
            if(jQuery(window).width() < 900) {
                if(jQuery('body').find("nav#site-navigation").length !== 0) {
                	jQuery(this).parents("nav#site-navigation").removeClass("active").parents("body").find("#contact-popup").addClass("active");
				} else if(jQuery('body').find("nav#blog-navigation").length !== 0) {
					jQuery(this).parents("#blog-menu-area").removeClass("active").parents("body").find("#contact-popup").addClass("active");
				}
            } else {
                jQuery("#contact-popup").addClass("active");
            }
        }
    });
	// Mobile Home Footer Menu
	if(jQuery(window).width() < 767) {
		jQuery("ul#home-footer-menu > li.menu-item-type-custom > a").click(function(e) {
			// Work Popup
			if(e.target.hash === "#works-popup") {
				e.preventDefault();
				jQuery("#works-popup").addClass("active");
			}
		});
	}
	jQuery("ul#works-menu > li.menu-item-type-custom > a").click(function(e) {
		if(e.target.hash === "#works-popup") {
            e.preventDefault();
        }
        if(e.target.hash === "#contact-popup") {
            e.preventDefault();
            if(jQuery(window).width() < 900) {
                jQuery(this).parents("#works-popup").removeClass("active").parents("body").find("#contact-popup").addClass("active");
            } else {
                jQuery("#contact-popup").addClass("active");
            }
        }
	});
	// Works Page Menu
	jQuery('button.works-menu-btn').click(function() {
		jQuery(this).parents("body").find("#works-popup").addClass("active")
	});

    // Work Close
    jQuery("#work-close").click(function() {
        jQuery(this).parents("#works-popup").removeClass("active");
    });
    // Contact Close
    jQuery("#contact-close").click(function() {
        jQuery(this).parents("#contact-popup").removeClass("active");
    });

    // Work Links
    jQuery("a.single-work").mouseover(function() {
        var workID = jQuery(this).attr("data-id");
        jQuery(this).addClass("active").siblings("a").removeClass("active").parent(".works-links").next(".works-images").find("#work-"+workID).addClass("active").siblings(".single-work-image").removeClass("active");
    });
	
	// Menu Image
	jQuery(".single-category.fix>a").mousemove(function(e){
		const linkImage = jQuery(this).find('img.menu-image');
		if(linkImage.length !== 'undefined') {
			let pTop = e.pageY - linkImage.parent("a").offset().top;
			let pLeft = e.pageX - linkImage.parent("a").offset().left;
			linkImage.css({"left": pLeft, "top": pTop}).fadeIn().parents(".single-category").addClass("hover");
		}
	});
	jQuery(".single-category.fix>a").mouseleave(function(e){
		jQuery(this).find('img.menu-image').fadeOut().parents(".single-category").removeClass("hover");
	});

    // Blog Menu
    jQuery("ul#primary-menu > li > ul.sub-menu > li.categories>a").click(function(e) {
		e.preventDefault();
        jQuery("section#blog-menu-area").addClass("active");
    });
    jQuery("button.close-blog-menu").click(function() {
        jQuery(this).parents("#blog-menu-area").removeClass("active");
    });

    // Blog Search
    jQuery("button.blog-search, a.search-again").click(function() {
        jQuery("section#blog-search").addClass("active");
    });
    jQuery("button.search-close").click(function(){
        jQuery(this).parents("section#blog-search").removeClass("active");
    });
	
	// Header Activation
	jQuery(window).scroll(function() {
		if(jQuery(window).scrollTop() > (jQuery(window).width()*1.2)){
			jQuery("body.home header#masthead").addClass("active");
		} else {
			jQuery("body.home header#masthead").removeClass("active");
		}
		// Mobile Menu
		if(jQuery(window).scrollTop() > 10 && jQuery(window).width() < 900){
			jQuery("header#masthead").addClass("fixed");
		} else {
			jQuery("header#masthead").removeClass("fixed");
		}
	});
	
	// Scroll Bar
	if(jQuery("#scrollBar").length !== 0) {
		const scrollTween = gsap.to("#scrollBar", {xPercent: -400, ease: "none", paused: true});

		function updateScrollBar() {
			scrollTween.progress(scrollY / (document.body.scrollHeight - innerHeight));
		}
		window.addEventListener("resize", updateScrollBar);
		window.addEventListener("scroll", updateScrollBar);
	}
});

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
							console.log(response);
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
	
	$(document.body).trigger('wc_fragment_refresh');
	
})(jQuery);
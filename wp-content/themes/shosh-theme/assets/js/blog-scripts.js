// Script For Blog Page
jQuery(document).ready(function() {
// Desktop View => Posts page
if((jQuery(window).width() > 900) && (jQuery('body').hasClass('blog')  || (jQuery('body').hasClass('search') && !jQuery('body').hasClass('search-no-results')) || jQuery('body').hasClass('archive') ) ) {
  let sections = document.querySelectorAll("article.post");
  let scrollContainer = document.querySelector(".blog-container");
  let maxwidth = 0;

  const getMaxWidth = () => {
    maxwidth = 0;
    sections.forEach((article) => {
      maxwidth += article.offsetWidth;
    });
	  sections.forEach((article) => {
		  gsap.set( article, { x: - (maxwidth - window.innerWidth) })
	  });
  };
  getMaxWidth();
  ScrollTrigger.addEventListener("refreshInit", getMaxWidth);
	jQuery("#post-loader").fadeOut();
	
	let scrollTween = gsap.to(sections, {
		x: 0,
	});

  let horizontalScroll = ScrollTrigger.create({
    animation: scrollTween,
    trigger: scrollContainer,
    start: "top top",
    end: () => "+=" + scrollContainer.offsetWidth,
    pin: true,
    anticipatePin: 1,
    scrub: 2,
    invalidateOnRefresh: true
  });
	
	// Ajax Blog Posts
	/*let windowHeight = jQuery(window).height();
	let documentHeight = jQuery(document).height();
	let page_count = 0;
	jQuery(window).scroll(() => {
		let userTop = jQuery(document).scrollTop();
		if(userTop > ((documentHeight - windowHeight) - 100)) {
			console.log("Show posts...");
			console.log(page_count);
			let pageNumber = 2;
			let str = '&pageNumber=' + pageNumber + '&action=shosh_load_more_post_ajax';
			if(page_count === 0) {
				jQuery.ajax({
					type: "POST",
					dataType: "html",
					url: ajax_params.ajaxurl,
					data: str,
					success: function(response){
						if( response){
							let data = JSON.parse(response);
							jQuery(".blog-container").append(data.html);
							//horizontalScroll.kill();
							let sections = document.querySelectorAll("article.post");
							getMaxWidth()
							let scrollTween = gsap.to(sections, {
								x: 0,
							});
							
							//horizontalScroll.end(scrollContainer.offsetWidth);
							//horizontalScroll.addEventListener("refreshInit", getMaxWidth);
							//horizontalScroll.refresh(true);
							scrollTween.restart();
						}
					}
				});
			}
			page_count++;
		} 
	});*/
}
// Script For single-post
if((jQuery(window).width() > 900) && jQuery('body').hasClass('single-post') ) {
	let sections = document.querySelectorAll(".blog-section");
	let scrollContainer = document.querySelector(".blog-container");
	let maxWidth = 0;

	const getMaxWidth = () => {
		maxWidth = 0;
		sections.forEach((section) => {
			maxWidth += section.offsetWidth;
		});
		sections.forEach((section) => {
			gsap.set( section, { x: - (maxWidth - window.innerWidth) })
		});
	};
	getMaxWidth();
	ScrollTrigger.addEventListener("refreshInit", getMaxWidth);
	jQuery("#post-loader").fadeOut();

  	//ScrollTrigger.defaults({markers: {startColor: "red", endColor: "green"}});

	let scrollTween = gsap.to(sections, {
		x: 0,
		//xPercent: contWidth,
		ease: "none",
	});

	let horizontalScroll = ScrollTrigger.create({
		animation: scrollTween,
		trigger: scrollContainer,
		start: "top top",
		end: () => "+=" + scrollContainer.offsetWidth,
		pin: true,
		anticipatePin: 1,
		scrub: 2,
		invalidateOnRefresh: true
	});
	// News Ticker
	gsap.registerEffect({
		name: "ticker",
		effect(targets, config) {
			buildTickers({
				targets: targets,
				clone: config.clone || (el => {
					let clone = el.children[0].cloneNode(true);
					el.insertBefore(clone, el.children[0]);
					return clone;
				})
			});
			function buildTickers(config, originals) {
				let tickers;
				if (originals && originals.clones) { // on window resizes, we should delete the old clones and reset the widths
					originals.clones.forEach(el => el && el.parentNode && el.parentNode.removeChild(el));
					originals.forEach((el, i) => originals.inlineWidths[i] ? (el.style.width = originals.inlineWidths[i]) : el.style.removeProperty("width"));
					tickers = originals;
				} else {
					tickers = config.targets;
				}
				const clones = tickers.clones = [],
					  inlineWidths = tickers.inlineWidths = [];
				tickers.forEach((el, index) => {
					inlineWidths[index] = el.style.width;
					el.style.width = "10000px"; // to let the children grow as much as necessary (otherwise it'll often be cropped to the viewport width)
					el.children[0].style.display = "inline-block";
					let width = el.children[0].offsetWidth,
						cloneCount = Math.ceil(window.innerWidth / width),
						right = el.dataset.direction === "right",
						i;
					el.style.width = width * (cloneCount + 1) + "px";
					for (i = 0; i < cloneCount; i++) {
						clones.push(config.clone(el));
					}
					gsap.fromTo(el, {
						x: right ? -width : 0
					}, {
						x: right ? 0 : -width,
						duration: width / 100 / parseFloat(el.dataset.speed || 1),
						repeat: -1,
						overwrite: "auto",
						ease: "none"
					});
				});
				// rerun on window resizes, otherwise there could be gaps if the user makes the window bigger.
				originals || window.addEventListener("resize", () => buildTickers(config, tickers));
			}
		}
	});

	gsap.effects.ticker(".animated-title-init");
}

	// Mobile View of scroll top button
	if(jQuery(window).width() < 767) {
		// Fixed Scroll top button
		jQuery(window).scroll(function() {
			if(jQuery(document).scrollTop() > 200) {
				jQuery("button#back-to-top").addClass('active');
			} else {
				jQuery("button#back-to-top").removeClass('active');
			}
		});
	}

	// Header Activation
	jQuery(window).scroll(function() {
		if(jQuery(window).scrollTop() > 50){
			jQuery("header#masthead").addClass("active");
		} else {
			jQuery("header#masthead").removeClass("active");
		}
		jQuery("nav#site-navigation").removeClass("active");
	});
	// Copy Clipebord
	jQuery("button#copy-button").click(function() {
		/* Get the text field */
		var pageUrl = window.location.href;
		navigator.clipboard.writeText(pageUrl);

		/* Alert the copied text */
		jQuery(this).find("span.tooltip").fadeIn();
		setTimeout(function() {
			jQuery("button#copy-button").find("span.tooltip").fadeOut();
		}, 2000);
	});
	
	// Click to go comments section
	jQuery("a.goComment").click(function(e) {
		e.preventDefault();
		if(jQuery(window).width() > 767) {
			jQuery('html, body').animate({scrollTop : (-jQuery("#comment-section").offset().left)+window.innerWidth+jQuery("#comment-section").width()}, 500);
			return false;
		} else {
			jQuery('html, body').animate({scrollTop : jQuery("#comment-section").offset().top}, 500);
			return false;
		}
	});
	jQuery("#back-to-top").click(function() {
		jQuery('html, body').animate({scrollTop : 0}, 500);
		return false;
	});
	// Scroll to the comments section
	let commentHast = window.location.hash;
	if(commentHast){
		jQuery('html, body').animate({scrollTop : (-jQuery("#comment-section").offset().left)+window.innerWidth+jQuery("#comment-section").width()}, 500);
		return false;
	};
});

/*
 * Let's begin with validation functions
 */
 jQuery.extend(jQuery.fn, {
	/*
	 * check if field value lenth more than 3 symbols ( for name and comment ) 
	 */
	validate: function () {
		if (jQuery(this).val().length < 3) {jQuery(this).addClass('error');return false} else {jQuery(this).removeClass('error');return true}
	},
	/*
	 * check if email is correct
	 * add to your CSS the styles of .error field, for example border-color:red;
	 */
	validateEmail: function () {
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/,
		    emailToValidate = jQuery(this).val();
		if (!emailReg.test( emailToValidate ) || emailToValidate == "") {
			jQuery(this).addClass('error');return false
		} else {
			jQuery(this).removeClass('error');return true
		}
	},
});
 
jQuery(function($){

	/*
	 * On comment form submit
	 */
	$( '#commentform' ).submit(function(e){
		e.preventDefault();
		// define some vars
		var button = $('#submit'), // submit button
		    respond = $('#respond'), // comment form container
		    commentlist = $('.commentlist'), // comment list container
		    cancelreplylink = $('#cancel-comment-reply-link');
			
		// if user is logged in, do not validate author and email fields
		if( $( '#author' ).length ) {
			$( '#author' ).removeClass('error').validate();
		} else {
			$( '#author' ).addClass('error');
		}
		
		if( $( '#email' ).length ) {
			$( '#email' ).removeClass("error").validateEmail();
		} else {
			$( '#email' ).addClass("error");
		}
			
		// validate comment in any case
		if( $( '#comment' ).length ) {
			$( '#comment' ).removeClass("error").validate();
		} else {
			$( '#comment' ).addClass("error");
		}
		
		// if comment form isn't in process, submit it
		if ( !button.hasClass( 'loadingform' ) && !$( '#author' ).hasClass( 'error' ) && !$( '#email' ).hasClass( 'error' ) && !$( '#comment' ).hasClass( 'error' ) ){
			
			// ajax request
			$.ajax({
				type : 'POST',
				url : ajax_params.ajaxurl, // admin-ajax.php URL
				data: $(this).serialize() + '&action=ajaxcomments', // send form data + action parameter
				beforeSend: function(xhr){
					// what to do just after the form has been submitted
					button.addClass('loadingform').val('Loading...');
				},
				error: function (request, status, error) {
					if( status == 500 ){
						alert( 'Error while adding comment' );
					} else if( status == 'timeout' ){
						alert('Error: Server doesn\'t respond.');
					} else {
						// process WordPress errors
						var wpErrorHtml = request.responseText.split("<p>"),
							wpErrorStr = wpErrorHtml[1].split("</p>");
							
						alert( wpErrorStr[0] );
					}
				},
				success: function ( addedCommentHTML ) {
				
					// if this post already has comments
					if( commentlist.length > 0 ){
					
						// if in reply to another comment
						if( respond.parent().hasClass( 'comment' ) ){
						
							// if the other replies exist
							if( respond.parent().children( '.children' ).length ){	
								respond.parent().children( '.children' ).append( addedCommentHTML );
							} else {
								// if no replies, add <ol class="children">
								addedCommentHTML = '<ul class="children">' + addedCommentHTML + '</ul>';
								respond.parent().append( addedCommentHTML );
							}
							// close respond form
							cancelreplylink.trigger("click");
						} else {
							// simple comment
							commentlist.append( addedCommentHTML );
						}
					}else{
						// if no comments yet
						addedCommentHTML = '<ol class="commentlist">' + addedCommentHTML + '</ol>';
						respond.before( $(addedCommentHTML) );
					}
					// clear textarea field
					$('#comment').val('');
				},
				complete: function(){
					// what to do after a comment has been added
					button.removeClass( 'loadingform' ).val( 'להגיב' );
				}
			});
		}
		return false;
	});
});
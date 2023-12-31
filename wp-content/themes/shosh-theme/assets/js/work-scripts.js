// Script For single-works-items
if((jQuery(window).width() > 900) && jQuery('body').hasClass('single-work-items') ) {
	let sections = document.querySelectorAll(".blog-section");
	let scrollContainer = document.querySelector(".blog-container");
	let maxWidth = 0;

	const getMaxWidth = () => {
		maxwidth = 0;
		sections.forEach((section) => {
			maxwidth += section.offsetWidth;
		});
		sections.forEach((section) => {
			gsap.set( section, { x: - (maxwidth - window.innerWidth) })
		});
	};
	getMaxWidth();
	ScrollTrigger.addEventListener("refreshInit", getMaxWidth);

	let scrollTween = gsap.to(sections, {
		x: 0,
		ease: "none",
	});

	let horizontalScroll = ScrollTrigger.create({
		animation: scrollTween,
		trigger: scrollContainer,
		pin: true,
		scrub: 2,
		end: () => "+=" + scrollContainer.offsetWidth,
		invalidateOnRefresh: true
	});
}

jQuery(document).ready(function() {
	const swiper = new Swiper('.swiper', {
	  loop: true,
	  // Navigation arrows
	  navigation: {
		nextEl: '.swiper-button-next',
		prevEl: '.swiper-button-prev',
	  },
	});
	
});
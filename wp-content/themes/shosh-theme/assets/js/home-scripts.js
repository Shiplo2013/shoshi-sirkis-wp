if((jQuery(window).width() > 900) && (jQuery('body').hasClass('home')) ) {

let sections = document.querySelectorAll(".section");
let scrollContainer = document.querySelector(".scrollContainer");
let maxWidth = 0;

if(sections.length !== 0 && scrollContainer.length !== 0) {
  
const getMaxWidth = () => {
  maxWidth = 0;
  sections.forEach((section) => {
    maxWidth += section.offsetWidth;
  });
};
getMaxWidth();
ScrollTrigger.addEventListener("refreshInit", getMaxWidth);

//ScrollTrigger.defaults({markers: {startColor: "red", endColor: "green"}});

let scrollTween = gsap.to(sections, {
  x: () => `-${maxWidth - window.innerWidth}`,
  //xPercent: contWidth,
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

// Cursor Follower
// Cursor Follower Function
/**function moveCircle(e) {
	//console.log(e);
	gsap.to('#cursorFollower', { x: e.clientX, y: e.clientY});
}
if(document.querySelector("#cursorFollower")) {
	gsap.set('#cursorFollower', { xPercent: '-110', yPercent: '100', opacity:1});
}**/
// Home Title Position
///gsap.set(".home-section-title", {xPercent: -10});
  // Images Position
gsap.set(".home-image6, .home-image8", {xPercent: -40, scale: 0.5});
//gsap.set(".home-image10", {yPercent: -40, scale: 0.5});
gsap.set(".home-image14", {xPercent: -40, yPercent: 20, scale: 0.5});
gsap.set(".home-image19", {yPercent: 80});
// Home Title Position
gsap.set(".home-image7", {xPercent: -20});

// Home Title  Animation
gsap.to(".home-section-title", {
  xPercent: 20,
  duration: 2,
  ease: "none",
  scrollTrigger: {
    trigger: ".home-section2",
    containerAnimation: scrollTween,
    start: "center 150%",
    end: "center -50%",
    scrub: 2,
  }
});
// Image 6 animation
gsap.to(".home-image6", {
  xPercent: 0,
  scale: 1,
  duration: 2,
  ease: "none",
  scrollTrigger: {
    trigger: ".home-section2",
    containerAnimation: scrollTween,
    start: "center 150%",
    end: "center 0%",
    scrub: 2,
  }
});
// Image 7 animation
gsap.to(".home-image7", {
  xPercent: 0,
  duration: 2,
  ease: "none",
  scrollTrigger: {
    trigger: ".home-section2",
    containerAnimation: scrollTween,
    start: "center 150%",
    end: "center -50%",
    scrub: 2,
  }
});
// Image 8 animation
gsap.to(".home-image8", {
  xPercent: 20,
  scale: 1,
  duration: 2,
  ease: "none",
  scrollTrigger: {
    trigger: ".home-section3",
    containerAnimation: scrollTween,
    start: "center 150%",
    end: "center 0%",
    scrub: 2,
  }
});
// Section 1 images animation
gsap.to(".home-image1, .home-image2, .home-image3, .home-image4, .home-image5", {
  xPercent: 10,
  duration: 2,
  ease: "none",
  scrollTrigger: {
    trigger: ".home-section1",
    containerAnimation: scrollTween,
    start: "center 100%",
    end: "center -50%",
    scrub: 2,
  }
});
// Images 9 animation
gsap.to(".home-image9", {
  xPercent: -40,
  duration: 2,
  ease: "none",
  scrollTrigger: {
    trigger: ".home-section3",
    containerAnimation: scrollTween,
    start: "center 100%",
    end: "center -50%",
    scrub: 2,
  }
});
// Images Sec3 Image3 animation
gsap.set(".home-sec3-image3", {xPercent: -20});

if(jQuery(window).width() > 1024) {
	gsap.to(".home-sec3-image3", {
	  xPercent: 60,
	  yPercent: -20,
		width: '21vw',
		height: '62vh',
	  duration: 2,
	  ease: "none",
	  scrollTrigger: {
		trigger: ".home-section3",
		containerAnimation: scrollTween,
		start: "center 100%",
		end: "center -50%",
		scrub: 2,
	  }
	});
};
if(jQuery(window).width() > 767 && jQuery(window).width() < 1024) {
	gsap.to(".home-sec3-image3", {
		width: '30vw',
		height: '28vh',
	  duration: 2,
	  ease: "none",
	  scrollTrigger: {
		trigger: ".home-section3",
		containerAnimation: scrollTween,
		start: "center 100%",
		end: "center -50%",
		scrub: 2,
	  }
	});
}

// Image 10 animation
/*gsap.to(".home-image10", {
  yPercent: 0,
  scale: 1,
  duration: 2,
  ease: "none",
  scrollTrigger: {
    trigger: ".home-section4",
    containerAnimation: scrollTween,
    start: "center 150%",
    end: "center 0%",
    scrub: 2,
  }
});*/

// Section 4 images animation
gsap.to(".home-image11, .home-image12, .home-image13", {
  xPercent: 15,
  duration: 2,
  ease: "none",
  scrollTrigger: {
    trigger: ".home-section4",
    containerAnimation: scrollTween,
    start: "center 100%",
    end: "center -50%",
    scrub: 2,
  }
});
// Image 14 animation
gsap.to(".home-image14", {
  xPercent: 5,
  scale: 1,
  duration: 2,
  ease: "none",
  scrollTrigger: {
    trigger: ".home-section5",
    containerAnimation: scrollTween,
    start: "center 150%",
    end: "center 0%",
    scrub: 2,
  }
});

// Image 15 animation
if(jQuery(window).width() > 1024) {
   gsap.to(".home-image15", {
	  xPercent: 200,
	  scale: 1,
	  duration: 3,
	  ease: "none",
	  scrollTrigger: {
		trigger: ".home-section6",
		containerAnimation: scrollTween,
		start: "center 150%",
		end: "center 0%",
		scrub: 2,
	  }
	});
}
if(jQuery(window).width() > 767 && jQuery(window).width() < 1024) {
	gsap.to(".home-image15", {
	  xPercent: 50,
	  scale: 1,
	  duration: 3,
	  ease: "none",
	  scrollTrigger: {
		trigger: ".home-section6",
		containerAnimation: scrollTween,
		start: "center 150%",
		end: "center 0%",
		scrub: 2,
	  }
	});
}
if(jQuery(window).width() > 1024) {
	gsap.to(".home-image15", {
	  //xPercent: 10,
		width: '21vw',
		height: '62vh',
	  scale: 1,
	  duration: 2,
	  ease: "none",
	  scrollTrigger: {
		trigger: ".home-section6",
		containerAnimation: scrollTween,
		start: "center 100%",
		end: "center 50%",
		scrub: 2,
	  }
	});
};
if(jQuery(window).width() > 767 && jQuery(window).width() < 1024) {
	gsap.to(".home-image15", {
	  //xPercent: 10,
		width: '45vw',
		height: '45vh',
	  scale: 1,
	  duration: 2,
	  ease: "none",
	  scrollTrigger: {
		trigger: ".home-section6",
		containerAnimation: scrollTween,
		start: "center 100%",
		end: "center 50%",
		scrub: 2,
	  }
	});
};

// Section 7 images animation
gsap.to(".home-image16, .home-image17, .home-image18", {
  xPercent: 15,
  duration: 2,
  ease: "none",
  scrollTrigger: {
    trigger: ".home-section6",
    containerAnimation: scrollTween,
    start: "center 100%",
    end: "center -50%",
    scrub: 2,
  }
});
// Image 15 animation
gsap.to(".home-image19", {
  xPercent: 0,
  yPercent: 0,
  duration: 2,
  ease: "none",
  scrollTrigger: {
    trigger: ".home-section7",
    containerAnimation: scrollTween,
    start: "center 180%",
    end: "center 80%",
    scrub: 2,
  }
});
}
}
jQuery(document).ready(function($) {
  /* $.ajax({
    type: 'POST',
    dataType: 'html',
    url: ajax_params.ajax_url,
    data: {
      action: "homepage_data_ajax_call_back",
    },
    success: function(response) {
      if ( ! response || response.error )
        return;

      jQuery('#primary').html(response);
    }
  }); */
	// Mouse Move
	/**jQuery(window).mousemove((e) => {
		moveCircle(e);
	});
	// On Scroll Event
	jQuery(window).scroll(() => {
		if(jQuery(window).scrollTop() > (jQuery(window).width()*1.5)){
			gsap.to('#cursorFollower', {opacity: 0});
		};
	});**/
	
	// Home Image Hover effect
	jQuery(".section5-texts.fix div>p>a").click(function(e) {
		e.preventDefault();
	});
	jQuery(".section5-texts.fix div>p>a").each(function() {
		var dataImage = jQuery(this).attr("href");
		jQuery(this).append('<span class="hover" style="background-image: url('+dataImage+')"></span>');
	});
});
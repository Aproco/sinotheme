// Browser detection for when you get desparate. A measure of last resort.
// http://rog.ie/post/9089341529/html5boilerplatejs

// var b = document.documentElement;
// b.setAttribute('data-useragent',  navigator.userAgent);
// b.setAttribute('data-platform', navigator.platform);

// sample CSS: html[data-useragent*='Chrome/13.0'] { ... }


// remap jQuery to $
(function ($) {

	function blockEqualiser(){
		//Equalise heights of client boxes
    	$('.grid-setter').each(function() {
      		$(this).find('.block-setter').height('auto');
      		// Cache the highest
      		var highestBox = 0;
      		$('.block-setter', this).each(function() {
        		if($(this).height() > highestBox) {
          			highestBox = $(this).height();
        		}
      		});  
      		$('.block-setter',this).height(highestBox);
    	});	
	}

	//Animate on scroll
	var $animation_elements = $('.anim-target');
	var $window = $(window);

	$window.on('scroll', checkInview);
	$window.on('scroll resize', checkInview);
	$window.trigger('scroll');

	function checkInview() {
  		var window_height = $window.height();
  		var window_top_position = $window.scrollTop();
  		var window_bottom_position = (window_top_position + window_height);

  		$.each($animation_elements, function() {
    		var $element = $(this);
    		var element_height = $element.outerHeight();
    		var element_top_position = $element.offset().top;
    		var element_bottom_position = (element_top_position + element_height);

    		//check to see if this current container is within viewport
    		if ((element_bottom_position >= window_top_position) && (element_top_position <= window_bottom_position)) {
      			$element.addClass('in-view');
    		}
  		});
	}

	//Fix for passive event listeners (Page speed insights)
	$.event.special.touchstart = {
		setup: function( _, ns, handle ) {
			this.addEventListener('touchstart', handle, { passive: !ns.includes('noPreventDefault') });
		}
	};
	$.event.special.touchmove = {
		setup: function( _, ns, handle ) {
			this.addEventListener('touchmove', handle, { passive: !ns.includes('noPreventDefault') });
		}
	};

	var $grid = $('.iso-grid').isotope({
		getSortData: {
			name: '.name',
			number: '.number parseInt'
		}
	});

	//Function to set masonry sort order for mobile
	function checkPosition() {
		if (window.matchMedia('(max-width: 800px)').matches) {
			$grid.isotope({ sortBy: 'number' });
		} else {
			$grid.isotope({ sortBy: 'original-order' });
		}
	}

	/* trigger when page is ready */
	$(document).ready(function (){

		// Add a custom open button for the mobile menu
		$('.openmenu-button').click(function() {
			$('ul.accordion-menu').slideToggle(600);
			$('.openmenu-button').toggleClass('active');
			$('.header-wrapper').toggleClass('active');
		});
		$('.accordion-menu li.menu-item-has-children > a').click(function(e) {
			e.preventDefault();
			$(this).parent().find(".sub-menu:first").slideToggle(600);
			$(this).toggleClass('active');
		});

		// Active panel triggers
		$("[id^='active-trigger-']").click(function() {
			var id = parseInt(this.id.replace("active-trigger-", ""), 10);
			var thetarget = $("#active-target-" + id);
			var thetargettwo = $("#active-target-two-" + id);
			if ($(this).hasClass("active")) {
				$('.active-trigger').removeClass("active");  
				$('.active-target').removeClass("active");
			  	$(this).removeClass("active");
			} else {
				$('.active-trigger').removeClass("active");
				$('.active-target').removeClass("active");
			  	$(this).addClass("active");
				$(thetarget).addClass("active");
				$(thetargettwo).addClass("active");
			}
		});

		// Smooth scrolling to anchors
		$('a[href^="#"]').on('click',function (e) {
		    e.preventDefault();
		    var target = this.hash;
		    var $target = $(target);
		    $('html, body').stop().animate({
		    	'scrollTop': $target.offset().top
		    }, 900, 'swing', function () {
		    	window.location.hash = target;
		  	});
		});

		//$('#sorts').on( 'click', 'button', function() {
			//var sortByValue = $(this).attr('data-sort-by');
			//$grid.isotope({ sortBy: sortByValue });
		//});
	});

	$(window).on('load', function(){
		blockEqualiser();
		//Initialise masonry layout
		$('.iso-grid').isotope({
			layoutMode: 'masonry',
			itemSelector: '.iso-item'
		});
		//Masonry sort order
		checkPosition();
  	});

	// When the window is resized
	$(window).resize(function() {
		blockEqualiser();
		//Masonry sort order
		checkPosition();		
	});

	var prevScrollpos = window.pageYOffset;

	$(window).scroll(function() {
		//Header style change on scroll
		var height = $(window).scrollTop();
		if(height > 10) {
			$(".header-wrapper").addClass('onscroll');
			$(".header-spacer").addClass('onscroll');
		}
		if(height < 10) {
			$(".header-wrapper").removeClass('onscroll');
			$(".header-spacer").removeClass('onscroll');
		}
		
		//Header position change on scroll
		var currentScrollPos = window.pageYOffset;
		if (prevScrollpos > currentScrollPos) {
			document.getElementById("headwrap").style.top = "0";
		} else {
			if(height > 10) {
				document.getElementById("headwrap").style.top = "-90px";
			}
		}
		prevScrollpos = currentScrollPos;

		//Flowbox onscroll behaviours
		var flowbox = $(".workflow-feature");
		var flowLeftOuter = $(".workflow-feature").outerHeight();
		var flowOuter = $(".flow-left").outerHeight();
		var flowAbs = -(flowLeftOuter - flowOuter);
		//alert (flowAbs);
		if (flowbox.offset().top - $(this).scrollTop() < flowAbs) {
			$(".flow-left").addClass('setabs');
			$(".flow-left").removeClass('setfix');
		}
		else if (flowbox.offset().top - $(this).scrollTop() < 80) {
			$(".flow-left").addClass('setfix');
			$(".flow-left").removeClass('setabs');
		}
		else {
			$(".flow-left").removeClass('setfix');
			$(".flow-left").removeClass('setabs');
		}

	});  	

}(window.jQuery || window.$));
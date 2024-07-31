setTimeout(function() {

 AOS.init({
 	duration: 800,
 	easing: 'ease',
 	once: false
 });

}, 800 );

$(function() {

	'use strict';

	$(".loader").delay(700).fadeOut("slow");
  $("#untree_co--overlayer").delay(700).fadeOut("slow");	



	var jarallaxPlugin = function() {
		objectFitImages();
		jarallax(document.querySelectorAll('.jarallax'));
		jarallax(document.querySelectorAll('.jarallax-keep-img'), {
			keepImg: true,
		});
	};
	// jarallaxPlugin();

	var letteringPlugin = function() {
		$('.hero-heading').lettering('words');
		setTimeout(function() {
			$('.hero-heading > span > span').lettering('letters');
		}, 200)
	};
	letteringPlugin();

	var searchToggle = function() {
		$('.js-search-toggle').on('click', function(e) {
			e.preventDefault();
			if ( $('.search-wrap').hasClass('active') ) {
				$('.search-wrap').removeClass('active')
			} else {
				$('.search-wrap').addClass('active')
				setTimeout(function() {
					$('#s').focus();
				}, 50);
			}

			

		});
	};
	searchToggle();


	var siteMenuClone = function() {

		$('.js-clone-nav').each(function() {
			var $this = $(this);
			$this.clone().attr('class', 'site-nav-wrap').appendTo('.site-mobile-inner');
		});


		setTimeout(function() {
			
			var counter = 0;
      $('.untree_co--site-mobile-menu .has-children').each(function(){
        var $this = $(this);
        
        $this.prepend('<span class="arrow-collapse collapsed">');

        $this.find('.arrow-collapse').attr({
          'data-toggle' : 'collapse',
          'data-target' : '#collapseItem' + counter,
        });

        $this.find('> ul').attr({
          'class' : 'collapse',
          'id' : 'collapseItem' + counter,
        });

        counter++;

      });

    }, 1000);

		$('body').on('click', '.arrow-collapse', function(e) {
      var $this = $(this);
      if ( $this.closest('li').find('.collapse').hasClass('show') ) {
        $this.removeClass('active');
      } else {
        $this.addClass('active');
      }
      e.preventDefault();  
      
    });

		$(window).resize(function() {
			var $this = $(this),
				w = $this.width();

			if ( w > 768 ) {
				if ( $('body').hasClass('offcanvas') ) {
					$('body').removeClass('offcanvas');
				}
			}
		})

		// $('body').on('click', '.js-menu-toggle', function(e) {
		// 	var $this = $(this);
		// 	e.preventDefault();

		// 	if ( $('body').hasClass('offcanvas') ) {
		// 		$('body').removeClass('offcanvas');
		// 		$this.removeClass('active');
		// 	} else {
		// 		$('body').addClass('offcanvas');
		// 		$this.addClass('active');
		// 	}
		// }) 

		// // click outisde offcanvas
		// $(document).mouseup(function(e) {
	 //    var container = $(".untree_co--site-mobile-menu");
	 //    if (!container.is(e.target) && container.has(e.target).length === 0) {
	 //      if ( $('body').hasClass('offcanvas') ) {
		// 			$('body').removeClass('offcanvas');
		// 		}
	 //    }
		// });
	}; 
	siteMenuClone();


	
	

	var MobileToggleClick = function() {
		$('.js-menu-toggle').click(function(e) {

			// alert();
			e.preventDefault();
	  	// var $this = $(this);

	  	if ( $('body').hasClass('offcanvas') ) {
	  		$('body').removeClass('offcanvas');
	  		$('.js-menu-toggle').removeClass('active');
	  	} else {
	  		$('body').addClass('offcanvas');	
	  		$('.js-menu-toggle').addClass('active');
	  	}


	  });

	  // click outisde offcanvas
		$(document).mouseup(function(e) {
	    var container = $(".untree_co--site-mobile-menu");
	    if (!container.is(e.target) && container.has(e.target).length === 0) {
	      if ( $('body').hasClass('offcanvas') ) {
					$('body').removeClass('offcanvas');
					$('body').find('.js-menu-toggle').removeClass('active');
				}
	    }
		}); 
	};
	MobileToggleClick();

	var swiperPlugin = function() {
		var swiper = new Swiper('.swiper-container', {
      slidesPerView: 'auto',
      spaceBetween: 10,
      items: 2,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
    });
	};
	// swiperPlugin();
	
	var roomAnimateAsymmetry = function() {

		$(".suite-title").lettering('words');

		var controller = new ScrollMagic.Controller();

		$('.suite-wrap').each(function(){

			var pic1 = $(this).find('.pic1'),
				pic2 = $(this).find('.pic2'),
				excerpt = $(this).find('.suite-excerpt'),
				overlay = $(this).find('.overlay'),
				words = $(this).find('.suite-title > span > span');


		var tl = new TimelineMax();

		tl
			.fromTo(overlay, 2, { skewX: 7 }, { skewX:0, xPercent: 100, transformOrigin: "0% 100%", ease:Expo.easeInOut }, '-=2')
			.fromTo([pic1, pic2], 2, { scale: 1.5 }, { scale: 1.0, ease:Expo.easeInOut }, '-=2')
			.staggerTo(words, 2, { y: 0, ease:Expo.easeInOut }, 0.1, '-=2' )
			.fromTo(excerpt, 2, { opacity: 0, y: 50, autoAlpha: 0 }, { opacity: 1, autoAlpha: 1, y: 0, ease:Expo.easeOut }, '-=1')
			

		

		// Scene 1

		var scene1 = new ScrollMagic.Scene({
			triggerElement: this,
			// duration: "100%",
			duration: "0%",
			reverse: false,
			offset: "-200%",
			// triggerHook: 0,
		})

		.setTween(tl)
		// .addIndicators({
		// 	name: 'reveal',
		// 	colorTrigger: 'black',
		// 	indent: 0,
		// 	colorStart: 'green',

		// })
		.addTo(controller);


		})
	};
	roomAnimateAsymmetry();

	var roomAnimate = function() {
		// $(".suite-title").lettering('words');
		var controller = new ScrollMagic.Controller();
		$(".room-animate .heading").lettering('words');

		$('.room-animate').each(function() {
			var $this = $(this);

			var	bgImage = $this.find('.bg-image'),
				overlay = $this.find('.overlay'),
				words = $this.find('.heading span span'),
				excerpt = $this.find('.room-exerpt');

			var tl = new TimelineMax();

			tl
				.set(bgImage, { scale: '1.2' })
				.to(overlay, 5, { height: '100%', ease: Power4.easeOut } )
				.to(bgImage, 2, { scale: '1.0', ease: Power4.easeInOut }, '-=5' )
				.staggerTo(words, 2, { y: 0, ease:Expo.easeInOut }, 0.1, '-=4.5' )

				.fromTo(excerpt, 2, { autoAlpha: 0, y: 100 }, {autoAlpha: 1, y: 0, ease: Power4.easeInOut }, '-=4' )
				


			var scene1 = new ScrollMagic.Scene({
				triggerElement: this,
				// duration: "100%",
				duration: "0%",
				reverse: false,
				offset: "-250%",
				// triggerHook: 0,
			})

			.setTween(tl)
			// .addIndicators({
			// 	name: 'reveal',
			// 	colorTrigger: 'black',
			// 	indent: 0,
			// 	colorStart: 'green',
			// })
			.addTo(controller);


		})
	};
	roomAnimate();

	var stickyPlugin = function() {
		$(".js-sticky-nav").sticky({topSpacing:0});
	};
	stickyPlugin();

	var heroInnerPage = function() {
		$('.inner-page .hero-heading').lettering('words');
		setTimeout(function() {
			$('.inner-page .hero-heading > span > span').lettering('letters');
		}, 200)

		var tl = new TimelineMax();

		setTimeout(function() {
  		tl 
				.set('.inner-page .hero-heading > span > span > span > span', {y: "100%", transformStyle:"preserve-3d"})
				.set('.inner-page .sub-text', {y: 20, autoAlpha: 0, transformStyle:"preserve-3d"})
				.staggerFromTo('.inner-page .hero-heading > span > span > span > span', 2, {opacity: 1, rotation: "20%", y:"100%"}, {opacity: 1, rotation: 0, y: "0%", ease: Expo.easeInOut}, 0.03, '+=0', allComplete)
				.fromTo('.inner-page .sub-text', 1, { autoAlpha: 0, y: 20 }, { autoAlpha: 1, y: 0, ease: Expo.easeInOut }, '-=1')
		}, 300);

		var allComplete = function() {

		}

	}
	heroInnerPage();

   
  var owlCarouselPlugin = function() {
  	var owl = $('.slide-one-item'),
  		owlHeroSlider = $('.owl-hero');

  	var tl = new TimelineMax();

  	owlHeroSlider.owlCarousel({
        center: false,
        items: 1,
        loop: true,
        stagePadding: 0,
        margin: 0,
        animateOut: 'fadeOut',
    		animateIn: 'fadeIn',
        // smartSpeed: 1500,
        autoplay: true,
        autoplayHoverPause: true,
        dots: true,
        nav: true,
        navText: ['<span class="icon-keyboard_arrow_left">', '<span class="icon-keyboard_arrow_right">'],
        onInitialize: function() {
        	setTimeout(function() {
        		owlHeroSlider.trigger('stop.owl.autoplay');
        		tl 
	    				.set('.owl-item.active .hero-heading > span > span > span > span', {y: "100%", transformStyle:"preserve-3d"})
	    				.set('.owl-item.active .sub-text', {y: 20, autoAlpha: 0, transformStyle:"preserve-3d"})
	    				.staggerFromTo('.owl-item.active .hero-heading > span > span > span > span', 2, {opacity: 1, rotation: "20%", y:"100%"}, {opacity: 1, rotation: 0, y: "0%", ease: Expo.easeInOut}, 0.03, '+=0', allComplete)
	    				.fromTo('.owl-item.active .sub-text', 1, { autoAlpha: 0, y: 20 }, { autoAlpha: 1, y: 0, ease: Expo.easeInOut }, '-=1')
	    		}, 300);
        }
    });
    
  //   owlHeroSlider.on('initialize.owl.carousel', function(event) {
  //   	console.log('nice');
    	
		// })
		// .owl-item.active 
    owlHeroSlider.on('translate.owl.carousel', function(event) {

    	setTimeout(function() {
    		owlHeroSlider.trigger('stop.owl.autoplay');
	    	tl 
	    	.set('.owl-item.active .hero-heading > span > span > span > span', {y: "100%", transformStyle:"preserve-3d"})
	    	.set('.owl-item.active .sub-text', {y: 20, autoAlpha: 0, transformStyle:"preserve-3d"})
	    	.staggerFromTo('.owl-item.active .hero-heading > span > span > span > span', 2, {opacity: 1, rotation: "20%", y:"100%"}, {opacity: 1, rotation: 0, y: "0%", ease: Expo.easeInOut}, 0.03, '+=0', allComplete)
	    	.fromTo('.owl-item.active .sub-text', 1, { autoAlpha: 0, y: 20 }, { autoAlpha: 1, y: 0, ease: Expo.easeInOut }, '-=1')
    	}, 50)
    	// TweenMax.set('.hero-heading span span', { y: '100%' });
    	// TweenMax.staggerTo('.hero-heading span span', 2, { y: '0%', ease:Expo.easeInOut}, 0.3);
		})

    function allComplete() {
		  owlHeroSlider.trigger('play.owl.autoplay');
		}

    $('.slide-one-item').owlCarousel({
        center: false,
        items: 1,
        loop: true,
        stagePadding: 0,
        margin: 0,
        smartSpeed: 1500,
        autoplay: false,
        dots: false,
        nav: false,
        navText: ['<span class="icon-keyboard_arrow_left">', '<span class="icon-keyboard_arrow_right">']
    });

    $('.thumbnail li').each(function(slide_index){
        $(this).click(function(e) {
            owl.trigger('to.owl.carousel',[slide_index,1500]);
            e.preventDefault();
        })
    })

    owl.on('changed.owl.carousel', function(event) {
        $('.thumbnail li').removeClass('active');
        $('.thumbnail li').eq(event.item.index - 2).addClass('active');
    })






    var owlGalBig = $('.owl-gallery-big').owlCarousel({
  		loop: true,
		  margin: 0,
		  items: 1,
		  nav: true,
		  dots: true,
		  navText: ['<span class="icon-keyboard_arrow_left">', '<span class="icon-keyboard_arrow_right">'],
		  smartSpeed: 1000,
		  onInitialized: function(e) {
		  	var carousel = e.relatedTarget;
	    	$('.slider-counter').text(carousel.relative(carousel.current()) + 1 + '/' + carousel.items().length);
		  }
  	});
  	var owlGalSmall =$('.owl-gallery-small').owlCarousel({
  		loop: true,
		  margin:0,
		  items: 1,
		  nav: false,
		  dots: false,
		  mouseDrag: false,
		  touchDrag: false,
		  startPosition: 1,
		  smartSpeed: 1000,
  	});
  	/* Gallery */
    
  	
  	var changed = false;
  	owlGalBig.on("dragged.owl.carousel", function (event) {
			setTimeout(function() {
				var direction = event.relatedTarget['_drag']['direction'];
				if ( direction == 'left' && changed == true) {
					owlGalSmall.trigger('next.owl.carousel');
				} else if ( direction == 'right' && changed == true ) {
					owlGalSmall.trigger('prev.owl.carousel');
				} else {
					console.log(direction + " and " + changed);
				}
				changed = false;
			}, 10)
			
		});		
		owlGalBig.on('changed.owl.carousel', function(e) {
			changed = true;
			// alert();
	    if (!e.namespace)  {
	      return;
	    }
	    var carousel = e.relatedTarget;
	    $('.slider-counter').text(carousel.relative(carousel.current()) + 1 + '/' + carousel.items().length);
	  })

		$('.owl-gallery-big .owl-nav .owl-prev').click(function() {
			owlGalSmall.trigger('prev.owl.carousel');
		});
		$('.owl-gallery-big .owl-nav .owl-next').click(function() {
			owlGalSmall.trigger('next.owl.carousel');
		});  	

		$('.owl-gallery-small a').on('click', function(e) {

			e.preventDefault();
			owlGalBig.trigger('next.owl.carousel');
			owlGalSmall.trigger('next.owl.carousel');

		})

  };
  owlCarouselPlugin();

});

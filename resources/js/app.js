import './bootstrap';
import 'bootstrap';
/*!
* Start Bootstrap - Freelancer v7.0.7 (https://startbootstrap.com/theme/freelancer)
* Copyright 2013-2023 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-freelancer/blob/master/LICENSE)
*/
//
// Scripts
// 

(function($) {
	$.fn.currencyInput = function() {
	  this.each(function() {
		var wrapper = $("<div class='currency-input' />");
		$(this).wrap(wrapper);
		$(this).before("<span class='currency-symbol'>$</span>");
		$(this).change(function() {
		  var min = parseFloat($(this).attr("min"));
		  var max = parseFloat($(this).attr("max"));
		  var value = this.valueAsNumber;
		  if(value < min)
			value = min;
		  else if(value > max)
			value = max;
		  $(this).val(value.toFixed(2)); 
		});
	  });
	};
  })(jQuery);
  
  $(document).ready(function() {
	$('input.currency').currencyInput();
  });


window.addEventListener('DOMContentLoaded', event => {

  // Navbar shrink function
  var navbarShrink = function () {
      const navbarCollapsible = document.body.querySelector('#mainNav');
      if (!navbarCollapsible) {
          return;
      }
      if (window.scrollY === 0) {
          navbarCollapsible.classList.remove('navbar-shrink')
      } else {
          navbarCollapsible.classList.add('navbar-shrink')
      }

  };

  // Shrink the navbar 
  navbarShrink();

  // Shrink the navbar when page is scrolled
  document.addEventListener('scroll', navbarShrink);

  // Activate Bootstrap scrollspy on the main nav element
  const mainNav = document.body.querySelector('#mainNav');
  if (mainNav) {
      new bootstrap.ScrollSpy(document.body, {
          target: '#mainNav',
          rootMargin: '0px 0px -40%',
      });
  };

  // Collapse responsive navbar when toggler is visible
  const navbarToggler = document.body.querySelector('.navbar-toggler');
  const responsiveNavItems = [].slice.call(
      document.querySelectorAll('#navbarResponsive .nav-link')
  );
  responsiveNavItems.map(function (responsiveNavItem) {
      responsiveNavItem.addEventListener('click', () => {
          if (window.getComputedStyle(navbarToggler).display !== 'none') {
              navbarToggler.click();
          }
      });
  });

});

//CARD
$(document).ready(function(){
	
	// Lift card and show stats on Mouseover
	$('#product-card').hover(function(){
			$(this).addClass('animate');
			$('div.carouselNext, div.carouselPrev').addClass('visible');			
		 }, function(){
			$(this).removeClass('animate');			
			$('div.carouselNext, div.carouselPrev').removeClass('visible');
	});	
	
	// Flip card to the back side
	$('#view_details').click(function(){		
		$('div.carouselNext, div.carouselPrev').removeClass('visible');
		$('#product-card').addClass('flip-10');
		setTimeout(function(){
			$('#product-card').removeClass('flip-10').addClass('flip90').find('div.shadow').show().fadeTo( 80 , 1, function(){
				$('#product-front, #product-front div.shadow').hide();			
			});
		}, 50);
		
		setTimeout(function(){
			$('#product-card').removeClass('flip90').addClass('flip190');
			$('#product-back').show().find('div.shadow').show().fadeTo( 90 , 0);
			setTimeout(function(){				
				$('#product-card').removeClass('flip190').addClass('flip180').find('div.shadow').hide();						
				setTimeout(function(){
					$('#product-card').css('transition', '100ms ease-out');			
					$('#cx, #cy').addClass('s1');
					setTimeout(function(){$('#cx, #cy').addClass('s2');}, 100);
					setTimeout(function(){$('#cx, #cy').addClass('s3');}, 200);				
					$('div.carouselNext, div.carouselPrev').addClass('visible');				
				}, 100);
			}, 100);			
		}, 150);			
	});			
	
	// Flip card back to the front side
	$('#flip-back').click(function(){		
		
		$('#product-card').removeClass('flip180').addClass('flip190');
		setTimeout(function(){
			$('#product-card').removeClass('flip190').addClass('flip90');
	
			$('#product-back div.shadow').css('opacity', 0).fadeTo( 100 , 1, function(){
				$('#product-back, #product-back div.shadow').hide();
				$('#product-front, #product-front div.shadow').show();
			});
		}, 50);
		
		setTimeout(function(){
			$('#product-card').removeClass('flip90').addClass('flip-10');
			$('#product-front div.shadow').show().fadeTo( 100 , 0);
			setTimeout(function(){						
				$('#product-front div.shadow').hide();
				$('#product-card').removeClass('flip-10').css('transition', '100ms ease-out');		
				$('#cx, #cy').removeClass('s1 s2 s3');			
			}, 100);			
		}, 150);			
		
	});	

	
	/* ----  Image Gallery Carousel   ---- */
	
	var carousel = $('#carousel ul');
	var carouselSlideWidth = 335;
	var carouselWidth = 0;	
	var isAnimating = false;
	
	// building the width of the casousel
	$('#carousel li').each(function(){
		carouselWidth += carouselSlideWidth;
	});
	$(carousel).css('width', carouselWidth);
	
	// Load Next Image
	$('div.carouselNext').on('click', function(){
		var currentLeft = Math.abs(parseInt($(carousel).css("left")));
		var newLeft = currentLeft + carouselSlideWidth;
		if(newLeft == carouselWidth || isAnimating === true){return;}
		$('#carousel ul').css({'left': "-" + newLeft + "px",
							   "transition": "300ms ease-out"
							 });
		isAnimating = true;
		setTimeout(function(){isAnimating = false;}, 300);			
	});
	
	// Load Previous Image
	$('div.carouselPrev').on('click', function(){
		var currentLeft = Math.abs(parseInt($(carousel).css("left")));
		var newLeft = currentLeft - carouselSlideWidth;
		if(newLeft < 0  || isAnimating === true){return;}
		$('#carousel ul').css({'left': "-" + newLeft + "px",
							   "transition": "300ms ease-out"
							 });
	    isAnimating = true;
		setTimeout(function(){isAnimating = false;}, 300);			
	});
});

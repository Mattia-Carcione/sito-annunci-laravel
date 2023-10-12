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

// card
$(document).ready(function () {

    // Lift card and show stats on Mouseover
    $('#product-card').hover(function () {
        $(this).addClass('animate');
    }, function () {
        $(this).removeClass('animate');
    });

    // Flip card to the back side
    $('#view_details').click(function () {
        setTimeout(function () {
            $('#product-card').show().fadeTo(80, 1);
        }, 50);

        setTimeout(function () {
            setTimeout(function () {
                setTimeout(function () {
                    $('#product-card').css('transition', '100ms ease-out');
                    $('#cx, #cy').addClass('s1');
                    setTimeout(function () { $('#cx, #cy').addClass('s2'); }, 100);
                    setTimeout(function () { $('#cx, #cy').addClass('s3'); }, 200);
                }, 100);
            }, 100);
        }, 150);
    });




    /* ----  Image Gallery Carousel   ---- */

    var carousel = $('#carousel ul');
    var carouselSlideWidth = 335;
    var carouselWidth = 0;
    var isAnimating = false;


});

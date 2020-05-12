(function($) {
    "use strict";
    if ($.fn.menumaker) {
        $("#cssmenu").menumaker({
            title: "Menu", // The text of the button which toggles the menu
            breakpoint: 991, // The breakpoint for switching to the mobile view
            format: "multitoggle" // It takes three values: dropdown for a simple toggle menu, select for select list menu, multitoggle for a menu where each submenu can be toggled separately
        });
        var siteNavigation = $('#cssmenu').children('ul');
        siteNavigation.find('a').on('focus blur', function() {
            $(this).parents('.menu-item, .page_item').toggleClass('focus');
        });
    }
    $('table').addClass('table-bordered table').wrap('<div class="table-responsive"></div>');
    $(window).on('scroll', function() {
        var topspace = $(this).scrollTop();
        if (topspace > 1) {
            $('.menu-area').addClass("sticky-menu");
        } else {
            $('.menu-area').removeClass("sticky-menu");
        }
        if (topspace > 300) {
            $('.scrooltotop').css('display', 'block');
        } else {
            $('.scrooltotop').css('display', 'none');
        }
    });
    jQuery(window).on('load', function() {
        $('.scrooltotop').css('display', 'none');
        $('.masonaryactive').masonry({
            itemSelector: '.blog-grid-layout',
        });
        $('#preloader').fadeOut('slow', function() {
            $(this).remove();
        });

    });
    $('.scrooltotop').click(function() {
        $('html,body').animate({ scrollTop: 0 }, 'slow');
        return false;
    });
    $('.contact-form').parents('.entry-content').addClass('contact-form-parent');
    $('.tagcloud a').removeAttr('style');
    $('.header-four-menu-area .menu').append(`<li class="search-form-li"><div class="search-popup">
                    <div><i class="fa fa-search"></i></div>
                </div></li>`);
    //* nav_searchFrom
    function searchFrom() {
        $('.search-popup div').on('click', function(e) {
            e.preventDefault();
            $('.searchform-area').toggleClass('show');
            return false
        });
        $('.search-close i').on('click', function() {
            $('.searchform-area').removeClass('show');
            return false;
        });
    };
    searchFrom();
    $(window).resize(function() {
        var windowW = $(window).width();
        if (windowW < 768) {
            $('.search-popup').appendTo('.site-branding-area');
        }
    });
    $('.post-gallery').owlCarousel({
        items: 1,
        animateIn: 'fadeIn',
        animateOut: 'fadeOut',
        autoplay: true,
        smartSpeed: 1000,
        dots: false,
        nav: true,
        loop: true,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
    });
    $('.related-post-sldider').owlCarousel({
        items: 2,
        nav: true,
        autoplay: true,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        smartSpeed: 1000,
        margin: 30,
        rewind: true,
        dots: false,
        responsive: {
            0: {
                items: 1,
            },
            // breakpoint from 480 up
            480: {
                items: 1,
                margin: 15
            },
            // breakpoint from 768 up
            768: {
                items: 1,
            },
            992: {
                items: 2,
            }
        }
    });

    $('.video-play-button a').magnificPopup({
      type:'iframe',
    });
    // $('.enjoy-instagram-carousel').addClass('owl-carousel')
    $('.navigation.pagination').addClass('Page navigation example');
    $('.frontpage li').addClass('page-item');
    $('.frontpage ul').addClass('pagination');
    $('.navigation.pagination div.nav-links').wrapInner('<ul class="pagination"></ul>');
    $('div.nav-links ul.pagination *').wrap('<li class="page-item"></li>');
})(jQuery);
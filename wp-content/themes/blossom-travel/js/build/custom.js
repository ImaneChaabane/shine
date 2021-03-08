jQuery(document).ready(function($) {

    var rtl;
    
    if( blossom_travel_data.rtl == '1' ){
        rtl = true;
    }else{
        rtl = false;
    }
    
    var winWidth = $(window).width();
    $('.sticky-t-bar .close').on('click', function(){
        $(this).parent('.sticky-t-bar').toggleClass('active');
        $(this).siblings('.sticky-bar-content').slideToggle();
    });

    $(window).on('resize load', function() {
        var stickyBarHeight = $('.sticky-bar-content').outerHeight();
        $('.sticky-t-bar + .site-header.header-one').css('padding-top', stickyBarHeight);

        if($(window).width() > 1024) {
            var itemCount = $('.header-one .main-navigation .nav-menu > li').size();
            var liIndex = Math.round( itemCount / 2 ) - 1;
            $('.header-one .site-branding').insertAfter($('.header-one .main-navigation .nav-menu > li:nth('+ liIndex +')'));

            var itemCount2 = $('.header-two .main-navigation .nav-menu > li').size();
            var liIndex2 = Math.round( itemCount2 / 2 ) - 1;
            $('.header-two .site-branding').insertAfter($('.header-two .main-navigation .nav-menu > li:nth('+ liIndex2 +')'));
        } else {
            $('.header-one .site-branding, .header-two .site-branding').insertBefore($('.header-one .logo-menu-wrap, .header-two .logo-menu-wrap'));
        }

        //for sticky social share
        var stickyHeaderHeight = $('.sticky-header').outerHeight() + 20;

        //sticky header
        var headerHeight = $('.site-header').outerHeight();
        if( blossom_travel_data.sticky == '1' ){
            $(window).scroll(function(){
                if($(window).scrollTop() > headerHeight) {
                    $('.sticky-header').addClass('stick');
                }else {
                    $('.sticky-header').removeClass('stick');
                }
            });

            $('.widget-sticky .widget-area .widget:last-child').css('top', stickyHeaderHeight);
            $('.sticky-header + .site-content .sticky-meta .article-meta').css('top', stickyHeaderHeight);
        }

        if($('.site-header').hasClass('header-one')){
            $('.banner:not(.slider-two) .entry-header').css('padding-top', headerHeight);
            $('.site-content > .page-header').css('padding-top', headerHeight);
        }
    });//resize & load end

    $('.site-header .main-navigation .menu-item-has-children').find('> a').after('<span class="submenu-toggle"><i class="fas fa-caret-down"></i></span>');
    $('.responsive-nav .main-navigation .menu-item-has-children').find('> a').after('<button class="submenu-toggle"><i class="fas fa-caret-down"></i></button>');

    $('.header-four button.toggle-btn').clone().appendTo('.header-four .header-main .container');

    $('.header-six button.toggle-btn').clone().appendTo('.header-six .header-t .container');

    $('.responsive-nav .search-form-wrap, .responsive-nav .header-social').insertAfter('.responsive-nav .main-navigation .nav-menu > li:last-child');

    //responsive menu toggle
    $('.site-header .toggle-btn').on('click', function(){
        $('.responsive-nav').animate({
            width: 'toggle',
        });
    });

    $('.responsive-nav .btn-close-menu').on('click', function () {
        $('.responsive-nav').animate({
            width: 'toggle',
        });
    });

    //responsive submenu toggle
    $('.responsive-nav .main-navigation .submenu-toggle').click(function(){
        $(this).toggleClass('active');
        $(this).siblings('.sub-menu').stop(true, false, true).slideToggle();
    });

    //for accessibility
    $('.main-navigation ul li a, .main-navigation ul li .submenu-toggle').focus(function() {
        $(this).parents('li').addClass('focused');
    }).blur(function() {
        $(this).parents('li').removeClass('focused');
    });

    //Toggle header search
    $('.header-one .header-search .search-toggle').click(function(e){
        $('.header-one .header-search .header-search-wrap').animate({
            left: '0',
        });
    });

    $('.header-one .header-search .header-search-wrap .close').click(function (e) {
        $('.header-one .header-search .header-search-wrap').animate({
            left: '-30px',
        });
    });

    $(window).keyup(function(event) {
        if(event.key == 'Escape') {
            $('.header-one .header-search .header-search-wrap').animate({
                left: '-30px',
            }); 
        }
    });

    $('.header-six .header-search .search-toggle').click(function (e) {
        $('.header-six .header-search .header-search-wrap').animate({
            right: '0',
        });
    });

    $('.header-six .header-search .header-search-wrap .close').click(function (e) {
        $('.header-six .header-search .header-search-wrap').animate({
            right: '-30px',
        });
    });

    $(window).keyup(function (event) {
        if (event.key == 'Escape') {
            $('.header-six .header-search .header-search-wrap').animate({
                right: '-30px',
            });
        }
    });

    $('.about-section .widget .widget-title').insertBefore('.about-section .widget-featured-holder .featured_page_content');

    $('.trending-section .widget ul').addClass('owl-carousel');

    $('.trending-section .section-grid, .trending-section .widget ul').owlCarousel({
        items: 3,
        autoplay: false,
        loop: false,
        nav: true,
        dots: false,
        lazyLoad   : true,
        rtl : rtl,
        margin: 30,
        responsive : {
            0 : {
                items: 1,
            },
            768 : {
                items: 2,
            },
            1025 : {
                items: 3,
            }
        }
    });
  
    //toggle social share
    $('.post-thumbnail .share-icon').click(function(e){
        $('.social-share').removeClass('active');
        $(this).parent('.social-share').addClass('active');
        e.stopPropagation();
    });
    $('.social-share').click(function(e){
        e.stopPropagation();
    });

    $(window).click(function(){
        $('.social-share').removeClass('active');
    });

    $(window).on('keyup', function(event) { 
        if (event.key == "Escape") { 
            $('.header-search').removeClass('active');
            $('.social-share').removeClass('active');
        } 
    });
    
    //wrap widget title content with span
    $('.site-footer .widget .widget-title, #secondary .widget .widget-title, section.client-logo-section .widget .widget-title').wrapInner('<span></span>');

    //wrap image text item 
    $('.bttk-itw-holder li').wrapInner('<div class="itw-inner-wrap"></div>');

    //back to top
    $(window).scroll(function(){
        if($(window).scrollTop() > 300) {
            $('.back-to-top').addClass('show');
        }else {
            $('.back-to-top').removeClass('show');
        }
    });

    $('.back-to-top').click(function(){
        $('body, html').animate({
            scrollTop: 0,
        }, 600);
    });

});
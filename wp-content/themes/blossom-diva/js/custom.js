jQuery(document).ready(function($){    
    
    var rtl, mrtl, slider_auto;
    
    if( blossom_diva_data.rtl == '1' ){
        rtl = true;
        mrtl = false;
    }else{
        rtl = false;
        mrtl = true;
    }

    if( blossom_diva_data.auto == '1' ){
        slider_auto = true;
    }else{
        slider_auto = false;
    }

    //banner layout two
    $('.slider-layout-two').owlCarousel({
        loop         : true,
        margin       : 40,
        nav          : true,
        dots         : false,
        autoplay     : slider_auto,
        stagePadding : 150,
        rtl          : rtl,
        animateOut   : blossom_diva_data.animation,
        responsive   : {
            1200: {
                items: 3
            },
            1025: {
                items: 2
            },
            768: {
                items: 2,
                stagePadding: 50
            },
            0: {
                items: 1,
                margin: 10,
                stagePadding: 10
            }
        }
    });
});
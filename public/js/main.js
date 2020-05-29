$(document).ready(function(){
    $(".owl-carousel").owlCarousel({
        autoWidth: true,
        dots: true,
        responsive : {
            0:{
                items: 3,
            },
            480:{
                items: 5,
            },
            768:{
               items: 8,
            }
        }
    });
    $('.js-item-campaign').click(function () {
        $('main').css('filter','blur(5px)');
        $('header').css('filter','blur(5px)');
        $('footer').css('filter','blur(5px)');
        $('.js-overlay-campaign').fadeIn().addClass('disabled');
    });
    $('.js-close-campaign').click(function () {
        $('.js-overlay-campaign').fadeOut();
        $('main').css('filter','none');
        $('header').css('filter','none');
        $('footer').css('filter','none');
    });
    $(document).mouseup(function (e) {
        var popup = $('.js-popup-campaign');
        if(e.target!==popup[0] && popup.has(e.target).length===0){
            $('.js-overlay-campaign').fadeOut();
            $('main').css('filter','none');
            $('header').css('filter','none');
            $('footer').css('filter','none');
        }
    });
});

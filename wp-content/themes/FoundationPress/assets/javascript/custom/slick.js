jQuery(document).ready(function($) {

    $('#sync-carousel--head').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: true,
      asNavFor: '#sync-carousel--nav'
    });

    $('#sync-carousel--nav').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      asNavFor: '#sync-carousel--head',
      dots: true,
      centerMode: true,
      focusOnSelect: true
    });

    $('#header-carousel').slick({
      dots: false,
      arrows: false,
      autoplay: true,
      autoplaySpeed: 6000,
       adaptiveHeight: true
    });

});

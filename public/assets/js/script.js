
$(document).ready(function(){
    // Reviews Caroussel Home
    $('.reviews-container').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 1500,
    });
    // Join Caroussel Home
    $('.join-container').slick({
        slidesToShow: 3,
        dots: false,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 2000,
    });
  });
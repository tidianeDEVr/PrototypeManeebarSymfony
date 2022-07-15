
$(document).ready(function(){
    // Reviews Caroussel Home
    $('.reviews-container').slick({
        centerMode: true,
        centerPadding: '60px',
        slidesToShow: 3,
        dots: true,
        arrows: false,
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
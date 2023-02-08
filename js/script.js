$(document).ready(function () {
  // mobile menu
  $(".burger").click(function () {
    $(this).toggleClass("active");
    $(".menu_box").toggleClass("active");
  });

  //   Sliders
  $(".slider").slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    lazyLoad: "ondemand",
    autoplay: true,
    autoplaySpeed: 3000,
    prevArrow: $(".prev"),
    nextArrow: $(".next"),
  });
  $(".house_slider.garden").slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    lazyLoad: "ondemand",
    prevArrow: $(".house_prev_garden"),
    nextArrow: $(".house_next_garden"),
    responsive: [
      {
        breakpoint: 990,
        settings: "unslick",
      },
    ],
  });
  $(".house_slider.modular").slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    lazyLoad: "ondemand",
    prevArrow: $(".house_prev"),
    nextArrow: $(".house_next"),
    responsive: [
      {
        breakpoint: 990,
        settings: "unslick",
      },
    ],
  });
  $(".tranparent_slider").slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    lazyLoad: "ondemand",
    prevArrow: $(".tr_nav__prev"),
    nextArrow: $(".tr_nav__next"),
    variableWidth: true,
    centerMode: true,
  });
  // end of slider

  //   collapse text SEO
  $(".more").click(function (e) {
    e.preventDefault();
    $(".seo_section .hidden").slideToggle();
  });

  //   Change image in download section
  let wd = $(window).width();
  if (wd < 990) {
    $(".download_image").attr("src", "./img/download_image_mobile.png");
  }

//   Filter selects
$(".model_filter select").niceSelect();
$(".interior_filter select").niceSelect();

// popup galery images
$('.galery_box img').click(function() {
    let src = $(this).attr('src');
    $('.popup_image_box img').attr('src',src);
    $('.popup').fadeIn(); 
    $('#overlay').fadeIn();    
});
$('.close').click(function() {
    $('.popup').fadeOut();
    $("#overlay").fadeOut();
});
$("#overlay").click(function(){
    $('.popup').fadeOut();
    $(this).fadeOut();
});

});

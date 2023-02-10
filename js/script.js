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
    $(".recent, .recomend").slick({
      infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    lazyLoad: "ondemand",
    prevArrow: $(".house_prev_garden"),
    nextArrow: $(".house_next_garden"),
    });
  }

  //   Filter selects
  $(".model_filter select").niceSelect();
  $(".interior_filter select").niceSelect();

  // popup galery images
  $(".galery_box img").click(function () {
    let src = $(this).attr("src");
    $(".popup_image_box img").attr("src", src);
    $(".popup").fadeIn();
    $("#overlay").fadeIn();
  });
  $(".close").click(function () {
    $(".popup").fadeOut();
    $("#overlay").fadeOut();
  });
  $("#overlay").click(function () {
    $(".popup").fadeOut();
    $(this).fadeOut();
  });

  // interior page
  $(".interior_slider").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    fade: true,
    asNavFor: ".interior_slider_thumb",
    prevArrow: $(".interior_prev"),
    nextArrow: $(".interior_next"),
  });
  $(".interior_slider_thumb").slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: ".interior_slider",
    centerMode: true,
    focusOnSelect: true,
    arrows: false,
    centerMode: true,
  });

  $(".sort_price").niceSelect();

  $(".mob_filter").click(function () {
    $(".filter_head").text("FILTER");
    $(".filter_box").toggleClass("active");
  });
  $(".filter_close").click(function () {
    $(".filter_box").toggleClass("active");
    console.log('click');
  });
  $(".filter").click(function () {
    $(".filter_box").toggleClass("active");
  });


  // PLay video 
  $('.play').click(function() {
    video = '<iframe width="100%" height="323" frameborder="0" src="' + $('.video img').attr('data-video') + '"></iframe>';
    $('.video').replaceWith(video);
  });

  
  //  Refresh slider after tab change
  $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
    if (wd < 990) {
      return
    }
    else {  
      $(".house_slider").slick('refresh');
    }
    
    $(".interior_slider").slick('refresh');
    $(".interior_slider_thumb").slick('refresh');
  });

// Plans galery 
  $(".plan_box__image img").click(function () {
    let src = $(this).attr("src");
    $(".popup_image_box img").attr("src", src);
    $(".popup").fadeIn();
    $("#overlay").fadeIn();
  });
});

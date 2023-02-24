$(document).ready(function () {
  // mobile menu

  $(".burger").click(function (e) {
    e.preventDefault();
    $(this).toggleClass("active");

    $(".menu_box").toggleClass("active");

    $("body").toggleClass("menu_open");
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
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        lazyLoad: "ondemand",
        arrows: true,
        prevArrow: $(".house_prev_garden"),

        nextArrow: $(".house_next_garden"),
      },
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
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        lazyLoad: "ondemand",

        prevArrow: $(".house_prev"),

        nextArrow: $(".house_next"),
      },
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
    responsive: [
    {
      breakpoint: 990,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        centerMode: false,
        variableWidth: false,
        lazyLoad: "ondemand",
      },
    },
    ],
  }); 

  // end of slider

// Anchor link contct us

  var $page = $('html, body');
  $('.map_box .read_more').click(function() {
    $page.animate({
      scrollTop: $($.attr(this, 'href')).offset().top
    }, 400);
    return false;
  });




  //   collapse text SEO

  $(".more").click(function (e) {
    e.preventDefault();

    $(".seo_section .hidden").slideToggle();
  });

  $(".recomend ").slick({
    infinite: true,

    slidesToShow: 3,

    slidesToScroll: 1,

    lazyLoad: "ondemand",

    prevArrow: $(".house_prev_garden_recomend"),

    nextArrow: $(".house_next_garden_recomend"),
    responsive: [
    {
      breakpoint: 990,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        lazyLoad: "ondemand",
        arrows: true,
        prevArrow: $(".house_prev_garden_recomend"),
        nextArrow: $(".house_next_garden_recomend"),
      },
    },
    ],
  });
  $(".recent ").slick({
    infinite: true,

    slidesToShow: 3,

    slidesToScroll: 1,

    lazyLoad: "ondemand",

    prevArrow: $(".house_prev_garden_recomend"),

    nextArrow: $(".house_next_garden_recomend"),
    responsive: [
    {
      breakpoint: 990,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        lazyLoad: "ondemand",
        arrows: true,
        prevArrow: $(".house_prev_garden_recomend"),
        nextArrow: $(".house_next_garden_recomend"),
      },
    },
    ],
  });

  //   Change image in download section

  let wd = $(window).width();

  if (wd < 990) {
    $(".download_image").attr("src","https://tridentmodular.com/wp-content/themes/trident/img/download_image_mobile.png");
    $(".download_image").attr("src","http://wp/wp-content/themes/trident/img/download_image_mobile.png");
  }

  //   Filter selects

  $(".model_filter select").niceSelect();
  $(".interior_filter select").niceSelect();

  // card slider
  $(".card_slider").slick({
    slidesToShow: 1,

    slidesToScroll: 1,

    arrows: true,

    fade: true,

    asNavFor: ".card_slider_thumb",
  });

  $(".card_slider_thumb").slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: ".card_slider",
    centerMode: true,
    focusOnSelect: true,
    arrows: false,
    centerMode: true,
  });

  // interior page

  $(".interior_slider").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    infinite: true,
    asNavFor: ".interior_slider_thumb",
  });

  $(".interior_slider_thumb").slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: ".interior_slider",
    centerMode: true,
    focusOnSelect: true,
    arrows: false,
    infinite: true,
    variableWidth: true,
    responsive: [
    {
      breakpoint: 990,
      settings: {
        variableWidth: false,
        slidesToShow: 3,
        slidesToScroll: 1,
      },
    },
    ]
  });


  $(".mob_filter").click(function () {
    $(".filter_head").text("FILTER");

    $(".filter_box").toggleClass("active");
  });

  $(".filter_close").click(function () {
    $(".filter_box").toggleClass("active");

    console.log("click");
  });

  $(".filter").click(function () {
    $(".filter_box").toggleClass("active");
  });

  // PLay video

  $(".play").click(function () {
    var video = '<iframe width="100%" height="323" frameborder="0" src="' +
    $(".video img").attr("data-video") +
    '"></iframe>';
    $(".video").replaceWith(video);
  });

  //  Refresh slider after tab change

  $('a[data-bs-toggle="tab"]').on("shown.bs.tab", function (e) {
    let wd = $(window).width();
    $(".house_slider.garden").slick("refresh");
    $(".house_slider.modular").slick("refresh");
    $(".interior_slider").slick("refresh");
    $(".interior_slider_thumb").slick("refresh");
    $(".interior_slider .slick-prev").addClass("custom_nav");
    $(".interior_slider .slick-next").addClass("custom_nav");
    $(".interior_slider .slick-prev").html("<i class='fa fa-angle-left'></i>");
    $(".interior_slider .slick-next").html("<i class='fa fa-angle-right'></i>");

    if (wd < 990) {

    } else {
      $(".house_slider").slick("refresh");
      $(window).resize(function () {
        $(".house_slider.modular").slick("refresh");
        $(".house_slider.garden").slick("refresh");
      });
    }
  });

  if (wd < 990) {
    $(".label_image").attr("src","https://tridentmodular.com/wp-content/themes/trident/img/label-image-mobile.jpg");
    $(".interior_slider").slick("refresh");
  } 
  // Dynamic add class

  $(".houses_tabs .nav li:first-child a").addClass("active");
  $(".tab-content .tab-pane:first-child").addClass("show active");
  $(".choose_section .house_tab li:first-child a").addClass("active");
  $(".choose_section .tab-pane:first-child").addClass("show active");
  $(".interior_slider .slick-prev").addClass("custom_nav");
  $(".interior_slider .slick-next").addClass("custom_nav");
  $(".interior_slider .slick-prev").html("<i class='fa fa-angle-left'></i>");
  $(".interior_slider .slick-next").html("<i class='fa fa-angle-right'></i>");
  // Checkbox

  $('input[type="radio"]').click(function (e) {
    var target = $(e.target).parent();

    if (!$(".form_section .form_box.radios label").is("checked")) {
      $(".form_section .form_box.radios label").removeClass("checked");

      $(target).addClass("checked");
    }
  });

  $('input[type="checkbox"]').click(function (e) {
    var target = $(e.target).parent();
    if (!$(".form_section .form_box.checkboxes label").is("checked")) {
      $(target).toggleClass("checked");
    }
  });
  $('.clear').click(function(e) {
    e.preventDefault();
    location.reload();
  });
  galleryFilter();
  sortByPrice();
  filterCatalog();
});

function galleryFilter() {
  let content = $(".galery_row");

  $(".model_filter, .interior_filter").on("change", function () {
    var category1 = $("#model_filter").val();

    var category2 = $("#interior_filter").val();

    var categoryList = [];

    if (category1 != "0") {
      categoryList += category1 + ",";
    }

    if (category2 != "0") {
      categoryList += category2 + ",";
    }

    data = {
      action: "filterposts",

      category_name: categoryList.slice(0, -1),
    };

    $.ajax({
      url: "/wp-admin/admin-ajax.php",

      data: data,

      type: "POST",

      beforeSend: function (xhr) {
        $(".loader").show();
      },

      success: function (data) {
        if (data) {
          $(content).html(
            data +
            '<div class="loader"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>'
            );

          $(".galery_box img").click(function () {
            let src = $(this).attr("src");

            $(".popup_image_box img").attr("src", src);

            $(".popup").fadeIn();

            $("#overlay").fadeIn();
          });
        } else {
          console.log("GONDone");
        }
      },
    });
  });
}

function filterCatalog() {
  let content = $(".catalog_section .col-lg-9 .row");

  $('.form_box.garage input').on('click', function() {      
    $('.form_box.garage input[type="checkbox"]').not(this).prop('checked', false);      
  });



  $(".catalog_section form").on("submit", function (e) {
    e.preventDefault();
    var names = [];
    var garage_val;
    $(".house_type:checked").each(function () {
      let vl = $(this).val();
      names.push(vl);
    });
    $('.form_box.garage input[type="checkbox"]:checked').each(function(){
      let gr_val = $(this).val();
      garage_val =  (gr_val);
    });
    var area_from_val = $('#area_from').val();
    var area_to_val = $('#area_to').val(); 
    var rooms_from_val = $('#rooms_from').val();
    var rooms_to_val = $('#rooms_to').val();
    var bath_num_val = $('#number_rooms_to').val();


    data = {
      action: "filtercatalog",
      category_name: names.join(","),
      garage: garage_val,
      area_from: area_from_val,
      area_to: area_to_val,
      number_rooms_from: rooms_from_val,
      number_rooms_to: rooms_to_val,
      number_of_bathrooms: bath_num_val
    };

    $.ajax({
      url: "/wp-admin/admin-ajax.php",

      data: data,

      type: "POST",

      beforeSend: function (xhr) {
        $(".loader").show();
        console.log(xhr);
      },

      success: function (data) {
        console.log(data);

        if (data) {
          $(content).html(data +'<div class="loader"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>');
        } else {
          console.log("GONDone");
        }
      },
    });
  });
}


function sortByPrice() {
  $('.sort').click(function () {
    $(this).toggleClass('active');
    let content = $(".catalog_section .col-lg-9 .row");
    data = {
      action: 'sortbyprice'
    }
    $.ajax({
      url: "/wp-admin/admin-ajax.php",
      data: data,
      type: "POST",
      beforeSend: function (xhr) {
        $(".loader").show();
        console.log(xhr);
      },
      success: function (data) {
        console.log(data);
        if (data) {
          $(content).html(data +'<div class="loader"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>');
        } else {
          console.log("GONDone");
        }
      },
    });
  });
}
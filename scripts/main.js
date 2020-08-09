$(document).ready(function () {
  console.log("ready");
});

/**
 *
 *    FUNCTIONS FOR THE NAVBAR COLLAPSE - MOBILE/SMALL SCREENS
 *
 */

// Funtion to change navbar styling when the collapser for small devices is triggered to show.
$(".collapse").on("show.bs.collapse", function () {
  $("#nav").toggleClass("nav-show");
  $("#nav-toggler-icon").toggleClass("fa-times");
  /*
  $("#nav-toggler-icon").removeClass("fa-bars");
  $("#nav-toggler-icon").addClass("fa-times");
  */
  $("a").each(function () {
    //$(this).removeClass("default");
    $(this).toggleClass("nav-link-change");
  });
});

// Function to change navbar styling when the collapser for small devices is triggered to hide.
$(".collapse").on("hide.bs.collapse", function () {
  $("#nav").toggleClass("nav-show");
  $("#nav-toggler-icon").toggleClass("fa-times");
  /*
  $("#nav-toggler-icon").removeClass("fa-times");
  $("#nav-toggler-icon").addClass("fa-bars");
  */
  $("a").each(function () {
    $(this).toggleClass("nav-link-change");
    //$(this).addClass("default");
  });
});

/**
 *
 *    FUNCTIONS FOR GENERAL NAVBAR
 *
 */

let lastScrollTop = 0;
$(window).scroll(function () {
  let scrollTop = $(this).scrollTop();
  if (scrollTop > lastScrollTop) {
    $("#nav").addClass("nav-show");
    $("a").each(function () {
      $(this).removeClass("default");
      $(this).addClass("nav-link-change");
    });
  } else {
    $("#nav").removeClass("nav-show");
    $("a").each(function () {
      $(this).removeClass("nav-link-change");
      $(this).addClass("default");
    });
  }
  lastScrollTop = scrollTop;
});

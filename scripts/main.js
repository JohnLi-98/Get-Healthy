$(document).ready(function () {
  console.log("ready");
});

/**
 *
 *    FUNCTIONS FOR THE NAVBAR COLLAPSE - MOBILE/SMALL SCREENS
 *
 */

/*
// Funtion to change navbar styling when the collapser for small devices is triggered to show.
$(".collapse").on("show.bs.collapse", function () {
  $("#nav").toggleClass("nav-show");
  $("#nav-toggler-icon").toggleClass("fa-times");
  $("a").each(function () {
    $(this).toggleClass("nav-link-change");
  });
});

// Function to change navbar styling when the collapser for small devices is triggered to hide.
$(".collapse").on("hide.bs.collapse", function () {
  $("#nav").toggleClass("nav-show");
  $("#nav-toggler-icon").toggleClass("fa-times");
  $("a").each(function () {
    $(this).toggleClass("nav-link-change");
  });
});

*/

/**
 *
 *    FUNCTIONS FOR GENERAL NAVBAR
 *
 */
let navCollapsed;

$(".collapse").on("show.bs.collapse", function () {
  navCollapsed = true;
  changeNav(navCollapsed);
  $("#nav-toggler-icon").toggleClass("fa-bars fa-times");
  $("body").toggleClass("body-scroll");
});

$(".collapse").on("hide.bs.collapse", function () {
  navCollapsed = false;
  changeNav(navCollapsed);
  $("#nav-toggler-icon").toggleClass("fa-bars fa-times");
  $("body").toggleClass("body-scroll");
});

$(window).scroll(function () {
  let navChange;
  let scrollTop = $(this).scrollTop();
  if (scrollTop > 0) {
    navChange = true;
    changeNav(navChange);
  } else {
    navChange = false;
    changeNav(navChange);
  }
});

$(window).resize(function () {
  if ($("#nav-collapser").hasClass("show")) {
    $("#nav-collapser").removeClass("show");
    $("#nav-toggler-icon").toggleClass("fa-bars fa-times");
    $("body").removeClass("body-scroll");
  }
});

function changeNav(navChange) {
  console.log(navChange);
  $("#nav").toggleClass("nav-show", navChange);
  $("#nav-toggler-icon").toggleClass("toggler-icon-change", navChange);
  $("a").each(function () {
    $(this).toggleClass("nav-link-change", navChange);
  });

  $(".nav-link-title").each(function () {
    $(this).toggleClass("nav-link-title-black", navChange);
  });
}
/*
function changeNav(collapseChange) {
  let scrollTop = $(this).scrollTop();
  if (scrollTop > 0 || collapseChange) {
    $("#nav").addClass("nav-show");
    $("#nav-toggler-icon").addClass("toggler-icon-change");
    $("a").each(function () {
      $(this).removeClass("default");
      $(this).addClass("nav-link-change");
    });
  } else {
    $("#nav").removeClass("nav-show");
    $("#nav-toggler-icon").removeClass("toggler-icon-change");
    $("a").each(function () {
      $(this).removeClass("nav-link-change");
      $(this).addClass("default");
    });
  }
}
*/

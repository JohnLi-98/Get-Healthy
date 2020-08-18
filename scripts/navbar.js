/**
 * Function to change navbar styling when the collapser for small devices is triggered to show. Calls the
 * changeNav() function passing in a boolean value to be used for jQuery toggleClass() method.
 */
export function navCollapseShow() {
  $(".collapse").on("show.bs.collapse", function () {
    let navCollapsed = true;
    changeNav(navCollapsed);
    $("#nav-toggler-icon").toggleClass("fa-bars fa-times");
    $("body").toggleClass("body-scroll");
  });
}

/**
 * Function to change navbar styling when the collapser for small devices is triggered to hide. Calls the
 * changeNav() function passing in a boolean value to be used for jQuery toggleClass() method.
 */
export function navCollapseHide() {
  $(".collapse").on("hide.bs.collapse", function () {
    let navCollapsed = false;
    changeNav(navCollapsed);
    $("#nav-toggler-icon").toggleClass("fa-bars fa-times");
    $("body").toggleClass("body-scroll");
  });
}

/**
 * Function to change navbar styling by toggling between classes using a boolean value that is passed in
 * as a parameter.
 */
export function changeNav(navChange) {
  $("#nav").toggleClass("nav-show", navChange);
  $("#nav-toggler-icon").toggleClass("toggler-icon-change", navChange);
  $("#nav a").each(function () {
    $(this).toggleClass("nav-link-change", navChange);
  });

  $(".nav-link-title").each(function () {
    $(this).toggleClass("nav-link-title-black", navChange);
  });
}

/**
 * Function to change navbar styling when the scroll event is triggered.
 */
export function windowScroll() {
  $(window).scroll(function () {
    let scrollTop = $(this).scrollTop();
    if (scrollTop > 150) {
      $("#nav").addClass("nav-hide");
    }

    if (scrollTop < lastScrollTop) {
      $("#nav").removeClass("nav-hide");
    }

    if (scrollTop > 0) {
      let navChange = true;
      changeNav(navChange);
    } else {
      let navChange = false;
      changeNav(navChange);
    }
    lastScrollTop = scrollTop;
  });
}

/**
 * Function to change navbar styling when the window is resized. To stop a minor UI flaw.
 */
export function windowResize() {
  $(window).resize(function () {
    if ($("#nav-collapser").hasClass("show")) {
      $("#nav-collapser").removeClass("show");
      $("#nav-toggler-icon").toggleClass("fa-bars fa-times");
      $("body").removeClass("body-scroll");
    }
  });
}

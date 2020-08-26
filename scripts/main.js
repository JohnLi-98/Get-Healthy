/*

          GENERAL FUNCTIONS

*/

/*
// Function to create an element and setting the attributes for it
function createElement(elemName, elemAttributes) {
  // Create document element
  var elem = document.createElement(elemName);
  // Check if element attirbutes were passed
  if (elemAttributes !== "undefined") {
    // Loop through each argument
    $.each(elemAttributes, function (key, value) {
      // and assign it to the document element
      elem.setAttribute(key, value);
    });
  }
  // Return document element
  return elem;
}
*/

// Navbar JS functions imported calls the functions that use jQuery's event listeners.
import * as navbar from "../scripts/navbar.js";
window.lastScrollTop = 0;
navbar.windowScroll();
navbar.navCollapseShow();
navbar.navCollapseHide();
navbar.windowResize();

// Register JS functions imported and calls the functions that use jQuery's event listeners.
import * as register from "../scripts/register.js";
register.emailFocusout();
register.usernameFocusout();
register.passwordKeyup();
register.registerSubmit();
register.closeLoader();

// Login JS function imported and calls the functions that use jQuery's event listeners.
import * as login from "../scripts/login.js";
login.usernameFocusout();
login.passwordFocusout();
login.loginSubmit();

// Logout process JS functions imported and calls the function that use jQuery's event listeners.
import * as logout from "../scripts/logout.js";
logout.logoutClick();

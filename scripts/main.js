// Navbar JS functions imported calls the functions that use jQuery's event listeners.
import * as navbar from "../scripts/navbar.js";
window.lastScrollTop = 0;
navbar.windowScroll();
navbar.navCollapseShow();
navbar.navCollapseHide();
navbar.windowResize();
navbar.pageLoad();

// Register JS functions imported and calls the functions that use jQuery's event listeners.
import * as register from "../scripts/register.js";
register.emailFocusout();
register.usernameFocusout();
register.pwdKeyup();
register.registerSubmit();
register.closeLoader();

// Login JS function imported and calls the functions that use jQuery's event listeners.
import * as login from "../scripts/login.js";
login.usernameFocusout();
login.pwdFocusout();
login.loginSubmit();

// Reset Password JS functions imported and calls the function that use jQuery's event listeners.
import * as reset from "../scripts/reset-password.js";
reset.emailFocusout();
reset.resetPwdSubmit();

import * as createPwd from "../scripts/create-password.js";
createPwd.pwdKeyup();
createPwd.createPwdSubmit();

// Logout process JS functions imported and calls the function that use jQuery's event listeners.
import * as logout from "../scripts/logout.js";
logout.logoutClick();

// Nutrition JS function imported and calls the function that use jQuery's event listeners.
import * as nutrition from "../scripts/nutrition.js";
nutrition.mealsLetterSearch();
nutrition.mealsFormSearch();

import * as contact from "../scripts/contact-us.js";
contact.firstnameFocusout();
contact.surnameFocusout();
contact.emailFocusout();
contact.subjectFocusout();
contact.messageFocusout();
contact.contactFormSubmit();

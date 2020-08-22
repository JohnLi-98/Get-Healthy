import * as navbar from "../scripts/navbar.js";

window.lastScrollTop = 0;
navbar.windowScroll();
navbar.navCollapseShow();
navbar.navCollapseHide();
navbar.windowResize();

$("#register-email").on("focusout", function () {
  checkEmailValid();
});

$("#register-username").on("focusout", function () {
  checkUsernameValid();
});

$("#register-pwd, #register-pwdC").keyup(checkPwdMatch);

function checkEmailValid() {
  const emailVal = $("#register-email").val();
  const fieldId = $("#register-email").attr("id");

  if (validateEmail(emailVal)) {
    fieldInputValid(fieldId);
    return true;
  } else {
    fieldInputInvalid(fieldId);
    $("#email-check").html("Please Enter a Valid Email").css("color", "red");
    return false;
  }
}

function validateEmail(emailAddress) {
  const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(emailAddress).toLowerCase());
}

function checkUsernameValid() {
  const usernameVal = $("#register-username").val();
  const fieldId = $("#register-username").attr("id");

  if (usernameVal === "") {
    fieldInputInvalid(fieldId);
    $("#username-check").html("Enter a Username").css("color", "red");
    return false;
  } else if (usernameVal.length > 32) {
    fieldInputInvalid(fieldId);
    $("#username-check").html("Too Long").css("color", "red");
    return false;
  } else if (usernameVal.length < 6) {
    fieldInputInvalid(fieldId);
    $("#username-check").html("Too Short").css("color", "red");
    return false;
  } else {
    // Do ajax check
  }
}

function checkPwdMatch() {
  const pwdVal = $("#register-pwd").val();
  const pwdCVal = $("#register-pwdC").val();
  const pwdId = $("#register-pwd").attr("id");
  const pwdCId = $("#register-pwdC").attr("id");

  if (
    (pwdVal === "" && pwdCVal === "") ||
    pwdVal.length < 8 ||
    pwdCVal.length < 8
  ) {
    $("#register-pwd, #register-pwdC").removeClass("is-valid is-invalid");
    $("#register-pwd, #register-pwdC").removeAttr("style");
    $("#password-check").empty();
    return false;
  } else if (pwdVal === pwdCVal && pwdVal.length >= 8 && pwdCVal.length >= 8) {
    fieldInputValid(pwdId);
    fieldInputValid(pwdCId);
    $("#password-check").html("Matching").css("color", "green");
    return true;
  } else {
    fieldInputInvalid(pwdId);
    fieldInputInvalid(pwdCId);
    $("#password-check").html("Not Matching").css("color", "red");
    return false;
  }
}

function fieldInputValid(inputField) {
  $("#" + inputField).removeClass("is-invalid");
  $("#" + inputField).addClass("is-valid");
  $("#" + inputField).attr("style", "border-color: #21d192");
  $("#" + inputField)
    .siblings(".fas")
    .attr("style", "color: #21d192");
}

function fieldInputInvalid(inputField) {
  $("#" + inputField).removeClass("is-valid");
  $("#" + inputField).addClass("is-invalid");
  $("#" + inputField).attr("style", "border-color: #ff0000");
  $("#" + inputField)
    .siblings(".fas")
    .attr("style", "color: #ff0000");
}

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
    $.ajax({
      type: "post",
      url: "../ajax/register/email-check.php",
      data: {
        email: emailVal,
      },
      success: function (data) {
        if (data == "1") {
          fieldInputInvalid(fieldId);
          $("#email-check").html("Email already exists").css("color", "red");
        } else {
          fieldInputValid(fieldId);
          $("#email-check").empty();
        }
      },
    });
  } else {
    fieldInputInvalid(fieldId);
    $("#email-check").html("Please Enter a Valid Email").css("color", "red");
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
  } else if (usernameVal.length > 32) {
    fieldInputInvalid(fieldId);
    $("#username-check").html("Too Long").css("color", "red");
  } else if (usernameVal.length < 6) {
    fieldInputInvalid(fieldId);
    $("#username-check").html("Too Short").css("color", "red");
  } else {
    $.ajax({
      type: "post",
      url: "../ajax/register/username-check.php",
      data: {
        username: usernameVal,
      },
      success: function (data) {
        if (data == "1") {
          fieldInputInvalid(fieldId);
          $("#username-check").html("Username taken").css("color", "red");
        } else {
          fieldInputValid(fieldId);
          $("#username-check").empty();
        }
      },
    });
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
    $("#register-pwd, #register-pwdC").siblings(".fas").removeAttr("style");
    $("#password-check").empty();
  } else if (
    pwdVal === pwdCVal &&
    (pwdVal.length >= 8 || pwdCVal.length >= 8)
  ) {
    fieldInputValid(pwdId);
    fieldInputValid(pwdCId);
    $("#password-check").html("Matching").css("color", "green");
  } else {
    fieldInputInvalid(pwdId);
    fieldInputInvalid(pwdCId);
    $("#password-check").html("Not Matching").css("color", "red");
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

$("#register-form").on("submit", function (event) {
  console.log("checking form");
  let formValid;
  checkEmailValid();
  checkUsernameValid();
  if (
    !$("#register-pwd").hasClass("is-valid") ||
    !$("#register-pwdC").hasClass("is-valid")
  ) {
    fieldInputInvalid($("#register-pwd").attr("id"));
    fieldInputInvalid($("#register-pwdC").attr("id"));
    $("#password-check").html("Not Matching").css("color", "red");
  }

  $("#register-form input").each(function () {
    if ($(this).hasClass("is-invalid")) {
      formValid = false;
    }
  });
  if (formValid === false) {
    return false;
  } else {
    return true;
  }
});

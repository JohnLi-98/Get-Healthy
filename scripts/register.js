// import fieldInputInvalid and fieldInputValid function from general.js file
import {
  fieldInputInvalid,
  fieldInputValid,
  validateEmail,
} from "../scripts/general.js";

/**
 * Function to check that the email entered is valid. First checks whether the value entered returns true from
 * validateEmail(), which is then passed as a post type for email-check.php through ajax to query the database to
 * see if it already exists. The appropriate styling is displayed to the user, depending on the result.
 */
export function checkEmailValid() {
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
    $("#email-check").html("Enter a Valid Email").css("color", "red");
  }
}

/**
 * Function to check that the username entered is valid. Checks whether the value entered is empty, more than 32
 * or less than 6 characters to apply the invalid styling if so. If the value meets these conditions, then check
 * whether username already exists in the database. If not, display to user that it is valid.
 */
export function checkUsernameValid() {
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

/**
 * Function to check that the passwords entered are matching. Like the other functions for validation, applies the
 * appropriate styling to these fields, depending on the result.
 */
export function checkPwdMatch() {
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

/**
 * Function to create an account with entered values once validated. Passes input field values to create-account.php
 * file through ajax as post types. Upon success or error, response by toggling the class d-none for loading-icon
 * and success-response/error-response. If successful, user is redirected to home page after 8 secs.
 */
export function createAccount() {
  console.log("creating the account");
  const emailVal = $("#register-email").val();
  const usernameVal = $("#register-username").val();
  const pwdVal = $("#register-pwd").val();
  const pwdCVal = $("#register-pwdC").val();

  $.ajax({
    type: "post",
    url: "../ajax/register/create-account.php",
    data: {
      email: emailVal,
      username: usernameVal,
      password: pwdVal,
      passwordConfirm: pwdCVal,
    },
    success: function () {
      $("#loading-icon, #success-response").toggleClass("d-none");
      setTimeout(function () {
        window.location.replace("http://gethealthy.infinityfreeapp.com");
      }, 8000);
    },
    error: function (res) {
      $("#loading-icon, #error-response").toggleClass("d-none");
      $("#error-message").html("An error occured: " + res.responseText);
    },
  });
}

/**
 * Function to run checkEmailValid() when the register-email input field loses focus.
 */
export function emailFocusout() {
  $("#register-email").on("focusout", function () {
    checkEmailValid();
  });
}

/**
 * Function to run checkUsernameValid() when the register-username input field loses focus.
 */
export function usernameFocusout() {
  $("#register-username").on("focusout", function () {
    checkUsernameValid();
  });
}

/**
 * Function to run checkPwdMatch function when the register-pwd or register-pwdC input fields have a key entered.
 */
export function pwdKeyup() {
  $("#register-pwd, #register-pwdC").keyup(checkPwdMatch);
}

/**
 * Function to check form validation on submission. First, runs functions on email and username fields to apply
 * appropriate styling. Then checks if the password fields don't have is-valid class, to apply is-invalid styling.
 * Next, it checks each field input for is-invalid to set the formValid variable to the appropriate value. Finally,
 * if formValid is not equal to false, toggle #loader to show and run createAccount() after 2 secs.
 */
export function registerSubmit() {
  $("#register-form").on("submit", function (event) {
    event.preventDefault();
    event.stopPropagation();
    let formValid;
    checkEmailValid();
    checkUsernameValid();
    if (
      !$("#register-pwd").hasClass("is-valid") ||
      !$("#register-pwdC").hasClass("is-valid")
    ) {
      fieldInputInvalid($("#register-pwd").attr("id"));
      fieldInputInvalid($("#register-pwdC").attr("id"));
      if (
        $("#register-pwd").val().length < 8 ||
        $("#register-pwdC").val().length < 8
      ) {
        $("#password-check").html("Too Short").css("color", "red");
      } else {
        $("#password-check").html("Not Matching").css("color", "red");
      }
    }

    $("#register-form input").each(function () {
      if ($(this).hasClass("is-invalid")) {
        formValid = false;
      }
    });

    if (formValid !== false) {
      $("#loader").toggleClass("d-none");
      $(document.body).toggleClass("body-scroll");
      setTimeout(function () {
        createAccount();
      }, 2000);
    }
  });
}

/**
 * Function to close the #loader div when clicked to close.
 */
export function closeLoader() {
  $(".close-loader").click(function () {
    $("#loader, #error-response, #loading-icon").toggleClass("d-none");
    $(document.body).toggleClass("body-scroll");
  });
}

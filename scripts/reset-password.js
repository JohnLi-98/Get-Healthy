// import fieldInputInvalid function from general.js file
import {
  fieldInputInvalid,
  validateEmail,
  createElement,
} from "../scripts/general.js";

/**
 * Function to change login-username styling when the input loses focus. Invalidates the field if it is left empty
 * when out of focus, otherwise if a value is entered, the invalid styling is removedd.
 */
export function emailFocusout() {
  $("#reset-pwd-email").on("focusout", function () {
    checkResetPwdEmail();
  });
}

export function checkResetPwdEmail() {
  const emailVal = $("#reset-pwd-email").val();
  const fieldId = $("#reset-pwd-email").attr("id");

  if (emailVal === "") {
    fieldInputInvalid(fieldId);
    $("#reset-pwd-email-check").html("Enter a Valid Email").css("color", "red");
    return false;
  } else {
    if (!validateEmail(emailVal)) {
      fieldInputInvalid(fieldId);
      $("#reset-pwd-email-check")
        .html("Enter a Valid Email")
        .css("color", "red");
      return false;
    } else {
      $("#reset-pwd-email").removeClass("is-valid is-invalid");
      $("#reset-pwd-email").removeAttr("style");
      $("#reset-pwd-email").siblings(".fas").removeAttr("style");
      $("#reset-pwd-email-check").empty();
    }
  }
}

export function resetPwdSubmit() {
  $("#reset-pwd-form").submit(function (event) {
    event.preventDefault();
    event.stopPropagation();
    let formValid;
    const resetPwdEmailVal = $("#reset-pwd-email").val();

    formValid = checkResetPwdEmail();

    if (formValid !== false) {
      $.ajax({
        type: "post",
        url: "../ajax/login/send-reset-link.php",
        data: {
          email: resetPwdEmailVal,
        },
        success: function () {
          showResetConfirmation(resetPwdEmailVal);
        },
        error: function () {
          showResetError(resetPwdEmailVal);
        },
      });
    }
  });
}

export function showResetConfirmation(email) {
  $("#reset-pwd-image").hide();
  $("#reset-pwd-form").hide();
  $("#reset-pwd-heading").text("RESET LINK SENT");
  $("#reset-pwd-text").removeClass("px-5");
  $("#reset-pwd-text").addClass("text-left pt-1");
  const resetText =
    "An email containing a link to reset your account's password was sent to <b>" +
    email +
    "</b>.\n\n Click the link in the email and follow the instruction to reset your password and gain access to" +
    " your account again. \n\n If you haven't received this email, be sure to check your junk or spam email" +
    " folder, otherwise you can request another reset email below.";
  const resetResponse = $("#reset-pwd-text").html(resetText);
  resetResponse.html(resetResponse.html().replace(/\n/g, "<br/>"));

  const buttonDiv = createElement("div", {
    class: "btn-group btn-block d-flex mt-5",
    role: "group",
  });
  const resendButton = createElement("a", {
    class: "btn btn-light border border-dark w-50",
    href: "reset-password.php",
    role: "button",
  });
  resendButton.innerHTML = "RESEND EMAIL".bold();
  const loginButton = createElement("a", {
    class: "btn btn-light border border-dark w-50",
    href: "login.php",
    role: "button",
  });
  loginButton.innerHTML = "SIGN IN".bold();
  buttonDiv.append(resendButton);
  buttonDiv.append(loginButton);
  $("#reset-pwd-text").append(buttonDiv);
}

export function showResetError(email) {
  $("#reset-pwd-image").hide();
  $("#reset-pwd-form").hide();
  $("#reset-pwd-heading").text("UNABLE TO SEND EMAIL");
  $("#reset-pwd-text").removeClass("px-5");
  $("#reset-pwd-text").addClass("text-left pt-1");
  const resetText =
    "We were unable to send an email to reset your account's password to <b>" +
    email +
    "</b>.\n\n This service could be temporarily unavailable or the server encountered an error while processing" +
    " your request. \n\n Try requesting another reset email below or wait until later to try again, if this error" +
    " persists.";
  const resetResponse = $("#reset-pwd-text").html(resetText);
  resetResponse.html(resetResponse.html().replace(/\n/g, "<br/>"));

  const buttonDiv = createElement("div", {
    class: "btn-group btn-block d-flex mt-5",
    role: "group",
  });
  const resendButton = createElement("a", {
    class: "btn btn-light border border-dark w-50",
    href: "reset-password.php",
    role: "button",
  });
  resendButton.innerHTML = "RESEND EMAIL".bold();
  const loginButton = createElement("a", {
    class: "btn btn-light border border-dark w-50",
    href: "login.php",
    role: "button",
  });
  loginButton.innerHTML = "SIGN IN".bold();
  buttonDiv.append(resendButton);
  buttonDiv.append(loginButton);
  $("#reset-pwd-text").append(buttonDiv);
}

import {
  fieldInputInvalid,
  fieldInputValid,
  createElement,
} from "../scripts/general.js";

/**
 * Function to check that the passwords entered are matching. Applies the appropriate styling to these fields,
 * depending on whether the fields are valid.
 */
export function checkPwdMatch() {
  const pwdVal = $("#create-pwd").val();
  const pwdCVal = $("#create-pwdC").val();
  const pwdId = $("#create-pwd").attr("id");
  const pwdCId = $("#create-pwdC").attr("id");

  if (
    (pwdVal === "" && pwdCVal === "") ||
    pwdVal.length < 8 ||
    pwdCVal.length < 8
  ) {
    $("#create-pwd, #create-pwdC").removeClass("is-valid is-invalid");
    $("#create-pwd, #create-pwdC").removeAttr("style");
    $("#create-pwd, #create-pwdC").siblings(".fas").removeAttr("style");
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

export function updatePwd() {
  const resetEmail = $("#reset-email").val();
  const pwdVal = $("#create-pwd").val();
  const pwdCVal = $("#create-pwdC").val();

  $.ajax({
    type: "post",
    url: "../ajax/login/update-password.php",
    data: {
      email: resetEmail,
      password: pwdVal,
      passwordConfirm: pwdCVal,
    },
    success: function (res) {
      showUpdateConfirmation();
    },
    error: function (res) {
      showUpdateError(res.responseText);
    },
  });
}

export function showUpdateConfirmation() {
  $("#create-pwd-form").hide();
  $("#create-pwd-heading").text("PASSWORD UPDATED");
  $("#create-pwd-text").toggleClass("d-none");
  $("#create-pwd-text").addClass("text-left");
  const successText =
    "Successfully created a new password. Remember to keep this password secure to prevent " +
    "unauthorised users from accessing your account.";
  $("#create-pwd-text").text(successText);

  const buttonDiv = createElement("div", {
    class: "btn-group btn-block d-flex mt-5",
    role: "group",
  });
  const homeButton = createElement("a", {
    class: "btn btn-light border border-dark w-50",
    href: "../index.php",
    role: "button",
  });
  homeButton.innerHTML = "HOME PAGE".bold();
  const loginButton = createElement("a", {
    class: "btn btn-light border border-dark w-50",
    href: "login.php",
    role: "button",
  });
  loginButton.innerHTML = "SIGN IN".bold();
  buttonDiv.append(homeButton);
  buttonDiv.append(loginButton);
  $("#create-pwd-text").append(buttonDiv);
}

export function showUpdateError(response) {
  $("#create-pwd-form").hide();
  $("#create-pwd-heading").text("PASSWORD NOT UPDATED");
  $("#create-pwd-text").toggleClass("d-none");
  $("#create-pwd-text").html(response);

  const buttonDiv = createElement("div", {
    class: "btn-group btn-block d-flex mt-5",
    role: "group",
  });
  const retryButton = createElement("a", {
    class: "btn btn-light border border-dark w-50",
    role: "button",
  });
  retryButton.innerHTML = "RETRY".bold();
  $(retryButton).click(function () {
    location.reload(true);
  });
  const homeButton = createElement("a", {
    class: "btn btn-light border border-dark w-50",
    href: "../index.php",
    role: "button",
  });
  homeButton.innerHTML = "HOME".bold();
  buttonDiv.append(retryButton);
  buttonDiv.append(homeButton);
  $("#create-pwd-text").append(buttonDiv);
}

/**
 * Function to run checkPwdMatch function when the create-pwd or create-pwdC input fields have a key entered.
 */
export function pwdKeyup() {
  $("#create-pwd, #create-pwdC").keyup(checkPwdMatch);
}

export function createPwdSubmit() {
  $("#create-pwd-form").on("submit", function (event) {
    event.preventDefault();
    event.stopPropagation();
    console.log("Changing passwords");
    let formValid;

    if (
      !$("#create-pwd").hasClass("is-valid") ||
      !$("#create-pwdC").hasClass("is-valid")
    ) {
      fieldInputInvalid($("#create-pwd").attr("id"));
      fieldInputInvalid($("#create-pwdC").attr("id"));
      if (
        $("#create-pwd").val().length < 8 ||
        $("#create-pwdC").val().length < 8
      ) {
        $("#password-check").html("Too Short").css("color", "red");
      } else {
        $("#password-check").html("Not Matching").css("color", "red");
      }
    }

    $("#create-pwd-form input").each(function () {
      if ($(this).hasClass("is-invalid")) {
        formValid = false;
      }
    });

    if (formValid !== false) {
      updatePwd();
    }
  });
}

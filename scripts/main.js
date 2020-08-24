import * as navbar from "../scripts/navbar.js";

window.lastScrollTop = 0;
navbar.windowScroll();
navbar.navCollapseShow();
navbar.navCollapseHide();
navbar.windowResize();

/*

          GENERAL FUNCTIONS

*/

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

/*

          IDENTITY FUNCTIONS (REGISTER)

*/

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
    $("#password-check").html("Not Matching").css("color", "red");
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

function createAccount() {
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
        window.location.replace(
          "http://unn-w16010421.newnumyspace.co.uk/Projects/Get-Healthy/index.php"
        );
      }, 8000);
    },
    error: function (res) {
      $("#loading-icon, #error-response").toggleClass("d-none");
      $("#error-message").html("An error occured: " + res.responseText);
    },
  });
}

$(".close-loader").click(function () {
  $("#loader, #error-response, #loading-icon").toggleClass("d-none");
  $(document.body).toggleClass("body-scroll");
});

/*

          LOGIN FUNCTIONS

*/

$("#login-username").on("focusout", function () {
  const usernameVal = $("#login-username").val();
  const fieldId = $("#login-username").attr("id");

  if (usernameVal === "") {
    fieldInputInvalid(fieldId);
  } else {
    $("#login-username").removeClass("is-invalid");
    $("#login-username").removeAttr("style");
    $("#login-username").siblings(".fas").removeAttr("style");
  }
});

$("login-pwd").on("focusout", function () {
  const pwdVal = $("#login-pwd").val();
  const fieldId = $("#login-pwd").attr("id");

  if (pwdVal === "") {
    fieldInputInvalid(fieldId);
  } else {
    $("#login-pwd").removeClass("is-invalid");
    $("#login-pwd").removeAttr("style");
    $("'login-pwd").siblings(".fas").removeAttr("style");
  }
});

$("#login-form").submit(function (event) {
  event.preventDefault();
  event.stopPropagation();
  let formValid;

  $("#login-form input").each(function () {
    if ($(this).val() === "") {
      fieldInputInvalid($(this));
      formValid = false;
    }
  });

  if (formValid !== false) {
    $("#loader").toggleClass("d-none");
    $(document.body).toggleClass("body-scroll");
    setTimeout(function () {
      authenticateAccount();
    }, 2000);
  }
});

function authenticateAccount() {
  const usernameVal = $("#login-username").val();
  const pwdVal = $("#login-pwd").val();
  $.ajax({
    type: "post",
    url: "../ajax/login/authenticate-account.php",
    data: {
      username: usernameVal,
      password: pwdVal,
    },
    success: function (res) {
      if (res.redirect) {
        window.location.replace(res.redirect);
      } else {
        window.location.replace(
          "http://unn-w16010421.newnumyspace.co.uk/Projects/Get-Healthy/index.php"
        );
      }
    },
    error: function (res) {
      $("#loading-icon, #error-response").toggleClass("d-none");
      $("#error-message").html("An error occured: " + res.responseText);
    },
  });
}

/*

          LOG OUT FUNCTIONS

*/

function createLogoutMessage() {
  const div = createElement("div", {
    class: "container-fluid h-100 w-100 form-submit",
    id: "loader",
  });
  const row = createElement("div", {
    class: "row h-100",
  });
  const col = createElement("div", {
    class:
      "col-9 col-md-7 col-lg-5 justify-content-center align-items-center h-75 text-dark d-flex flex-column m-auto",
  });
  const iconDiv = createElement("div", {
    class: "response text-center text-white",
    id: "loading-icon",
  });
  const icon = createElement("i", {
    class: "fas fa-spinner fa-pulse fa-4x",
  });
  const h2 = createElement("h2", {
    class: "pt-4",
  });
  div.append(row).append(col).append(iconDiv);
  iconDiv.append(icon, h2);
  h2.append("Logging Out");
  document.append(div);
}

/*
<div class="container-fluid h-100 w-100 form-submit d-none" id="loader">
        <div class="row h-100">
            <div class="m-auto col-9 col-md-7 col-lg-5 justify-content-center align-items-center h-75 text-dark d-flex flex-column">
                <div class="response text-center text-white" id="loading-icon">
                    <i class="fas fa-spinner fa-pulse fa-4x"></i>
                    <h2 class="pt-4">Loading</h2>
                </div>

                <div class="response alert-danger text-center d-none" id="error-response">
                    <div class="mr-2 mt-1">
                        <button type="button" class="close close-loader" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <svg class="error mt-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                        <circle class="error-circle" cx="26" cy="26" r="25" fill="none" />
                        <line class="error-cross" x1="15" y1="15" x2="37" y2="37" stroke="white" stroke-width="2" />
                        <line class="error-cross" x1="37" y1="15" x2="15" y2="37" stroke="white" stroke-width="2" />
                    </svg>

                    <div class="mt-4 mx-4">
                        <h2>Error</h2>
                        <p id="error-message"></p>
                    </div>

                    <div class="mb-3">
                        <button type="button" class="btn btn-danger close-loader" aria-label="Close">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
  */

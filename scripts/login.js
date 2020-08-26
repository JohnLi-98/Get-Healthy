/**
 * Function to change login-username styling when the input loses focus. Invalidates the field if it is left empty
 * when out of focus, otherwise if a value is entered, the invalid styling is removedd.
 */
export function usernameFocusout() {
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
}

/**
 * Function to change login-pwd styling when the input loses focus. Invalidates the field if it is left empty
 * when out of focus, otherwise if a value is entered, the invalid styling is removedd.
 */
export function passwordFocusout() {
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
}

/**
 * Function to check that the form is valid upon submission. First prevents the form from submitting, then checks
 * that each input is not empty, otherwise it changes the styling of the input field if it is and sets variable
 * formValid to false. Finally checks to see if the formValid is not set to false, so that it can toggle the loader
 * div to appear and run authenticateAccount() for login.
 */
export function loginSubmit() {
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
}

/**
 * Function to pass the values entered by the user to authenticate-account.php through ajax as post types, to do
 * the backend check with the database to see these match up with an account. If successful, redirect the user to
 * home page. If there is an error, display this to the user.
 */
export function authenticateAccount() {
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

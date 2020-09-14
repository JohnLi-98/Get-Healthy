import {
  fieldInputInvalid,
  fieldInputValid,
  validateEmail,
} from "../scripts/general.js";

export function firstnameFocusout() {
  $("#contact-firstname").on("focusout", function () {
    checkFirstname();
  });
}

export function checkFirstname() {
  const firstnameVal = $("#contact-firstname").val();
  const fieldId = $("#contact-firstname").attr("id");

  if (firstnameVal === "") {
    fieldInputInvalid(fieldId);
  } else {
    fieldInputValid(fieldId);
  }
}

export function surnameFocusout() {
  $("#contact-surname").on("focusout", function () {
    checkSurname();
  });
}

export function checkSurname() {
  const surnameVal = $("#contact-surname").val();
  const fieldId = $("#contact-surname").attr("id");

  if (surnameVal === "") {
    fieldInputInvalid(fieldId);
  } else {
    fieldInputValid(fieldId);
  }
}

export function emailFocusout() {
  $("#contact-email").on("focusout", function () {
    checkEmail();
  });
}

export function checkEmail() {
  const emailVal = $("#contact-email").val();
  const fieldId = $("#contact-email").attr("id");

  if (emailVal === "") {
    fieldInputInvalid(fieldId);
  } else {
    if (!validateEmail(emailVal)) {
      fieldInputInvalid(fieldId);
    } else {
      fieldInputValid(fieldId);
    }
  }
}

export function subjectFocusout() {
  $("#contact-subject").on("focusout", function () {
    checkSubject();
  });
}

export function checkSubject() {
  const subjectVal = $("#contact-subject").val();
  const fieldId = $("#contact-subject").attr("id");

  if (subjectVal === "") {
    fieldInputInvalid(fieldId);
  } else {
    fieldInputValid(fieldId);
  }
}

export function messageFocusout() {
  $("#contact-message").on("focusout", function () {
    checkMessage();
  });
}

export function checkMessage() {
  const messageVal = $("#contact-message").val();
  const fieldId = $("#contact-message").attr("id");

  if (messageVal === "") {
    fieldInputInvalid(fieldId);
  } else {
    fieldInputValid(fieldId);
  }
}

export function contactFormSubmit() {
  $("#contact-form").on("submit", function (event) {
    event.preventDefault();
    event.stopPropagation();
    let formValid;

    checkFirstname();
    checkSurname();
    checkEmail();
    checkSubject();
    checkMessage();

    $("#contact-form :input").each(function () {
      if ($(this).hasClass("is-invalid")) {
        formValid = false;
      }
    });

    if (formValid !== false) {
      console.log("this worked sending email");
      sendContactEmail();
      console.log("done with this function");
    }
  });
}

export function sendContactEmail() {
  const firstname = $("#contact-firstname").val();
  const surname = $("#contact-surname").val();
  const email = $("#contact-email").val();
  const subject = $("#contact-subject").val();
  const message = $("#contact-message").val();

  $.ajax({
    type: "post",
    url: "../ajax/send-contact-email.php",
    data: {
      firstname: firstname,
      surname: surname,
      email: email,
      subject: subject,
      message: message,
    },
    success: function () {
      alert("great success");
    },
    error: function () {
      alert("failure");
    },
  });
}

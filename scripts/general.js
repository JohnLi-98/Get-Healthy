/**
 * Function that changes the styling of the input field passed in as a parameter to a valid one.
 */
export function fieldInputValid(inputField) {
  $("#" + inputField).removeClass("is-invalid");
  $("#" + inputField).addClass("is-valid");
  $("#" + inputField).attr("style", "border-color: #21d192");
  $("#" + inputField)
    .siblings(".fas")
    .attr("style", "color: #21d192");
  $("#" + inputField)
    .next()
    .attr("style", "color: #21d192");
}

/**
 * Function that changes the styling of the input field passed in as a parameter to a invalid one.
 */
export function fieldInputInvalid(inputField) {
  $("#" + inputField).removeClass("is-valid");
  $("#" + inputField).addClass("is-invalid");
  $("#" + inputField).attr("style", "border-color: #ff0000");
  $("#" + inputField)
    .siblings(".fas")
    .attr("style", "color: #ff0000");
  $("#" + inputField)
    .next()
    .attr("style", "color: red");
}

/**
 * Function that takes the emailAddress parameter and checks it with a regular expression for a valid email.
 */
export function validateEmail(emailAddress) {
  const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(emailAddress).toLowerCase());
}

// Function to create an element and setting the attributes for it
export function createElement(elemName, elemAttributes) {
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

export function shuffle(array) {
  for (var i = 0; i < array.length - 1; i++) {
    var j = i + Math.floor(Math.random() * (array.length - i));

    var temp = array[j];
    array[j] = array[i];
    array[i] = temp;
  }
  return array;
}

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

export function shuffle(quotesArray) {
  for (var i = 0; i < quotesArray.length - 1; i++) {
    var j = i + Math.floor(Math.random() * (quotesArray.length - i));

    var temp = quotesArray[j];
    quotesArray[j] = quotesArray[i];
    quotesArray[i] = temp;
  }
  return quotesArray;
}

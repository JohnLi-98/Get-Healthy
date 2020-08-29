// Navbar JS functions imported calls the functions that use jQuery's event listeners.
import * as navbar from "../scripts/navbar.js";
window.lastScrollTop = 0;
navbar.windowScroll();
navbar.navCollapseShow();
navbar.navCollapseHide();
navbar.windowResize();

// Register JS functions imported and calls the functions that use jQuery's event listeners.
import * as register from "../scripts/register.js";
register.emailFocusout();
register.usernameFocusout();
register.passwordKeyup();
register.registerSubmit();
register.closeLoader();

// Login JS function imported and calls the functions that use jQuery's event listeners.
import * as login from "../scripts/login.js";
login.usernameFocusout();
login.passwordFocusout();
login.loginSubmit();

// Logout process JS functions imported and calls the function that use jQuery's event listeners.
import * as logout from "../scripts/logout.js";
logout.logoutClick();

import * as nutrition from "../scripts/nutrition.js";
nutrition.mealsLetterSearch();
nutrition.mealsFormSearch();

/*
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

function getMealsByLetter(letter) {
  let getURL = "https://www.themealdb.com/api/json/v1/1/search.php?f=" + letter;
  $.ajax({
    accepts: { json: "application/json" },
    url: getURL,
    request: "GET",
    dataType: "json",
  }).done(function (result) {
    const response = result.meals;

    if (!response) {
      const noResults = createElement("h4", {});
      noResults.textContent = "0 results for meals starting with: " + letter;
      $("#meal-results").append(noResults);
    } else {
      const numberOfResults = createElement("h4", {
        class: "col-12 text-center",
      });
      numberOfResults.textContent =
        response.length + " Meals Starting With: " + letter;
      $("#meal-results").append(numberOfResults);

      $.each($(response), function (key, val) {
        const ingredientsArray = [];
        const measurementsArray = [];
        const data = val;
        const mealName = val.strMeal;
        const mealImage = val.strMealThumb;
        const mealInstructions = val.strInstructions;

        Object.entries(data)
          .filter(([_, value]) => value)
          .filter(([key]) => key.includes("Ingredient"))
          .map(([key, value]) => ingredientsArray.push(value));

        Object.entries(data)
          .filter(([_, value]) => value)
          .filter(([key]) => key.includes("Measure"))
          .map(([key, value]) => measurementsArray.push(value));

        createMealHTML(
          mealImage,
          mealName,
          ingredientsArray,
          measurementsArray,
          mealInstructions
        );
      });
    }
  });
}



function getMealsBySearch(input) {
  let getURL = "https://www.themealdb.com/api/json/v1/1/search.php?s=" + input;
  $.ajax({
    accepts: { json: "application/json" },
    url: getURL,
    request: "GET",
    dataType: "json",
  }).done(function (result) {
    const response = result.meals;

    if (!response) {
      const noResults = createElement("h4", {});
      noResults.textContent = "0 Meals With: " + input;
      $("#meal-results").append(noResults);
    } else {
      const numberOfResults = createElement("h4", {
        class: "col-12 text-center",
      });
      numberOfResults.textContent = response.length + " Meals With: " + input;
      $("#meal-results").append(numberOfResults);

      $.each($(response), function (key, val) {
        const ingredientsArray = [];
        const measurementsArray = [];
        const data = val;
        const mealName = val.strMeal;
        const mealImage = val.strMealThumb;
        const mealInstructions = val.strInstructions;

        Object.entries(data)
          .filter(([_, value]) => value)
          .filter(([key]) => key.includes("Ingredient"))
          .map(([key, value]) => ingredientsArray.push(value));

        Object.entries(data)
          .filter(([_, value]) => value)
          .filter(([key]) => key.includes("Measure"))
          .map(([key, value]) => measurementsArray.push(value));

        createMealHTML(
          mealImage,
          mealName,
          ingredientsArray,
          measurementsArray,
          mealInstructions
        );
      });
    }
  });
}

function createMealHTML(
  mealImageURL,
  mealName,
  mealIngredients,
  mealMeasurements,
  mealInstructions
) {
  const mealDiv = createElement("div", {
    class: "col-6 col-md-4 col-lg-3 text-center pt-4",
  });
  const mealImageTag = createElement("a", {
    href: "#" + mealName,
  });
  const mealImage = createElement("img", {
    class: "img-fluid pb-2",
    src: mealImageURL,
    alt: "Meal Image",
  });
  mealImageTag.append(mealImage);
  const mealTitle = createElement("a", {
    href: "#" + mealName,
  });
  mealTitle.textContent = mealName;
  mealImageTag.onclick = function () {
    console.log("Clicked to open");
  };
  mealTitle.onclick = function () {
    console.log("Clicked to open");
  };
  mealDiv.append(mealImageTag);
  mealDiv.append(mealTitle);
  $("#meal-results").append(mealDiv);
}
*/

import { createElement } from "../scripts/general.js";

export function mealsLetterSearch() {
  $("#meal-letters a").click(function () {
    const letter = $(this).text();
    const url =
      "https://www.themealdb.com/api/json/v1/1/search.php?f=" + letter;
    getMeals(url, letter);
  });
}

export function mealsFormSearch() {
  $("#search-meal-form").submit(function (event) {
    event.preventDefault();
    event.stopPropagation();
    const input = $("#search-meal").val();
    const url = "https://www.themealdb.com/api/json/v1/1/search.php?s=" + input;
    getMeals(url, input);
  });
}

export function getMeals(getURL, searchVal) {
  $("#meal-results").empty();
  $.ajax({
    accepts: { json: "application/json" },
    url: getURL,
    request: "GET",
    dataType: "json",
  }).done(function (response) {
    const result = response.meals;
    console.log(result);
    let numOfResults = 0;
    let resultText;
    if (result) {
      numOfResults = result.length;
    }

    if (getURL.includes("search.php?s=")) {
      resultText = numOfResults + " Meals With: " + searchVal;
    } else {
      resultText =
        numOfResults + " results for meals starting with: " + searchVal;
    }

    if (!result) {
      const noResults = createElement("h4", {
        class: "col-12 text-center pt-5",
      });
      $(noResults).text(resultText);
      $("#meal-results").append(noResults);
    } else {
      const numberOfResults = createElement("h4", {
        class: "col-12 text-center pt-5",
      });
      $(numberOfResults).text(resultText);
      $("#meal-results").append(numberOfResults);

      $.each($(result), function (key, val) {
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
          mealName,
          mealImage,
          ingredientsArray,
          measurementsArray,
          mealInstructions
        );
      });
    }
  });
}

export function createMealHTML(
  mealName,
  mealImageURL,
  mealIngredients,
  mealMeasurements,
  mealInstructions
) {
  const mealDiv = createElement("div", {
    class: "col-6 col-md-4 col-lg-3 text-center pt-4",
  });
  const mealImageTag = createElement("a", {});
  const mealImage = createElement("img", {
    class: "img-fluid pb-2",
    src: mealImageURL,
    alt: "Meal Image",
  });
  mealImageTag.append(mealImage);
  const mealTitle = createElement("a", {});
  $(mealTitle).text(mealName);
  $(mealImageTag)
    .add(mealTitle)
    .on("click", function () {
      replaceMealRecipe(
        mealName,
        mealImageURL,
        mealIngredients,
        mealMeasurements,
        mealInstructions
      );
      $("#recipe-modal").modal();
    });

  mealDiv.append(mealImageTag);
  mealDiv.append(mealTitle);
  $("#meal-results").append(mealDiv);
}

export function replaceMealRecipe(
  name,
  imageURL,
  ingredients,
  measurements,
  instructions
) {
  $("#recipe-modal-title").text(name + " - Recipe");
  $("#recipe-modal-image").attr("src", imageURL);

  $("#recipe-modal-ingredients").empty();
  for (let i = 0; i < ingredients.length; i++) {
    let ingredientListItem = document.createElement("li");
    let ingredientListValue = document.createTextNode(
      measurements[i] + " " + ingredients[i]
    );
    ingredientListItem.appendChild(ingredientListValue);
    $("#recipe-modal-ingredients").append(ingredientListItem);
  }

  $("#recipe-modal-instructions").empty();
  const sentences = instructions.match(/[^\.!\?]+[\.!\?]+/g);
  for (let i = 0; i < sentences.length; i++) {
    //let instructionListItem = document.createElement("li");
    //let instructionListValue = document.createTextNode("- " + sentences[i]);
    //instructionListItem.appendChild(instructionListValue);
    $("#recipe-modal-instructions").append(sentences[i] + "<br /> <br/>");
  }
}

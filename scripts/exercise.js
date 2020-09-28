import { createElement, shuffle } from "../scripts/general.js";

export function exercisePageReady() {
  $(document).ready(function () {
    const exercisesDiv = document.getElementById("exercises");

    if (exercisesDiv) {
      getExercises();
    }
  });
}

export function getExercises() {
  const exerciseJSONData = "exercises.json";

  $.getJSON(exerciseJSONData, {
    format: JSON,
  }).done(function (result) {
    shuffle(result);
    $("#number-of-exercises").text(result.length + " Exercises Found");
    $.each(result, function (key, val) {
      createExerciseHTML(
        val.Name,
        val.ImageURL,
        val.Equipment,
        val.MainMuscleGroup,
        val.SecondaryMuscles,
        val.Description,
        val.TraningProgram,
        val.Instructions
      );
    });
  });
}

export function createExerciseHTML(
  name,
  url,
  equipment,
  main,
  secondary,
  desc,
  program,
  instructions
) {
  const exerciseDiv = createElement("div", {
    class: "col-6 col-md-4 col-lg-3 text-center pt-4",
  });
  const exerciseImgTag = createElement("a", {});
  const exerciseImg = createElement("img", {
    class: "img-fluid pb-2",
    src: url,
    alt: "Meal Image",
  });
  exerciseImgTag.append(exerciseImg);
  const exerciseName = createElement("a", {});
  $(exerciseName).text(name);
  $(exerciseImgTag)
    .add(exerciseName)
    .on("click", function () {
      replaceExerciseModal(
        mealName,
        mealImageURL,
        mealIngredients,
        mealMeasurements,
        mealInstructions
      );
      $("#exercise-modal").modal();
    });

  exerciseDiv.append(exerciseImgTag);
  exerciseDiv.append(exerciseName);
  $("#exercises").append(exerciseDiv);
}

export function sortDropdownClick() {
  $("#sort-filter .dropdown-item").click(function () {
    $(".dropdown-item").each(function () {
      $(this).removeClass("active");
    });
    addDropdownActive($(this));
  });
}

export function addDropdownActive(dropdownItem) {
  $(dropdownItem).addClass("active");
  $(dropdownItem).parent().prev().addClass("filter-applied");
}

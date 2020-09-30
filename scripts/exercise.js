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
        val.TrainingProgram,
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
        name,
        url,
        desc,
        main,
        secondary,
        equipment,
        program,
        instructions
      );
      $("#exercise-modal").modal();
    });

  exerciseDiv.append(exerciseImgTag);
  exerciseDiv.append(exerciseName);
  $("#exercises").append(exerciseDiv);
}

export function replaceExerciseModal(
  name,
  url,
  desc,
  main,
  secondary,
  equipment,
  program,
  instructions
) {
  $("#exercise-modal-title").text(name);
  $("#exercise-modal-image").attr("src", url);
  $("#exercise-modal-desc").text(desc);
  $("#exercise-modal-main").text(main.join(", "));
  if (secondary.length === 0) {
    secondary = "N/A";
  } else {
    secondary = secondary.join(", ");
  }
  $("#exercise-modal-secondary").text(secondary);
  $("#exercise-modal-equipment").text(equipment.join(", "));
  $("#exercise-modal-program").text(program.join(", "));
  $("#exercise-modal-instructions").empty();
  for (let i = 0; i < instructions.length; i++) {
    $("#exercise-modal-instructions").append(
      "<li>" + instructions[i] + "</li>"
    );
  }
}

export function sortDropdownClick() {
  $("#sort-filter .dropdown-item").click(function () {
    $("#sort-filter .dropdown-item").each(function () {
      $(this).removeClass("active disabled");
    });
    addDropdownActive($(this));
  });
}

export function addDropdownActive(dropdownItem) {
  $(dropdownItem).addClass("active disabled");
  $(dropdownItem).parent().prev().addClass("filter-applied");
}

export function muscleDropdownClick() {
  $("#muscle-filter .dropdown-item").click(function () {
    addDropdownActive($(this));
  });
}

export function programDropdownClick() {
  $("#program-filter .dropdown-item").click(function () {
    addDropdownActive($(this));
  });
}

export function filterClick() {
  $(".dropdown-menu .dropdown-item").click(function () {
    let filters = [];
    let muscles = [];
    let programs = [];
    const sort = $("#sort-filter .dropdown-item.active").val();
    $("#muscle-filter .dropdown-item.active").each(function () {
      muscles.push($(this).text());
    });
    $("#program-filter .dropdown-item.active").each(function () {
      programs.push($(this).text());
    });
    filters.push(sort, muscles, programs);
    applyFilters(filters);
  });
}

export function applyFilters(filters) {
  const sort = filters[0];
  const muscles = filters[1];
  const programs = filters[2];
  const exerciseJSONData = "exercises.json";

  $.getJSON(exerciseJSONData, {
    format: JSON,
  }).done(function (result) {
    console.log(result);
    let filteredArr = [];
    if (muscles.length === 0 && programs.length === 0) {
      filteredArr = result;
    } else if (muscles.length !== 0 && programs.length === 0) {
      $.each($(result), function (key, val) {
        if (muscles.some((item) => val.MainMuscleGroup.indexOf(item) >= 0)) {
          filteredArr.push(this);
        }
      });
    } else if (muscles.length === 0 && programs.length !== 0) {
      $.each($(result), function (key, val) {
        if (programs.some((item) => val.TrainingProgram.indexOf(item) >= 0)) {
          filteredArr.push(this);
        }
      });
    } else {
      $.each($(result), function (key, val) {
        if (
          muscles.some((item) => val.MainMuscleGroup.indexOf(item) >= 0) &&
          programs.some((item) => val.TrainingProgram.indexOf(item) >= 0)
        ) {
          filteredArr.push(this);
        }
      });
    }
    $("#number-of-exercises").text(filteredArr.length + " Exercises Found");
    $("#exercises").empty();
    console.log(filteredArr);

    /*
    $("#number-of-exercises").text(result.length + " Exercises Found");
    $.each(result, function (key, val) {
      createExerciseHTML(
        val.Name,
        val.ImageURL,
        val.Equipment,
        val.MainMuscleGroup,
        val.SecondaryMuscles,
        val.Description,
        val.TrainingProgram,
        val.Instructions
      );
    });
    */
  });
}

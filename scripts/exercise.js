import { createElement, shuffle } from "../scripts/general.js";

export function exercisePageReady() {
  $(document).ready(function () {
    const exercisesDiv = document.getElementById("exercises");

    if (exercisesDiv) {
      getExercises();
    }
  });
}

export function getExercises(filters) {
  const exerciseJSONData = "exercises.json";
  let sort;
  let muscles;
  let programs;

  /*
  if (filters) {
      let empty;
      for (let i = 0; i < filters.length; i++) {
          if (filters[i])
      }
    sort = filters[0];
    muscles = filters[1];
    programs = filters[2];
    }
    */

  $.getJSON(exerciseJSONData, {
    format: JSON,
  }).done(function (result) {
    let filteredArr = [];
    $.each($(result), function (key, val) {
      if (filters) {
        if (muscles.length !== 0 && programs.length === 0) {
          if (muscles.some((item) => val.MainMuscleGroup.indexOf(item) >= 0)) {
            filteredArr.push(this);
          }
        } else if (muscles.length === 0 && programs.length !== 0) {
          if (programs.some((item) => val.TrainingProgram.indexOf(item) >= 0)) {
            filteredArr.push(this);
          }
        } else {
          if (
            muscles.some((item) => val.MainMuscleGroup.indexOf(item) >= 0) &&
            programs.some((item) => val.TrainingProgram.indexOf(item) >= 0)
          ) {
            filteredArr.push(this);
          }
        }
      } else {
        filteredArr = result;
      }
    });

    if (sort) {
      if (sort === 1) {
        filteredArr.sort(alphabetically);
      } else {
        filteredArr.sort(alphabeticallyReverse);
      }
    } else {
      shuffle(filteredArr);
    }
    $("#number-of-exercises").text(filteredArr.length + " Exercises Found");
    $("#exercises").empty();
    createExerciseHTML(filteredArr);
  });
}

export function alphabetically(a, b) {
  if (a.Name < b.Name) {
    return -1;
  }
  if (a.Name > b.Name) {
    return 1;
  }
  return 0;
}

export function alphabeticallyReverse(a, b) {
  if (a.Name > b.Name) {
    return -1;
  }
  if (a.Name < b.Name) {
    return 1;
  }
  return 0;
}

export function createExerciseHTML(exercises) {
  $.each(exercises, function (key, val) {
    const currentExercise = this;
    const exerciseDiv = createElement("div", {
      class: "col-6 col-md-4 col-lg-3 text-center pt-4",
    });
    const exerciseImgTag = createElement("a", {});
    const exerciseImg = createElement("img", {
      class: "img-fluid pb-2",
      src: val.ImageURL,
      alt: "Meal Image",
    });
    exerciseImgTag.append(exerciseImg);
    const exerciseName = createElement("a", {});
    $(exerciseName).text(val.Name);
    $(exerciseImgTag)
      .add(exerciseName)
      .on("click", function () {
        $("#exercise-modal").modal();
        replaceExerciseModal(currentExercise);
      });

    exerciseDiv.append(exerciseImgTag);
    exerciseDiv.append(exerciseName);
    $("#exercises").append(exerciseDiv);
  });
}

export function replaceExerciseModal(exercise) {
  $("#exercise-modal-title").text(exercise.Name);
  $("#exercise-modal-image").attr("src", exercise.ImageURL);
  $("#exercise-modal-desc").text(exercise.Description);
  $("#exercise-modal-main").text(exercise.MainMuscleGroup.join(", "));
  let secondary;
  if (exercise.SecondaryMuscles.length === 0) {
    secondary = "N/A";
  } else {
    secondary = exercise.SecondaryMuscles.join(", ");
  }
  $("#exercise-modal-secondary").text(secondary);
  $("#exercise-modal-equipment").text(exercise.Equipment.join(", "));
  $("#exercise-modal-program").text(exercise.TrainingProgram.join(", "));
  $("#exercise-modal-instructions").empty();
  for (let i = 0; i < exercise.Instructions.length; i++) {
    $("#exercise-modal-instructions").append(
      "<li>" + exercise.Instructions[i] + "</li>"
    );
  }
}

export function sortDropdownClick() {
  $("#sort .dropdown-item").click(function () {
    $("#sort .dropdown-item").each(function () {
      $(this).removeClass("active disabled");
    });
    addDropdownActive($(this));
  });
}

export function addDropdownActive(dropdownItem) {
  if (dropdownItem.hasClass("active")) {
    $(dropdownItem).removeClass("active");
  } else {
    $(dropdownItem).addClass("active");
    $(dropdownItem).parent().prev().addClass("filter-applied");
  }
}

export function filterClick() {
  $(".filter .dropdown-item").click(function () {
    addDropdownActive($(this));
    checkIfActiveFilters();
  });
}

export function checkIfActiveFilters() {
  if ($(".filter .dropdown-item").hasClass("active")) {
    $("#clear-filters-col").removeClass("d-none");
    $("#clear-filters-col").addClass("d-flex");
  }
}

export function filterChange() {
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
    getExercises(filters);
  });
}

export function clearFilters() {
  $("#clear-filters-btn").click(function () {
    $(".dropdown-item.active").each(function () {
      $(this).removeClass("active disabled");
    });

    $("#exercise-filters button").each(function () {
      $(this).removeClass("filter-applied");
    });

    $("#clear-filters-col").removeClass("d-flex");
    $("#clear-filters-col").addClass("d-none");
    getExercises();
  });
}

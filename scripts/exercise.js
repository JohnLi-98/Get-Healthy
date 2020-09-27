export function exercisePageReady() {
  $(document).ready(function () {
    const exercisesDiv = document.getElementById("exercises");

    if (exercisesDiv) {
      getExercises();
    }
  });
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

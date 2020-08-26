import { createElement } from "../scripts/general.js";
/**
 * Function to run when the logout button is clicked. Runs createLogoutMessage() to display a div before running
 * logout.php through ajax. Upon success, show response then redirect to home page after 3 secs.
 */
export function logoutClick() {
  $("#logout-button").click(function () {
    createLogoutMessage();
    setTimeout(function () {
      $.ajax({
        url: "ajax/logout.php",
        success: function () {
          $("#loading-icon, #success-response").toggleClass("d-none");
          setTimeout(function () {
            window.location.replace(
              "http://unn-w16010421.newnumyspace.co.uk/Projects/Get-Healthy/index.php"
            );
          }, 3000);
        },
      });
    }, 2000);
  });
}

/**
 * Function to create the logout loader to display confirmation message to the DOM. Use's bootstrap classes for divs.
 */
export function createLogoutMessage() {
  const div = createElement("div", {
    class: "container-fluid h-100 w-100 form-submit",
    id: "loader",
  });
  const row = createElement("div", {
    class: "row h-100",
  });
  const col = createElement("div", {
    class:
      "col-9 col-md-7 col-lg-5 justify-content-center align-items-center h-75 text-dark d-flex flex-column m-auto",
  });
  const iconDiv = createElement("div", {
    class: "response text-center text-white",
    id: "loading-icon",
  });
  const icon = createElement("i", {
    class: "fas fa-spinner fa-pulse fa-4x",
  });
  const h2 = createElement("h2", {
    class: "pt-4",
  });
  h2.append("Logging Out");
  const responseDiv = createElement("div", {
    class: "response alert-success text-center py-5 d-none",
    id: "success-response",
  });
  const responseText = createElement("div", {
    class: "mt-4 mx-4",
  });
  const h2Response = createElement("h2", {});
  h2Response.append("Logged Out");
  const pResponse = createElement("p", {});
  pResponse.append("You have successfully logged out of your account.");
  document.body
    .appendChild(div)
    .appendChild(row)
    .appendChild(col)
    .append(iconDiv, responseDiv);
  iconDiv.append(icon, h2);
  responseDiv.appendChild(responseText).append(h2Response, pResponse);
}

$(document).ready(function () {
  // Hide error messages initially
  $(".error").hide();

  // Form submit event handler
  $("form").on("submit", function (event) {
    let isValid = true;
    let errorMessage = "";

    // Check if username is empty
    const username = $("#username").val().trim();
    if (username === "") {
      errorMessage += "Username is required. ";
      isValid = false;
    }

    // Check if password is empty
    const password = $("#password").val().trim();
    if (password === "") {
      errorMessage += "Password is required. ";
      isValid = false;
    }

    // Display error message if validation fails
    if (!isValid) {
      $(".error").text(errorMessage).show();
      event.preventDefault(); // Prevent form submission
    }
  });

  // Optional: Clear error message on input change
  $("input").on("input", function () {
    $(".error").hide();
  });
});

$(document).ready(function () {
  // Hide error messages initially
  $(".error").hide();

  // Validation function for each input
  function validateInput(input) {
    let errorMessage = "";
    let isValid = true;

    // Validate username
    if (input.attr("id") === "username") {
      const username = input.val().trim();
      if (username === "") {
        errorMessage = "Username is required.";
        isValid = false;
      }
    }

    // Validate email
    if (input.attr("id") === "email") {
      const email = input.val().trim();
      const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Simple regex for email validation
      if (email === "") {
        errorMessage = "Email is required.";
        isValid = false;
      } else if (!emailPattern.test(email)) {
        errorMessage = "Please enter a valid email address.";
        isValid = false;
      }
    }

    // Validate password
    if (input.attr("id") === "password") {
      const password = input.val().trim();
      if (password === "") {
        errorMessage = "Password is required.";
        isValid = false;
      }
    }

    // Display the error message if invalid
    if (!isValid) {
      input.next(".error-message").text(errorMessage).show();
    } else {
      input.next(".error-message").hide();
    }

    return isValid;
  }

  // Attach blur event listeners to each input field
  $("#username, #email, #password").blur(function () {
    validateInput($(this));
    console.log($(this));
  });

  // Prevent form submission if any input is invalid
  $("form").on("submit", function (event) {
    let formIsValid = true;

    // Validate all fields on submit
    $("#username, #email, #password").each(function () {
      if (!validateInput($(this))) {
        formIsValid = false;
      }
    });

    if (!formIsValid) {
      event.preventDefault(); // Prevent form submission if validation fails
    }
  });
});

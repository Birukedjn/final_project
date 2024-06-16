// Function to validate email format using a regular expression
function validateEmail(email) {
  // Regular expression pattern for basic email validation
  const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  return emailPattern.test(email);
}

// Function to validate the entire form
function validate() {
  var form = document.forms["mysignup"];
  var name = form["name"].value;
  var username = form["username"].value;
  var email = form["email"].value;
  var number = form["number"].value;
  var pass = form["password"].value;
  var confirmpass = form["cpassword"].value;



  // Length checks
  if (name.length > 30) {
    alert("Your full name is beyond the string limit!");
    return false;
  }
  if (name.length < 5) {
    alert("Your full name is below the string limit!");
    return false;
  }
  if (username.length > 10) {
    alert("Your username is beyond the string limit!");
    return false;
  }


  if (username.length < 4) {
    alert("Your username is below the string limit!");
    return false;
  }
  if (email.length > 30) {
    alert("Your email is beyond the string limit!");
    return false;
  }
  if (email.length < 11) {
    alert("Your email is below the string limit!");
    return false;
  }
  if (number.length != 10) {
    alert("Your phone number must be exactly 10 digits!");
    return false;
  }
  if (pass.length > 30) {
    alert("Your password is beyond the string limit!");
    return false;
  }
  if (pass.length < 6) {
    alert("Your password is below the string limit!");
    return false;
  }

  // Email validation
  if (!validateEmail(email)) {
    alert("Please enter a valid email address.");
    return false; // Prevent form submission
  }

  // Password match validation
  if (pass != confirmpass) {
    alert("Your passwords do not match, try again!");
    return false;
  }

  // If all validations pass
  return true;
}



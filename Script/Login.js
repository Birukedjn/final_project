function validate() {
  var name = document.forms["myform"]["name"].value;
  var pass = document.forms["myform"]["password"].value;

  if (name == "" || name == null) {
    alert("Username must be filled out");
    return false;
  }
  else if (pass == "" || pass === null) {
    alert("Password must be filled out");
    return false;
  }
  else if (name.length > 10) {
    alert("Your username is beyond the string limit!");
    return false;
  }
  else if (name.length < 4) {
    alert("Your username is below the string limit!");
    return false;
  }
  else if (pass.length > 8) {
    alert("You password is beyond the string limit!");
    return false;
  }
  else if (pass.length < 6) {
    alert("You password is below the string limit!");
    return false;
  }
  else {

    alert("Successfully Login");
    window.location.replace("./Index.html");

    return true;
    //To Redirect to home page.
    window.location.href="Index.html";
  }
}


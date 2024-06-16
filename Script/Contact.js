const mobileBtn = document.getElementById('mobile-form')
nav = document.querySelector('nav')
mobileBtnExit = document.getElementById('mobile-exit');

mobileBtn.addEventListener('click', () => {
  nav.classList.add('menu-btn');
})
mobileBtnExit.addEventListener('click', () => {
  nav.classList.remove('menu-btn');
})




const swiper = new Swiper('.swiper', {
  // Optional parameters
  autoplay: {
    delay: 4000,
    disableOnIntraction: false,
  },
  direction: 'horizontal',
  loop: true,

  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },


});


function validate() {
  var name = document.forms["myform"]["name"].value;
  var email = document.forms["myform"]["email"].value;
  var number = document.forms["myform"]["number"].value;
  var area = document.forms["myform"]["area"].value;

  if (name == "" || name == null) {
    alert("Full Name must be filled out");
    return false;
  }
  else if (email == "" || email === null) {
    alert("email must be filled out");
    return false;
  }
  else if (number == "" || number === null) {
    alert("Phone number must be filled out");
    return false;
  }
  else if (area == "" || area === null) {
    alert("Text area must be filled out");
    return false;
  }

  //About Full Name
  else if (name.length > 30) {
    alert("Your Full Name is beyond the string limit!");
    return false;
  }
  else if (name.length < 5) {
    alert("Your Full Name is below the string limit!");
    return false;
  }

  //About email
  else if (email.length > 30) {
    alert("Your email is beyond the string limit!");
    return false;
  }
  else if (email.length < 10) {
    alert("Your email is below the string limit!");
    return false;
  }

  //About phone number
  else if (number.length > 10) {
    alert("Your phone number is beyond the string limit!");
    return false;
  }
  else if (number.length < 10) {
    alert("Your phone number is below the string limit!");
    return false;
  }

  //About Text message
  else if (area.length > 1000) {
    alert("Your text message is beyond the string limit!");
    return false;
  }
  else if (area.length < 5) {
    alert("Your text messag is below the string limit!");
    return false;
  }

  else {
    alert("Successfully Submitted"); return true;
    //To Redirect to home page.
  }
}
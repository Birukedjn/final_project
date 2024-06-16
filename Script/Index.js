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
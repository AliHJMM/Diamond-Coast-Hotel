document.addEventListener('DOMContentLoaded', () => {
  const toggle = document.getElementById('darkModeToggle');
  const body = document.querySelector('body');
  const featuredRoomsSection = document.querySelector('.untree_co--site-section.float-left.pb-0.featured-rooms');
  const navbar = document.querySelector('.untree_co--site-nav');
  const alertMessage = document.getElementById('alertMessage');

  toggle.addEventListener('click', function() {
    this.classList.toggle('fa-moon');
    this.classList.toggle('fa-sun');

    if (this.classList.contains('fa-sun')) {
      // Light mode
      body.style.backgroundColor = 'white';
      body.style.color = '#3e3e42';
      if (featuredRoomsSection) {
        featuredRoomsSection.style.backgroundColor = 'white';
        featuredRoomsSection.style.color = '#3e3e42';
      }
      changeTextColor('#3e3e42');
      changeColorToBlack(); // Set specific elements to black
      setArrowIconsColor('black'); // Set arrow icons to black in light mode
      setSliderCounterTextColor('#3e3e42'); // Set slider-counter text to default in light mode
      if (alertMessage) {
        alertMessage.style.color = '#3e3e42'; // Set alertMessage text to default color in light mode
      }
    } else {
      // Dark mode
      body.style.backgroundColor = '#28283c';
      body.style.color = 'white';
      if (featuredRoomsSection) {
        featuredRoomsSection.style.backgroundColor = '#28283c';
        featuredRoomsSection.style.color = 'white';
      }
      changeTextColor('white');
      changeColorToWhite(); // Set specific elements to white in dark mode
      setArrowIconsColor('black'); // Set arrow icons to black in dark mode
      setSliderCounterTextColor('black'); // Set slider-counter text to black in dark mode
      if (alertMessage) {
        alertMessage.style.color = 'black'; // Set alertMessage text to black in dark mode
      }
    }
  });

  // Function to change the color of all p, h3 elements
  function changeTextColor(color) {
    document.querySelectorAll('p, h3').forEach(element => {
      element.style.color = color;
    });
  }

  // Function to change the color of all h4 and whiteTxt elements to black
  function changeColorToBlack() {
    document.querySelectorAll('h4, .whiteTxt').forEach(element => {
      element.style.color = 'black';
    });
  }

  // Function to change the color of all whiteTxt elements to white in dark mode
  function changeColorToWhite() {
    document.querySelectorAll('.whiteTxt').forEach(element => {
      element.style.color = 'white';
    });
  }

  // Function to set the arrow icons color
  function setArrowIconsColor(color) {
    document.querySelectorAll('.icon-keyboard_arrow_left, .icon-keyboard_arrow_right').forEach(icon => {
      icon.style.color = color;
    });
  }

  // Function to set the slider-counter text color
  function setSliderCounterTextColor(color) {
    document.querySelectorAll('.slider-counter.text-center').forEach(element => {
      element.style.color = color;
    });
  }

  // Change navbar link color on scroll
  window.addEventListener('scroll', () => {
    if (window.scrollY > 50) { // Adjust the scroll value as needed
      navbar.classList.add('navbar-scrolled');
    } else {
      navbar.classList.remove('navbar-scrolled');
    }
  });
});

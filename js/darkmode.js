document.getElementById('darkModeToggle').addEventListener('click', function() {
  var icon = document.getElementById('icon');
  if (icon.classList.contains('fa-moon')) {
      icon.classList.remove('fa-moon');
      icon.classList.add('fa-sun');
  } else {
      icon.classList.remove('fa-sun');
      icon.classList.add('fa-moon');
  }
});
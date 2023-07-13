function toggleNavList() {
    var navList = document.querySelector('.nav-list');
    var openMenu = document.querySelector('.openMenu');
    var menuIcon = openMenu.querySelector('i');
    
    navList.classList.toggle('open');
    openMenu.classList.toggle('open');
    
    // Change the menu button icon based on the menu visibility
    if (navList.classList.contains('open')) {
      menuIcon.classList.remove('fa-bars');
      menuIcon.classList.add('fa-times');
    } else {
      menuIcon.classList.remove('fa-times');
      menuIcon.classList.add('fa-bars');
    }
  }
  
  var menuIcon = document.getElementById('menuIcon');
  menuIcon.addEventListener('click', toggleNavList);
  
  // Hide the navigation list by default
  var navList = document.querySelector('.nav-list');
  navList.classList.remove('open');

/**
  Exit the current website and open a new tab containing a different website
  If enabled, provides the user with a quick escape route from the current website
*/
function exitSite() {
  // Open a new tab
  window.open("https://bbc.com/weather", "_newtab");
  // Replace current site with another benign site
  window.location.replace('http://google.co.uk');
}

function toggleNightMode(){
  jQuery('html').toggleClass('night');

  if(localStorage.getItem("nightMode") === 'on'){
    localStorage.setItem("nightMode", 'off');
  } else {
    localStorage.setItem("nightMode", 'on');
  }

}

jQuery(function() {

  // Handle toggle of main menu on small screens
  jQuery(".nav-mobile__toggle, .nav-mobile__mask").on("click", function() {
    jQuery(".nav-mobile__menu").toggle();
    jQuery(".nav-mobile__icon.fa-caret-down").toggleClass("fa-caret-up");
    jQuery(".nav-mobile__mask").fadeToggle("fast");
  })

  // Handle toggle of accessibility menu
  jQuery("body").on("keydown", function(e) {
    if(e.keyCode === 9){
      jQuery(".accessibility-links-wrapper").show();
    }
  })  

  // Handle exit site on button click
  jQuery(".exitSite").on("click", function() {
    exitSite();
  });

  // Detect if exit site is enabled and assign to const for checking against ESC press
  const exitSiteEnabled = jQuery('.exitSite').is(":visible");

  // Handle exit site on esc key press
  jQuery(document).keyup(function(e) {
    if(exitSiteEnabled){
      if (e.keyCode == 27) { // escape key
        exitSite();
      }
    }
  });

  // Handle toggle night mode
  jQuery(".toggleNightMode").on("click", function() {
    toggleNightMode();
  });

  // Check if night mode is enabled and if so, add the class to the html tag
  if(localStorage.getItem("nightMode") === 'on'){
    jQuery('html').addClass('night');
  }

  // Handle toggling of search bar
  jQuery(".toggleSearch, .closeSearch").on("click", function () {
    jQuery(".site-search").slideToggle("fast");
  })
});
function getAway() {
  // Get away right now
  window.open("http://weather.com", "_newtab");
  // Replace current site with another benign site
  window.location.replace('http://google.com');
}

jQuery(function($) {

  $("#get-away").on("click", function(e) {
    getAway();
  });

  $("#get-away a").on("click", function(e) {
    // allow the (?) link to work
    e.stopPropagation();
  });

  $(document).keyup(function(e) {
    if (e.keyCode == 27) { // escape key
      getAway();
    }
  });

});
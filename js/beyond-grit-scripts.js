jQuery(document).ready(function($){
  
  /*
   * Smooth scroll, courtesy of css-tricks.
   */
  $('a[href*=#]:not([href=#])').click(function() {
    // if ($(this).css("transform"));
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });

  /*
   * Super simple mobile navigation
   */
  $('.menu-toggle').on('click', function(e){
    $(this).toggleClass('display-menu');
    $('#primary-menu').slideToggle();
    if($(this).hasClass('display-menu')){
      $(this).html('Hide Menu');
    } else {
      $(this).html('Show Menu');
    }
  });

});
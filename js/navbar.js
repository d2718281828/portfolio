(function($){
  setupBurger = function(){
    $(".burger-button").click(function(ev){
      $(".navbar").toggle();
    });
  };
  setupTunnels = function(){
    var t1 = new buttonPseudo(".burger-button",".tunnelise");
    var t2 = new buttonPseudo(".navbar.not-mobile a",".tunnelise");
  };
  $(document).ready(function(ev){
    setupBurger();
    setupTunnels();
    //$("body").append("<div>width="+$(window).width()+"</div>");
  });
})(jQuery);

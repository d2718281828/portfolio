(function($){
  // this cant be done as a simple addclass/removeclass, as an item may need to remain highlighted due to other selections
  criteria = {};

  fliptag = function(clicked){
    var $but = $(clicked).closest("div.tagbutton");
    var tag = $but.data("tagged");
    // clear all
    if (!tag){
      console.log("Clearing everything");
      $(".highlighted").removeClass("highlighted");
      criteria = {};
      return;
    }
    // otherwise flip status as stored in criteria
    if (criteria.hasOwnProperty(tag)) criteria[tag] = !criteria[tag];
    else criteria[tag] = true;
    console.log("flipping "+tag,criteria);

    if (criteria[tag]) $but.addClass("highlighted");
    else $but.removeClass("highlighted");

    // now evaluate all the portfolio
    $(".portfolio").each(function(ix){
      var $item = $(this);
      var taglist = $item.data("taglist").split(" ");
      var wanted = true;
      var havesome = false;
      //console.log("evaluating item ",$item);
      for (var taggle in criteria){
        //console.log("-----"+taggle);
        if (criteria.hasOwnProperty(taggle) && criteria[taggle]){
          //console.log("-----checking for "+taggle+" in taglist",taglist,taglist.indexOf(taggle));
          if (taglist.indexOf(taggle)==-1) wanted = false;
          havesome = true;
        }
      }
      if (wanted && havesome) $item.addClass("highlighted");
      else $item.removeClass("highlighted");
    });
  };
  $(document).ready(function(ev){
    $(".tagbutton").click(function(ev){
      fliptag(ev.target);
    });
  });
})(jQuery);

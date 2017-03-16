// REQUIRES jQuery as $
/**
* @param string tunnelto is a jQuery selector for the tunnelling target that can identify multiples.
* @param string tunnelthrough is a jjQuery selector which identtifies things which need to be tunnelled through
* If you have a div which obscures another div and stops it being clicked on, then this helps. I encountered
* this when using parallax, the foreground items were overlapping something whcih was outside the parallax div.
* to use just create a new buttonPsuedo like so
* var t1 = new buttonPseudo(".burger-button",".tunnelise");
* where in this case we are going through tunnelise to get to the item(s) which match .burger-button
* It works by saving the co-ordinates of the tunnelto item(s) and every timme there is a click on a tunnelthrough item,
* it checks if the click is over the target and if so it passes the click too the target and stops propagation.
* If the target is a link then it will use window.location.href to effect it.
*/
function buttonPseudo(tunnelto,tunnelthrough) {
  var that=this;
  this.target = tunnelto;
  this.targets = [];  // list of actual target co-ordinates
  $(tunnelto).each(function(){
    that.addTarget(this);
  });
  this.empty = ((this.targets.length)==0);
  console.log("++++++++++++++tunnel setup to "+tunnelto+" through "+tunnelthrough,this.targets,this.empty);
  if (this.empty) return;
  $(tunnelthrough).click(function(ev){
    var prop = that.click(ev);
    // only fire this once
    ev.stopPropagation();
    return prop;
  });
};
buttonPseudo.prototype.addTarget = function(el){
  //console.log(">>>>adding ",el);
  var props = {};
  var $el = $(el);
  props.el = $el;
  var topleft = $el.position();
  //var topleft = $el.offset();
  props.x0 = topleft.left;
  props.y0 = topleft.top;
  var w = $el.width();
  var h = $el.height();
  //console.log("----------------size is",props);
  props.x1 = props.x0 + w;
  props.y1 = props.y0 + h;
  if (h>0 && w>0) this.targets.push(props);
  //console.log("After adding -----------------targets is ",this.targets);
};
// Simulate click() on a link object as javascript doesnt allow this.
buttonPseudo.prototype.clickLink = function($a){
  window.location.href = $a.attr('href');
};
buttonPseudo.prototype.click = function(ev){
  //console.log("Pseudo button "+this.target+" clicked");
  if (this.empty) return;
  var posX = ev.pageX;  // position on page
  var posY = ev.pageY;
  var pp;
  for (var k=0; k<this.targets.length; k++){
    pp = this.targets[k];
    if (posX>pp.x0 && posX<pp.x1 && posY>pp.y0 && posY<pp.y1){
      console.log("tunnelling through to give click event to ",pp.el);
      if (pp.el.prop("tagName")=="A") this.clickLink(pp.el);
      else pp.el.click();
      return false;
    }
  }
  return true;
};

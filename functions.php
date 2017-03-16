<?php
function topbar(){
  global $sitecontent;
  ?>
  <div class="mobile-header mobile-only">
    <button class="burger-button" title="Close"><svg><use xlink:href="#icon-options"></use></svg></button>
    <div class="mobile-header-title"><?php echo $sitecontent["title"]; ?></div>
  </div>
  <div class="navbar not-mobile">
    <?php echo navbar(); ?>
  </div>
  <?php
}


 ?>

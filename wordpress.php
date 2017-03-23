<?php
include("header2.php");
global $sitecontent;
$pix = "wordpress";
 ?>
 <div class="parallax">
   <div class="parallax__layer parallax__layer--back tunnelise">
     <div class="centreback">
       <!--<img src="./images/douglas_fir.jpeg">-->
     </div>
   </div>
   <div class="parallax__layer parallax__layer--base tunnelise">
     <?php // topbar(); ?>
     <div class="parabit maincontent tunnelise">
       <div class="page-title"><?php echo $sitecontent[$pix]["title"];?></div>
       <div class="page-subtitle"><?php echo $sitecontent[$pix]["subtitle"];?></div>
     </div>
     <?php foreach (["public","bespoke","hosting"] as $sect){ ?>
     <div class="parabit tunnelise">
       <div class="bitsubheading"><?php echo $sitecontent[$pix][$sect]["title"]; ?></div>
       <p><?php if (isset($sitecontent[$pix][$sect]["text"])) echo $sitecontent[$pix][$sect]["text"]; ?></p>
       <ul><li><?php echo implode("</li>\n<li>",$sitecontent[$pix][$sect]["list"]); ?></li></ul>
     </div>
     <?php } ?>
   </div>
 </div>

<?php
include("footer2.php");
 ?>

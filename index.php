<?php
include("content.php");
include("header2.php");
global $sitecontent;
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
       <div class="page-title"><?php echo $sitecontent["title"];?></div>
       <div class="page-subtitle"><?php echo $sitecontent["subtitle"];?></div>
       <div class="summary"><?php echo makelist("profile");?></div>
     </div>
     <div class="parabit tunnelise">
       <div class="bitheading">Skills</div>
       <?php echo makelist("skills"); echo instructions(); ?>
     </div>
     <div class="parabit tunnelise">
       <div class="bitheading">Portfolio</div>
       <?php foreach ($sitecontent["portfolio"] as $example) {
         if (!$example["private"]) echo portfolio($example);
       } ?>
     </div>
     <div class="parabit tunnelise">
       <div class="bitheading">Personal Projects</div>
       <?php foreach ($sitecontent["portfolio"] as $example) {
         if ($example["private"]) echo portfolio($example);
       } ?>
     </div>
   </div>
 </div>

<?php
include("footer2.php");
 ?>

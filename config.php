<?php

if ($_SERVER["REQUEST_URI"]=="derek.storkey.uk"){
  define("ENVIRONMENT","LIVE");
  define("BASE_URI","");
} else {
  define("ENVIRONMENT","DEV");
  define("BASE_URI","/website/index@t");
}

 ?>

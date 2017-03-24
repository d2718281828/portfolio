<?php

if ($_SERVER["SERVER_NAME"]=="derek.storkey.uk"){
  define("ENVIRONMENT","LIVE");
  define("BASE_URI","");
} else {
  define("ENVIRONMENT","DEV");
  define("BASE_URI","/website/index@t");
}

 ?>

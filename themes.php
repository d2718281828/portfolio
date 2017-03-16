<?php
$GLOBALS["themelist"] = [
  "def" => [
    "burgerbars"=>"#ffffaa",
  ],
  "original"=>[
    "burgerbars"=>"#ffaaaa",
  ],


];
$GLOBALS["theme"] = "def";
if (isset($_REQUEST["theme"])){
  $th = $_REQUEST["theme"];
  if (isset($themelist[$th])) {
    $GLOBALS["theme"] = $th;
  }
}
$GLOBALS["themeopts"] = $themelist[$GLOBALS["theme"]];

?>

<?php
$GLOBALS["themelist"] = [
  "rocket" => [
    "burgerbars"=>"#aaffff",
  ],
  "rocket_sunset" => [
    "burgerbars"=>"#e07000",
  ],
  "tree" => [
    "burgerbars"=>"#ffffaa",
  ],
  "original"=>[
    "burgerbars"=>"#ffaaaa",
  ],


];
$GLOBALS["theme"] = "rocket";
if (isset($_REQUEST["theme"])){
  $th = $_REQUEST["theme"];
  if (isset($themelist[$th])) {
    $GLOBALS["theme"] = $th;
  }
}
$GLOBALS["themeopts"] = $themelist[$GLOBALS["theme"]];

?>

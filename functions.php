<?php
if (!function_exists("topbar")){
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
}
if (!function_exists("navbar")){
function navbar(){
  global $sitecontent;
  echo "<ul>";
  foreach($sitecontent["navbar"] as $navlink){
    echo "<li>";
    if (isset($navlink["url"])) {
      //$url=BASE_URI.$navlink["url"];
      //echo "<a href='$url'>".$navlink["text"]."</a>";
      echo doLink($navlink["url"],$navlink["text"]);
    } else echo $navlink["text"];
    echo "</li>";
  }
  echo "</ul>";
}
}
if (!function_exists("simplebit")){
function simplebit($content){
  return '<div class="parabit content">'.$content.'</div>';
}
}
if (!function_exists("sub_bit")){
function sub_bit($content){
  return '<div class="content">'.$content.'</div>';
}
}
if (!function_exists("ziggurat")){
function ziggurat($content){
  $m = $content;
  for ($k=2; $k>=0; $k--){
    $z = $k/5;
    $scale = 1 - $z;
    //$m = '<div class="nested" style="transform: translateZ('.$z.'px) scale('.$scale.');">'.$m.'</div>';
    $m = '<div class="nested" style="transform: translateZ('.$z.'px);">'.$m.'</div>';
  }
  return '<div class="parabit content">'.$m.'</div>';
}
}
if (!function_exists("doLink")){
function doLink($url,$text){
  global $theme;
  $m = BASE_URI.$url."?theme=".$theme;
  $m = "<a href='$m'>".$text."</a>";
  return $m;
}
}
if (!function_exists("headerStuff")){
function headerStuff(){
}
}
if (!function_exists("doTag")){
function doTag($short,$long){
  $m = "<strong>".$long."</strong>";
  $m = '<div class="tagbutton" role="button" data-tagged="'.$short.'">'.$m.'</div>';
  return $m;
}
}
if (!function_exists("portfolio")){
function portfolio($example){
  $m = "<h3>".$example["title"]."</h3>";
  if (isset($example["url"])) {
    $m.="<p><a target='_blank' href='".$example["url"]."'>".$example["url"]."</a></p>";
  } else {
    $m.= "<p><em>".$example["nourl"]."</em></p>";
  }
  $m.= "<p>".$example["desc"]."</p>";
  $tags = ""; $data="";
  if (isset($example["tags"])) {
    for ($k=0; $k<count($example["tags"]); $k++) $tags.= " tagged-".$example["tags"][$k];
    $data = ' data-taglist="'.implode(" ",$example["tags"]).'"';
  }
  return '<div class="portfolio content'.$tags.'"'.$data.'>'.$m.'</div>';
}
}
if (!function_exists("instructions")){
function instructions(){
  $instructs = "<em>Click on skills to highlight the projects where they were used. Click ".doTag("","here")." to clear.</em>";
    return $instructs;
}
}
if (!function_exists("changed")){
function changed(){
  return "<em>NOTE: This site has changed since the last time I worked on it.</em>";
}
}
if (!function_exists("makelist")){
function makelist($att){
  global $sitecontent;
  if (!isset($sitecontent[$att])) return "";
  return '<ul class="'.$att.'"><li>'.implode("</li>\n<li>",$sitecontent[$att]).'</li></ul>';
}
}
if (!function_exists("svgdefs")){
function svgdefs($options=null){
  $burgerbars = ($options && isset($options["burgerbars"])) ? $options["burgerbars"] : "#ffffff";
  return <<<SVGSTUFF
  <svg class="icon-system" style="position: absolute; width: 0; height: 0; overflow: hidden;" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <defs>
    <symbol id="icon-user" viewBox="0 0 32 32">
    <title>user</title>
    <path d="M30.596 25.625c-.98-1.958-4.324-3.188-8.952-4.89-.534-.196-1.084-.398-1.644-.607v-3.212c.586-.496 1.838-1.795 1.986-3.912.302-.256.54-.697.678-1.283.222-.94.11-2.053-.553-2.715l.124-.31c.51-1.288 1.462-3.687 1.086-5.568C22.86.82 19.582 0 16.915 0c-2.068 0-4.58.52-5.372 1.948-.797.088-1.412.42-1.83.984-1.16 1.56-.318 4.336.133 5.827l.068.22c-.687.66-.803 1.79-.578 2.74.138.587.376 1.028.678 1.284.148 2.117 1.4 3.416 1.986 3.912v3.212c-.562.21-1.112.41-1.646.608-4.628 1.7-7.972 2.93-8.95 4.89C.015 28.4 0 31.215 0 31.332 0 31.7.3 32 .667 32h30.667c.368 0 .666-.3.666-.667 0-.118-.016-2.932-1.404-5.708"/>
    </symbol>
    <symbol id="icon-edit" viewBox="0 0 28 28">
    <title>edit</title>
    <path d="M13.875 18.5l1.813-1.813-2.375-2.375-1.813 1.813v0.875h1.5v1.5h0.875zM20.75 7.25c-0.141-0.141-0.375-0.125-0.516 0.016l-5.469 5.469c-0.141 0.141-0.156 0.375-0.016 0.516s0.375 0.125 0.516-0.016l5.469-5.469c0.141-0.141 0.156-0.375 0.016-0.516zM22 16.531v2.969c0 2.484-2.016 4.5-4.5 4.5h-13c-2.484 0-4.5-2.016-4.5-4.5v-13c0-2.484 2.016-4.5 4.5-4.5h13c0.625 0 1.25 0.125 1.828 0.391 0.141 0.063 0.25 0.203 0.281 0.359 0.031 0.172-0.016 0.328-0.141 0.453l-0.766 0.766c-0.141 0.141-0.328 0.187-0.5 0.125-0.234-0.063-0.469-0.094-0.703-0.094h-13c-1.375 0-2.5 1.125-2.5 2.5v13c0 1.375 1.125 2.5 2.5 2.5h13c1.375 0 2.5-1.125 2.5-2.5v-1.969c0-0.125 0.047-0.25 0.141-0.344l1-1c0.156-0.156 0.359-0.187 0.547-0.109s0.313 0.25 0.313 0.453zM20.5 5l4.5 4.5-10.5 10.5h-4.5v-4.5zM27.438 7.063l-1.437 1.437-4.5-4.5 1.437-1.437c0.578-0.578 1.547-0.578 2.125 0l2.375 2.375c0.578 0.578 0.578 1.547 0 2.125z"></path>
    </symbol>
    <symbol id="icon-logout" viewBox="0 0 512 450">
    <title>logout</title>
    <path d="M205.5.7c-51.8 4.5-98.6 25.5-135.4 60.8-34.7 33.2-56.9 74.3-66.2 122-.5 2.7-1.6 10.8-2.4 18-5.8 51.4 7.1 104.1 36.2 148.3 60 91.1 175.5 124.9 274.8 80.5 46.3-20.7 84.5-57.5 107.9-104.1 4-8 10.6-23.4 10.6-24.7 0-.3-8.2-.5-18.2-.5h-18.3l-2.4 5.6c-6.7 15.5-21.5 36.9-35.5 51.3-36.4 37.4-82.8 57.1-134.2 57.1-51.3 0-98.7-20.3-134-57.3-55.5-58-69-142.6-34.4-215.5 14.5-30.4 39.9-59.1 68.7-77.5 43.3-27.7 96.9-36.1 147-23.1 52 13.5 96.6 50.2 120.9 99.6l3.8 7.8h18.3c10.1 0 18.3-.2 18.3-.5 0-1.3-6.6-16.7-10.6-24.7-24.2-48.2-64.3-86-112.9-106.3C275.6 4.1 237.7-2.1 205.5.7z"/>
    <path d="M429 189.4V201l-114.7.2-114.8.3v47l114.7.3 114.7.2.3 12.5.3 12.5 12.5-7.5c6.9-4 24.4-14.3 39-22.8 14.6-8.6 27.3-16.1 28.4-16.9 1.7-1.3 1.2-1.8-6.5-6.2-8.1-4.7-15.7-9.1-53.7-31.5-9.5-5.6-17.9-10.4-18.7-10.7-1.3-.5-1.5 1.2-1.5 11z"/>
    </symbol>
    <symbol id="icon-cancel-circle" viewBox="0 0 32 32">
    <title>cancel-circle</title>
    <path d="M16 0c-8.837 0-16 7.163-16 16s7.163 16 16 16 16-7.163 16-16-7.163-16-16-16zM16 29c-7.18 0-13-5.82-13-13s5.82-13 13-13 13 5.82 13 13-5.82 13-13 13z"></path>
    <path class="path2" d="M21 8l-5 5-5-5-3 3 5 5-5 5 3 3 5-5 5 5 3-3-5-5 5-5z"></path>
    </symbol>
    <symbol id="icon-caret-down" viewBox="0 0 16 28">
    <title>caret-down</title>
    <path d="M16 11c0 0.266-0.109 0.516-0.297 0.703l-7 7c-0.187 0.187-0.438 0.297-0.703 0.297s-0.516-0.109-0.703-0.297l-7-7c-0.187-0.187-0.297-0.438-0.297-0.703 0-0.547 0.453-1 1-1h14c0.547 0 1 0.453 1 1z"></path>
    </symbol>
    <symbol id="icon-options" viewBox="0 0 35 35">
    <title>options</title>
    <path class="icon-options-border" style="fill: rgba(0,0,0,0); fill-opacity: 0%; stroke:$burgerbars; stroke-width:5" d="M0 0h35v35h-35v-35"></path>
    <path class="icon-options-int" style="fill:$burgerbars;" d="M6 6h23v5h-23v-5"></path>
    <path class="icon-options-int" style="fill:$burgerbars;" d="M6 14h23v5h-23v-5"></path>
    <path class="icon-options-int" style="fill:$burgerbars;" d="M6 22h23v5h-23v-5"></path>
    </symbol>
    </defs>
  </svg>
SVGSTUFF;
}
}
 ?>

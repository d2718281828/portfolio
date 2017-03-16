<?php
include("functions.php");
global $sitecontent;
include("themes.php");
global $theme,$themelist,$themeopts;
?>

<html>
<head>
  <title><?php echo $sitecontent["title"]." - ".$sitecontent["subtitle"] ; ?></title>
  <?php if (isset($sitecontent["public"]) && $sitecontent["public"]) { ?>
  <meta NAME="ROBOTS" CONTENT="INDEX, FOLLOW">
  <?php } else { ?>
  <meta NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
  <?php } ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="./css/navbar.css" >
  <link rel="stylesheet" type="text/css" href="./css/colours_<?php echo $theme; ?>.css" >
  <link rel="stylesheet" type="text/css" href="./css/layout.css" >
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="./js/tunnel.js"></script>
  <script src="./js/navbar.js"></script>
  <script src="./js/tagging.js"></script>
  <?php if (isset($sitecontent["description"])) { ?>
    <meta name="description" content="<?php echo $sitecontent["description"]; ?>">
  <?php } ?>
</head>
<body>
  <?php
  echo svgdefs($themeopts);
  ?>
  <div class="maincol">
    <?php topbar(); ?>

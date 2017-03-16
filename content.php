<?php
/*
TODO
move these functions to functions.php
add notes to each skill/portflio combination which appear when the skill is clicked.
*/
function doTag($short,$long){
  $m = "<strong>".$long."</strong>";
  $m = '<div class="tagbutton" data-tagged="'.$short.'">'.$m.'</div>';
  return $m;
}
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
function instructions(){
  $instructs = "<em>Click on skills to highlight the projects where they were used. Click ".doTag("","here")." to clear.</em>";
    return $instructs;
}
function changed(){
  return "<em>NOTE: This site has changed since the last time I worked on it.</em>";
}
function makelist($att){
  global $sitecontent;
  if (!isset($sitecontent[$att])) return "";
  return '<ul class="'.$att.'"><li>'.implode("</li>\n<li>",$sitecontent[$att]).'</li></ul>';
}
$base =
$GLOBALS["sitecontent"] = [
  "public"=>false,
  "title"=>"Derek Storkey",
  "subtitle" => "Web Developer, PHP and Wordpress, West Sussex",
  "metatags"=>[
    "web developer","West Sussex","PHP developer","Wordpress developer","Wordpress custom plugins",
    "Javascript developer",
  ],
  "description"=>"A web developer, fluent in PHP, MySQL, Javascript, jQuery, CSS and HTML",
  "profile"=>[
    "A web developer with 6 years experience, back end and some front end.",
    "Industry and commercial experience.",
    "M.A. in Mathematics from Cambridge University",
  ],
  "skills"=>[
    doTag("php","PHP")." developer with 6 years' experience.",
    doTag("wp","Wordpress")." developer with 6 years' experience, writing custom plugins and themes.",
    doTag("lumen","Lumen")." (a subset of Laravel) 6 months experience",
    doTag("js","Javascript")." and ".doTag("jq","jQuery")." - 6 years experience",
    doTag("mysql","MySQL")." 6 years experience, including table design, indexing and  statement optimisation",
    "Source control using ".doTag("git","Git")." and ".doTag("svn","Subversion"),
    doTag("aws","Amazon Web Service").": worked with AWS on a number of deployments. ",
    "Worked in ".doTag("agile","agile")." and ".doTag("wfall","waterfall")." project structures, familiar with ".doTag("jira","Jira"),
  ],
  "navbar" => [
    ["text"=>"Derek Storkey",
    ],
    ["text"=>"Home",
      "url"=> "/",
    ],
    ["text"=>"Wordpress",
      "url"=> "/wordpress.php",
    ],
    /*
    ["text"=>"Contact",
      "url"=> "/contact.php",
    ],
    */
    ["text"=>"Linkedin",
      "url"=> "https://www.linkedin.com/in/derekstorkey/",
    ],
  ],
  "wordpress" => [
    "title"=>"Wordpress Experience",
    "subtitle"=>"",
    "public"=>[
      "title"=> "Some Public plugins I have worked with",
      "text" => "Here are some amongst the many hundreds of Wordpress plugins I have worked with.",
      "list"=> [
        "WP3 Broadcast for sharing content across a number of 'replica' sites in a multi-site network",
        "Polylang for multiple language support",
        "Wishlist member (extended) for a paywall",
        "Wordpress REST v2 API which I extended to provide the functions of a 'headless CMS'",
        "Advanced Custom Fields",
      ],
    ],
    "bespoke"=>[
      "title"=> "A selection of bespoke plugins for specific clients",
      "list"=> [
        "A 'Most Read' plugin which used a very lightweight script on the page to count the page access,
        even when the page was cached. The counting server was separate from the WP server to separate out
        the server load. There was also a sampling option for very high volume systems.",
        "A WP Admin plugin designed to help administrators who were new to Wordpress to find where to change
        the different parts of the site. It could embed links on the front of the site to where in the back end
        these parts could be edited.",
      ],
    ],
    "hosting"=>[
      "title"=> "Wordpress hosting experience",
      "list"=> [
        "I looked after a multi-site network on <strong>WP Engine</strong>.",
        "I worked with WP hosted on <strong>Amazon Web Services</strong>, with multiple web servers running
        identical Wordpress systems, fronted by a load balancer, with a Amazon S3 as a CDN for media files,
        and a large Amazon RDS, with replication, for the data. I did not set this up, however.",
        "I worked on a number of Wordpress systems which were hosted by my employer.",
      ],
    ],

  ],
  "portfolio" => [
    [ "url" => "http://newscm.premierbet.com/en/",
      "desc" => "A multi-site, multi-themed, multi-lingual rollout, the challenge was to keep administration
      costs to a minimum, which was done using a Broadcast plugin, and custom themes to enable instant rollout
      of changes to multiple sites.</p><p>Wordpress themes provided different branding, e.g. for
      <a target='_blank' href='http://news.sba.co.ug/en/'>Uganda</a>,
      <a target='_blank' href='http://news.rsbet.com/en/'>Nigeria</a> and
      <a target='_blank' href='http://news.guineegames.com/en/'>Guinea</a>.",
      "title" => "Wordpress multisite",
      "tags"=>[
        "wp","php","git","jq","wfall","jira",
      ],
      "private"=>false,
    ],
    [ "nourl"=>"This site is not live at this time",
      "desc"=>"This site combines betting data feeds from several REST APIs with
      user managed content from Wordpress, used as a 'headless CMS'. ",
      "title"=>"Betting Portal",
      "tags"=>[
        "wp","php","git","lumen","js","jq","agile","jira",
      ],
      "private"=>false,
    ],
    [ "url" => "http://www.opticianonline.net/",
      "desc" => "I worked on many aspects of this site, including the subscription gating piece,
      which as based on the Wishlist Member plugin but with extensive customisation to integrate it with
      a corporate authorisations and entitlement system. ".changed(),
      "title" => "Subscription Gated site",
      "tags"=>[
        "wp","php","svn","aws","wfall",
      ],
      "private"=>false,
    ],
    [ "url" => "https://www.newscientist.com/",
      "desc" => "I worked on parts of this site in a contractor role, via my employer, looking at
      user authentication and entitlement, search and other specific tasks.",
      "title" => "Complex site",
      "tags"=>[
        "wp","php","git","jira",
      ],
      "private"=>false,
    ],
    [ "url" => "https://www.icis.com/",
      "desc" => "I built the original version of this site using Wordpress with custom post types,
      with a complex system of relationships between them,
      and comments which can include media items. ".changed(),
      "title" => "A compliance site",
      "tags"=>[
        "wp","php","svn","aws","wfall",
      ],
      "private"=>false,
    ],
    [ "url" => "http://www.midhurst-maths.co.uk",
      "desc" => "A site for a maths tutor (me). I wanted to show not just the tutoring basics (prices, contact etc),
      but also some maths content. I had to develop a way of showing mathematical formulae.</p>
      <p>Students can log in and see notes from their classes, and their homework assignments.</p>
      <p>The site content is all stored in a database for flexibility.",
      "title" => "Maths Tutor",
      "tags"=>[
        "php",
      ],
      "private"=>true,
    ],
    [ "url" => "/",
      "desc" => "Although very small, on this site I wanted to experiment with some presentation features,
      such as the parallax effect, but also show the relationship between different types of information
      presented on the site - the skills and the portfolio sections, which I did with a jQuery tagging system.",
      "title" => "This site",
      "tags"=>[
        "php","js","jq",
      ],
      "private"=>true,
    ],

  ],
];


function navbar(){
  global $sitecontent;
  $baseurl = "/website/index@t";
  // $baseurl = "";
  echo "<ul>";
  foreach($sitecontent["navbar"] as $navlink){
    echo "<li>";
    if (isset($navlink["url"])) {
      $url=$baseurl.$navlink["url"];
      echo "<a href='$url'>".$navlink["text"]."</a>";
    } else echo $navlink["text"];
    echo "</li>";
  }
  echo "</ul>";
}
function simplebit($content){
  return '<div class="parabit content">'.$content.'</div>';
}
function sub_bit($content){
  return '<div class="content">'.$content.'</div>';
}
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


?>

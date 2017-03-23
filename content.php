<?php
/*
TODO
add notes to each skill/portflio combination which appear when the skill is clicked.
*/
//$base =
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
      "title"=> "A selection of bespoke plugins and themes for specific clients",
      "list"=> [
        "Customised child themes with branding functions which swapped featured images on each post to fit the branding
        of the site that the post was being broadcast to",
        "I worked with a plugin for <strong>user data capturing</strong>, which allowed WP administrators to
        create custom registration forms for each promotion or competition, to collect the user data that they
        needed",
        "I worked with a plugin for <strong>user authentication</strong> which used OAuth to validate the user
        on another server",
        "A plugin for <strong>Google Web analytics tagging</strong> which complied with a complex corporate
        reporting structure of about 20 fields, taking some tags from editorial input and building others in
        a standard way",
        "A <strong>Most Read</strong> plugin which used a very lightweight script on the page to count the page access,
        even when the page was cached. The counting server was separate from the WP server to separate out
        the server load. There was also a sampling option for very high volume systems.",
        "A <strong>WP Administrator's</strong> plugin designed to help administrators who were new to Wordpress to find where to change
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





?>

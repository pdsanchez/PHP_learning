<?php
# DYNAMIC SITE
# --------------------
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Vars
include_once("class/PageData.class.php");
$pagedata = new PageData();
//$pagedata = new StdClass();
$pagedata->title = "titulo";
$pagedata->css = "<link href=\"css/layout.css\" rel=\"stylesheet\">";
$pagedata->content = include_once("view/navigation.php");

$nav_set = isset($_GET["page"]);
if($nav_set) {
  $filetoload = $_GET["page"];
}
else {
  $filetoload = "skills"; // default
}
$pagedata->content .= include_once("view/$filetoload.php");

// dynamic style
$pagedata->embeddedStyle = 
  "<style>
    nav a[href *= '?page=$filetoload'] {
      padding: 3px;
      background-color: white;
      border-top-left-radius: 3px;
      border-top-right-radius: 3px;
    }
  </style>";

$page = include_once("tmpl/page.php");

echo $page;
?>
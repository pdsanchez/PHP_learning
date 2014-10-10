<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include_once("class/PageData.class.php");
$pagedata = new PageData();
$pagedata->title = "Gallery";
$pagedata->addCss("css/layout.css");
$pagedata->addCss("css/nav.css");
$pagedata->addScript("js/lightbox.js");
$pagedata->content = include_once("view/navigation.php");

$userClicked = isset($_GET["page"]);
if ($userClicked) {
  $filetoload = $_GET["page"];
}
else {
  $filetoload = "gallery";
}

$pagedata->content .= include_once("view/$filetoload.php");

$page = include_once("tmpl/page.php");

echo $page;
?>
<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include_once("model/PageData.class.php");
$pagedata = new PageData();
$pagedata->title = "blog";
$pagedata->addCss("css/blog.css");

$dbinfo = "mysql:host=localhost;dbname=simple_blog";
$dbuser = "user";
$dbpwd = "";

$db = new PDO($dbinfo, $dbuser, $dbpwd);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$pageRequested = isset($_GET["page"]);
$controller = "blog";
if ($pageRequested) {
  if($_GET["page"] === "search") {
    $controller = "search";
  }
}

$pagedata->content .= include_once("view/search-form-html.php");
$pagedata->content .= include_once("controller/$controller.php");

$page = include_once("view/page.php");
echo $page;
?>
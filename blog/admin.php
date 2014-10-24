<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include_once("model/PageData.class.php");
$pagedata = new PageData();
$pagedata->title = "Blog";
$pagedata->addCss("css/blog.css");
$pagedata->content = include_once("view/admin/admin-navigation.php");

$dbinfo = "mysql:host=localhost;dbname=simple_blog";
$dbuser = "user";
$dbpwd = "";
$db = new PDO($dbinfo, $dbuser, $dbpwd);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$navClicked = isset($_GET["page"]);
if ($navClicked) {
  $ctl = $_GET["page"];
}
else {
  $ctl = "entries";
}
$pagedata->content .= include_once("controller/admin/$ctl.php");


$page = include_once("view/page.php");
echo $page;
?>
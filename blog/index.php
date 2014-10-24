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

$pagedata->content .= include_once("controller/blog.php");

$page = include_once("view/page.php");
echo $page;
?>
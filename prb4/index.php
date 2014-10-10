<?php
// FRONT CONTROLLER

error_reporting(E_ALL);
ini_set("display_errors", 1);

// load model
include_once("model/PageData.class.php");
$pagedata = new PageData();
$pagedata->title = "MVC poll";
//$pagedata->content .= "<h1>everything is ok</h1>";

// database
$dbinf = "mysql:host=localhost;dbname=playground";
$dbuser = "user";
$dbpwd = "";
try {
  $db = new PDO($dbinf, $dbuser, $dbpwd);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pagedata->content = "---> conected";
}
catch (Exception $e) {
  $pagedata->content = "FAILED!!!!! <p>$e</p>";
}


// load poll controller
$pagedata->content .= include_once("controller/poll.php");

// load view
$page = include_once("view/page.php");
echo $page;
?>
<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include_once("class/PageData.class.php");
$pagedata = new PageData();
$pagedata->title = "forms";
$pagedata->content = include_once("view/navigation.php");

$valset = isset($_GET["page"]);
if ($valset) {
  $vfile = $_GET["page"];
}
else {
  $vfile = "search";
}
$pagedata->content .= include_once("view/$vfile.php");

$pagedata->embeddedStyle =
"<style>
form[action='index.php?page=quiz'] {
  position: relative;
  margin: 30px 10px;
}
form[action='index.php?page=quiz'] p,
form[action='index.php?page=quiz'] select {
  display: inline-block;
}
</style>";

$page = include_once("tmpl/page.php");
echo $page;
?>
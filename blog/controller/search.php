<?php
include_once("model/BlogEntryTable.class.php");
$blogTable = new BlogEntryTable($db);

$searchOut = "";
if (isset($_POST["search-term"])) {
  $searchTerm = $_POST["search-term"];
  $searchData = $blogTable->searchEntry($searchTerm);
  $searchOut = include_once("view/search-results-html.php");
}

return $searchOut;
?>
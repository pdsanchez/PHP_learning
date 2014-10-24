<?php
  include_once("model/BlogEntryTable.class.php");
  $entryTable = new BlogEntryTable($db);
  
  $isEntryClicked = isset($_GET["id"]);
  if ($isEntryClicked) {
    $entryId = $_GET["id"];
    $entryData = $entryTable->getEntry($entryId);
    
    $blogOut = include_once("view/entry-html.php");
  }
  else {
    $entries = $entryTable->getAllEntries();
    
    //$oneEntry = $entries->fetchObject();
    //$test = print_r($oneEntry, true);
    //return "<pre>$test</pre>";
    
    $blogOut = include_once("view/list-entries-html.php");
  }
  
  return $blogOut;
?>
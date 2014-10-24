<?php
  include_once("model/BlogEntryTable.class.php");
  $entrytable = new BlogEntryTable($db);
  
  $editorSubmitted = isset($_POST["action"]);
  if ($editorSubmitted) {
    $btnClicked = $_POST["action"];
    $insertNewEntry = ($btnClicked === 'save');
    
    if ($insertNewEntry) {
      $title = $_POST["title"];
      $entry = $_POST["entry"];
      $entrytable->saveEntry($title, $entry);
    }
  }
  
  return include_once("view/admin/editor-html.php");
?>
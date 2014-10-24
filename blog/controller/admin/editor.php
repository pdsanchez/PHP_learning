<?php
  include_once("model/BlogEntryTable.class.php");
  $entryTable = new BlogEntryTable($db);
  
  $editorSubmitted = isset($_POST["action"]);
  if ($editorSubmitted) {
    $btnClicked = $_POST["action"];
    
    $id = $_POST["id"];
    $title = $_POST["title"];
    $entry = $_POST["entry"];
    
    $save = ($btnClicked === 'save');
    $insertNewEntry = ($save && $id === '0');
    $deleteEntry = ($btnClicked === 'delete');
    $updateEntry = ($save && $insertNewEntry === false);
    
    
    if ($insertNewEntry) {
      $savedId = $entryTable->saveEntry($title, $entry);
    }
    else if ($updateEntry) {
      $entryTable->updateEntry($id, $title, $entry);
      $savedId = $id;
    }
    else if ($deleteEntry) {
      $entryTable->deleteEntry($id);
    }
  }
  
  $entryRequested = isset($_GET["id"]);
  if ($entryRequested) {
    $id = $_GET["id"];
    $entryData = $entryTable->getEntry($id);
    $entryData->entry_id = $id;
    $entryData->message = "";
  }
  
  $entrySaved = isset($savedId);
  if ($entrySaved) {
    $entryData = $entryTable->getEntry($savedId);
    $entryData->message = "Entry was saved";
  }
  
  return include_once("view/admin/editor-html.php");
?>
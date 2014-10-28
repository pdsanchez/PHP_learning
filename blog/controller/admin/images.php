<?php
include_once("model/Uploader.class.php");

$imgSubmitted = isset($_POST['new-img']);
if ($imgSubmitted) {
  $uploader = new Uploader('img-data');
  try {
    $uploader->saveIn("img");
    $uploaderMsg = "file uploaded";
  }
  catch (Exception $e) {
    $uploaderMsg = $e->getMessage();
  }
  
  //$testOut = "<pre>";
  //$testOut .= print_r($_FILES, true);
  //$testOut .= "</pre>";
  //return $testOut;
}

$deleteImg = isset($_GET["delete-img"]);
if ($deleteImg) {
  $whichImg = $_GET["delete-img"];
  unlink($whichImg);
}

$imgMgrHTML = include_once("view/admin/images-html.php");
return $imgMgrHTML;
?>
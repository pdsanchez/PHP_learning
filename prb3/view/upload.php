<?php
$imgSubmitted = isset($_POST["new-img"]);
if ($imgSubmitted) {
  $out = upload();
}
else {
  $out = include_once("view/upload-form.php");
}

return $out;

function upload() {
  include_once("class/Uploader.class.php");
  $upd = new Uploader("img-data");
  $isok = $upd->saveIn("img");
  
  if ($isok) {
    $o = "New file uploaded";
  }
  else {
    $o = "Somethig went wrong";
    $o .= "<pre>";
    $o .= print_r($_FILES, true);
    $o .= "</pre>";
  }
  return $o;
}
?>
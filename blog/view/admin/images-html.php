<?php
if (isset($uploaderMsg) === false) {
  $uploaderMsg = "Upload a new Image";
}

$imgAsHTML = "<h1>Images</h1>";
$imgAsHTML .= "<dl id='images'>";
$folder = "img";
$filesInFolder = new DirectoryIterator($folder);
while($filesInFolder->valid()) {
  $file = $filesInFolder->current();
  $filename = $file->getFileName();
  $src = "$folder/$filename";
  $fileInfo = new Finfo(FILEINFO_MIME_TYPE);
  $mimeType = $fileInfo->file($src);
  if($mimeType === 'image/jpeg') {
    $href = "admin.php?page=images&delete-img=$src";
    $imgAsHTML .= "<dt><img src='$src'></dt></dd>Source: $src <a href='$href'>delete</a></dd>";
  }
  $filesInFolder->next();
  $imgAsHTML .= "</dl>";
}

return "
  <form method='post' action='admin.php?page=images' enctype='multipart/form-data'>
    <p>$uploaderMsg</p>
    <input type='file' name='img-data' accept='image/jpeg'>
    <input type='submit' name='new-img' value='upload'>
  </form>
  <div>$imgAsHTML</div>";
?>
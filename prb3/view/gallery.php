<?php
return showImages();

function showImages() {
  $out = "<h1>Img Gallery</h1>";
  $out .= "<ul id =\"images\">";
  $folder = "img";
  $files = new DirectoryIterator($folder);
  while ($files->valid()) {
    $file = $files->current();
    $filename = $files->getFilename();
    $src = "$folder/$filename";
    $fileinf = new Finfo(FILEINFO_MIME_TYPE);
    $mime = $fileinf->file($src);
    if ($mime === "image/jpeg") {
      $out .= "<li><img src=\"$src\"></li>";
    }
    $files->next();
  }
  $out .= "</ul>";
  return $out;
}
?>
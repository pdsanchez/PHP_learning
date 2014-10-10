<?php
return
  "<h1>Upload img</h1>
  <form action=\"index.php?page=upload\" method=\"post\" enctype=\"multipart/form-data\">
    <label>Find a jpg image to upload</label>
    <input type=\"file\" name=\"img-data\" accept=\"image/jpeg\">
    <input type=\"submit\" value=\"upload\" name=\"new-img\">
  </form>";
?>
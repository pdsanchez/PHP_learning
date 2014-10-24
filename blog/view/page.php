<?php
return
  "<!DOCTYPE html>
  <html>
    <head>
      <meta charset=\"utf-8\">
      <title>$pagedata->title</title>
      $pagedata->css
      $pagedata->embeddedStyle
    </head>
    <body>
      $pagedata->content
      $pagedata->scriptElements
    </body>
  </html>";
?>
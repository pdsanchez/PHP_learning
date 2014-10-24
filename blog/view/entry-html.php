<?php
  $entryDataFound = isset($entryData);
  if ($entryDataFound === false) {
    trigger_error("view/entry-html.php needs $entryData object");
  }
  
  return "<article>
            <h1>$entryData->title</h1>
            <div class='date'>$entryData->date_created</div>
            $entryData->entry_text
          </article>";
?>
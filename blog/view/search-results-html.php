<?php
$searchDataFound = isset($searchData);
if ($searchDataFound === false) {
  trigger_error('view/search-results-html.php needs $searchData');
}

$searchHTML = "<section id='search'>
                <p>You searched for <em>$searchTerm</em></p>
                <ul>";

while ($searchRow = $searchData->fetchObject()) {
  $href = "index.php?page=blog&amp;id=$searchRow->entry_id";
  $searchHTML .= "<li><a href='$href'>$searchRow->title</li>";
}

$searchHTML .= "</ul></section>";

return $searchHTML;
?>
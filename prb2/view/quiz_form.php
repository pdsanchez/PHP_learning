<?php
return
  "<form method=\"post\" action=\"index.php?page=quiz\">
    <p>Is it fun to learn PHP?</p>
    <select name=\"answer\">
      <option value=\"yes\">Yes</option>
      <option value=\"no\">No</option>
    </select>
    <input type=\"submit\" value=\"post\" name=\"quiz-submitted\">
  </form>";
?>
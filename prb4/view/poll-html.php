<?php
$datafound = isset($polldata);
if(!$datafound) {
  trigger_error('view/poll-html.php needs $polldata object');
}

return "
<aside id='poll'>
  <form method='post' action='index.php'>
    <p>$polldata->poll_question</p>
    <select name='user-input'>
      <option value='yes'>Yes, it is!</option>
      <option value='no'>No, not really!</option>
    </select>
    <input type='submit' value='post'>
  </form>
  
  <h1>poll results</h1>
  <ul>
    <li>$polldata->yes said yes</li>
    <li>$polldata->no said no</li>
  </ul>
</aside>
";
?>
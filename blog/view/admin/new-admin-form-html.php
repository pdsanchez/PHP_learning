<?php
if (isset($adminFormMsg) === false) {
  $adminFormMsg = "";
}

return "
  <form method='post' action='admin.php?page=users'>
    <fieldset>
      <legend>Create new admin user</legend>
      <label>email</label>
      <input type='text' name='email' required>
      <label>password</label>
      <input type='password' name='pwd' required>
      <input type='submit' value='create user' name='new-admin'>
    </fieldset>
    <p id='admin-form-msg'>$adminFormMsg</p>
  </form>";
?>
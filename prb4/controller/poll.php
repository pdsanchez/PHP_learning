<?php
include_once("model/Poll.class.php");
$poll = new Poll($db);
$ispollsubmitted = isset($_POST['user-input']);
if ($ispollsubmitted) {
  $input = $_POST['user-input'];
  $poll->updatePoll($input);
}
$polldata = $poll->getPollData();
$pollview = include_once("view/poll-html.php");
return $pollview;
?>
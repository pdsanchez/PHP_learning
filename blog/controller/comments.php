<?php
include_once("model/CommentTable.class.php");
$commentTable = new CommentTable($db);

$newCommentSubmitted = isset($_POST["new-comment"]);
if ($newCommentSubmitted) {
  $whichEntry = $_POST["entry-id"];
  $user = $_POST["user-name"];
  $comment = $_POST["new-comment"];
  $commentTable->saveComment($whichEntry, $user, $comment);
}

$comments = include_once("view/comment-form-html.php");

$allComments = $commentTable->getAllById($entryId);
$comments .= include_once("view/comment-html.php");

return $comments;
?>
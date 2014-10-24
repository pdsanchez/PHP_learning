<?php
$commentsFound = isset($allComments);
if ($commentsFound === false) {
  trigger_error('view/comment-html.php needs $allComments');
}

$allCommentsHTML = "<ul id='comments'>";
while ($commentData = $allComments->fetchObject()) {
  $allCommentsHTML .= "<li>$commentData->author wrote:";
  $allCommentsHTML .= "<p>$commentData->txt</p>";
  $allCommentsHTML .= "</li>";
}
$allCommentsHTML .= "</ul>";
return $allCommentsHTML;
?>
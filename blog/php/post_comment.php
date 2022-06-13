<?php
require('db_comments.php');
require('../../vendor/autoload.php');
require('pusher_config.php');

// function console_log($output) {
// 	$js_code = json_encode($output);
// 	echo "<script> console.log(" . $js_code . ");</script>";
// }

$ajax = ($_SERVER[ 'HTTP_X_REQUESTED_WITH' ] === 'XMLHttpRequest');

$db = new CommentsDB(); // if this is the persistence it is the old method. if it is CommentsDB then it is the new method (with the db)
$added = $db->add_comment($_POST);

if($added) {
  error_log("in post_comment.php, comment was added succesfully");
  error_log(json_encode($added));
  $channel_name = 'comments-1'; // TODO fix this so that it is comments-[comment_post_id] so it can be used for multiple posts
  $event_name = 'new_comment';
  $pusher = new Pusher\Pusher(APP_KEY, APP_SECRET, APP_ID, array('cluster' => APP_CLUSTER));
  $pusher->trigger($channel_name, $event_name, $added, array('socket_id' => $_POST['socket_id']));
}

sendAjaxResponse($added);


function sendAjaxResponse($added) {
  if($added) {
    header( 'Status: 201' );
    echo( json_encode($added) );
  }
  else {
    header( 'Status: 400' );
  }
}

?>

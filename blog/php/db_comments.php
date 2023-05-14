<?php
date_default_timezone_set('UTC');

class CommentsDB {
  private $db = null;

  function __construct() {
    session_start();

    // if the session is the blog comments session then connect to the database

      error_log("connecting to db ");

      $dbhost = 'localhost';
      $dbuser = 'gusdstevens';
      $dbpass = 'web';
      $dbname = 'blog';

      $this->db = new mysqli($dbhost,$dbuser, $dbpass,$dbname);


      if ($this->db->connect_errno) {
              error_log("Failed to connect to MySQL: (" . $db->connect_erno . ")" . $db->connect_error, 3, "/var/log/nginx/error.log");
      }
      error_log("conneted to db ");
  }

  /**
   * Get all comments for the given post.
   * this will NOT include the replies
   */
  function get_comments($comment_post_id) {

    error_log("getting comments ");

    $tz = $_COOKIE["tz"]; // get the timezone from the clients cookies which is saved as "tz" then use it to convert the timestamp from the db using convert_tz
    error_log($tz);

    $sql = "SELECT post_id, comment_id, parent_comment_id, email, author, comment_text, DATE_FORMAT(convert_tz(date, 'Etc/UTC', ?), '%W %M %Y') as date, DATE_FORMAT(convert_tz(date, 'Etc/UTC', ?), '%l:%i %p') as time FROM comments WHERE post_id=? AND reply=0"; // SQL with parameters
    $stmt = $this->db->prepare($sql);
    $stmt->bind_param("ssi", $tz,$tz,$comment_post_id);
    $stmt->execute();
    $result = $stmt->get_result(); // get the mysqli result
    $comments = mysqli_fetch_all($result, MYSQLI_ASSOC); // this fetches all o fthe data in an array of arrays where the inner array is a row that is the db column_name:value json_encode will return a dictionary

    return $comments;
  }

  /**
   * this will get the comment replies ONLY
   */
  function get_replies($comment_post_id) {

    error_log("getting comments ");

    $tz = $_COOKIE["tz"]; // get the timezone from the clients cookies which is saved as "tz" then use it to convert the timestamp from the db using convert_tz
    error_log($tz);

    $sql = "SELECT post_id, comment_id, parent_comment_id, email, author, comment_text, DATE_FORMAT(convert_tz(date, 'Etc/UTC', ?), '%W %M %Y') as date, DATE_FORMAT(convert_tz(date, 'Etc/UTC', ?), '%l:%i %p') as time FROM comments WHERE post_id=? AND reply=1"; // SQL with parameters
    $stmt = $this->db->prepare($sql);
    $stmt->bind_param("ssi", $tz,$tz,$comment_post_id);
    $stmt->execute();
    $result = $stmt->get_result(); // get the mysqli result
    $comments = mysqli_fetch_all($result, MYSQLI_ASSOC); // this fetches all o fthe data in an array of arrays where the inner array is a row that is the db column_name:value json_encode will return a dictionary

    return $comments;
  }

/**
 * this may be a waste because I get the comment right after I insert it.. i'm not sure if this is best practice or not
 */
function get_exact_comment($comment_id) {

  error_log("getting single comment ");

  $tz = $_COOKIE["tz"]; // get the timezone from the clients cookies which is saved as "tz" then use it to convert the timestamp from the db using convert_tz
  error_log($tz);

  $sql = "SELECT post_id, comment_id, parent_comment_id, email, author, comment_text, DATE_FORMAT(convert_tz(date, 'Etc/UTC', ?), '%W %M %Y') as date, DATE_FORMAT(convert_tz(date, 'Etc/UTC', ?), '%l:%i %p') as time FROM comments WHERE comment_id=?"; // SQL with parameters
  $stmt = $this->db->prepare($sql);
  $stmt->bind_param("ssi", $tz,$tz,$comment_id);
  $stmt->execute();
  $result = $stmt->get_result(); // get the mysqli result
  $comments = $result->fetch_assoc(); // this fetches all o fthe data in an array of arrays where the inner array is a row that is the db column_name:value json_encode will return a dictionary

  error_log("returning single comment");
  return $comments;
}

  /**
   * Get all comments.
   */
  function get_all_comments() {
    $comments = array();

    $sql = "SELECT comment_text FROM comments"; // SQL with parameters
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result(); // get the mysqli result
    $comments = $result->fetch_assoc(); // fetch data

    return $comments;
  }

  /**
   * Store the comment.
   */
  function add_comment($vars) {

    error_log("adding comment");
    $added = false;

    $comment_post_id = $vars['comment_post_id'];

    $email = $vars['email'];
    $author = $vars['author'];
    $comment = $vars['comment'];
    $parent_comment_id=$vars['parent_comment_id'];

    // if the comment post has a parent comment id greater than 0 this means it is a reply. Must then set reply variable to 1 else it is 0.
    if ($parent_comment_id > 0) {
      $reply = 1;
    } else {
      $reply = 0;
    }

    // need to validate the input. if it is true then can proceed to input it to db
    $valid_input = $this->validate_input($email, $author, $comment, $comment_post_id);
    if ($valid_input != false) { //if the input is valid then continue
      $sql = "INSERT INTO comments (post_id, reply, parent_comment_id, email, author, comment_text) VALUES (?, ?, ?, ?, ?, ?)";
      $stmt = $this->db->prepare($sql);
      $stmt->bind_param("iiisss", $valid_input['comment_post_id'], $reply, $parent_comment_id, $valid_input['email'], $valid_input['author'], $valid_input['comment']);
      // $stmt->bind_param("iiisss", $input['comment_post_id'], $reply, $parent_comment_id, $input['email'], $input['author'], $input['comment']); // this is with the validated inputs from the input array

      if ( $stmt->execute() ) {
        // this means the query executed so get the last inserted id
        error_log("sql executed succesfully");
        $last_id = mysqli_insert_id($this->db);
        error_log("last inserted comment id: ");
        error_log($last_id);
        return $this->get_exact_comment($last_id); // after I get the last comment id that was just inserted select it from the db and return it to the client
      }
      return false;
    } else {
      return false;
    }

  }

  // this is bad and I should 100% remove it later
  function delete_all() {

    $sql = "TRUNCATE TABLE comments";
    $stmt = $this->db->prepare($sql);
    $stmt->execute;
  }

  private function check_string($variable) {
    error_log("doing the string sanitization");
    return filter_var(mysqli_real_escape_string($this->db,$variable), FILTER_SANITIZE_STRING);
  }

  private function validate_input($email, $author, $comment, $comment_post_id) {

    $validated_input['email'] = filter_var($email, FILTER_SANITIZE_EMAIL);
    if (filter_var($validated_input['email'], FILTER_VALIDATE_EMAIL) == false) {
      error_log("failed email validation");
      return false;
    }

    $validated_input['author'] = substr($author, 0, 70);
    if($this->check_string($validated_input['author']) == false) {
      error_log("failed author validation");
      return false;
    }
    $validated_input['author'] = htmlentities($validated_input['author']);

    $validated_input['comment'] = substr($comment, 0, 300);
    if($this->check_string($validated_input['comment'], 5) == false) {
      error_log("failed comment validation");
      return false;
    }
    $validated_input['comment'] = htmlentities($validated_input['comment']);

    $validated_input['comment_post_id'] = intval($comment_post_id);
    if (filter_var($validated_input['comment_post_id'], FILTER_VALIDATE_INT) == false) {
      error_log("failed post ID validation");
      return false;
    }
    return $validated_input;
  }

}

?>

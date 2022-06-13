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
   */
  function get_comments($comment_post_id) {

    error_log("getting comments ");

    $tz = $_COOKIE["tz"]; // get the timezone from the clients cookies which is saved as "tz" then use it to convert the timestamp from the db using convert_tz
    error_log($tz);

    $sql = "SELECT email, author, comment_text, DATE_FORMAT(convert_tz(date, 'Etc/UTC', ?), '%W %M %Y') as date, DATE_FORMAT(convert_tz(date, 'Etc/UTC', ?), '%l:%i %p') as time FROM comments WHERE post_id=?"; // SQL with parameters
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

  $sql = "SELECT email, author, comment_text, DATE_FORMAT(convert_tz(date, 'Etc/UTC', ?), '%W %M %Y') as date, DATE_FORMAT(convert_tz(date, 'Etc/UTC', ?), '%l:%i %p') as time FROM comments WHERE comment_id=?"; // SQL with parameters
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
   * there is really no reason for this..
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

    //for testing just hardcode that it is not a reply
    $reply=0;
    $parent_comment_id=NULL;


    // need to validate the input. if it is true then can proceed to input it to db
    if ( $this->validate_input($email, $author, $comment) ) {
      $sql = "INSERT INTO comments (post_id, reply, parent_comment_id, email, author, comment_text) VALUES (?, ?, ?, ?, ?, ?)";
      $stmt = $this->db->prepare($sql);
      $stmt->bind_param("iiisss", $comment_post_id, $reply, $parent_comment_id, $email, $author, $comment);
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


  /**
   * TODO: much more validation and sanitization. Use a library.
   */
  private function validate_input($email, $author, $comment) {
    // TODO: need to uncomment this stuff to validate input. Right now it just returns true
    // $input['email'] = filter_var($input['email'], FILTER_SANITIZE_EMAIL);
    // if (filter_var($input['email'], FILTER_VALIDATE_EMAIL) == false) {
    //   return false;
    // }
    //
    // $input['comment_author'] = substr($input['comment_author'], 0, 70);
    // if($this->check_string($input['comment_author']) == false) {
    //   return false;
    // }
    // $input['comment_author'] = htmlentities($input['comment_author']);
    //
    // $input['comment'] = substr($input['comment'], 0, 300);
    // if($this->check_string($input['comment'], 5) == false) {
    //   return false;
    // }
    // $input['comment'] = htmlentities($input['comment']);
    //
    // $input['comment_post_id'] = filter_var($input['comment_post_id'], FILTER_VALIDATE_INT);
    // if (filter_var($input['comment_post_id'], FILTER_VALIDATE_INT) == false) {
    //   return false;
    // }

    return true;
  }
}

?>

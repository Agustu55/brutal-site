<?php
$dbhost = 'localhost';
$dbuser = 'gusdstevens';
$dbpass = 'web';
$dbname = 'blog';
$comment_post_id = 0;

$db = new mysqli($dbhost,$dbuser, $dbpass,$dbname);

print("conected to database");

print("getting comments ");

$sql = "SELECT email, author, comment_text FROM comments WHERE post_id=?"; // SQL with parameters
$stmt = $db->prepare($sql);
$stmt->bind_param("i", $comment_post_id);
$stmt->execute();
$result = $stmt->get_result(); // get the mysqli result
$comments = mysqli_fetch_all($result, MYSQLI_ASSOC); // fetch data

print(count($comments));
print("<br><br>");
print_r($comments[0]);
print("<br><br>");
print_r($comments[1]);
print("<br><br>");
for ($i = 0; $i < count($comments); $i++) {
  print_r(json_encode($comments[$i]));
  print("<br><br>");
}

$output = array();
for ($i = 0; $i < count($comments); $i++) {
  $output[] = json_encode($comments[$i]); // json encode the row then add it to an array to return to the website
}

print(count($output));
print_r($output);
// print(json_encode($comments));
// might need to modify the fetch_assoc result

print("<br><br>");
print("<br><br>");
print("going to try adding and immediatley returning a comment");
print("<br><br>");


function get_exact_comment($db, $comment_id) {

  print("getting single comment ");
  print("<br><br>");

  $tz = 'Etc/UTC';

  $sql = "SELECT email, author, comment_text, DATE_FORMAT(convert_tz(date, 'Etc/UTC', ?), '%W %M %Y') as date, DATE_FORMAT(convert_tz(date, 'Etc/UTC', ?), '%l:%i %p') as time FROM comments WHERE comment_id=?"; // SQL with parameters
  $stmt = $db->prepare($sql);
  $stmt->bind_param("ssi", $tz,$tz,$comment_id);
  $stmt->execute();
  $result = $stmt->get_result(); // get the mysqli result
  print("result number of rows");
  print($result->num_rows);
  print("fetching the result");
  print("<br><br>");
  $comments = mysqli_fetch_all($result, MYSQLI_ASSOC); // this fetches all o fthe data in an array of arrays where the inner array is a row that is the db column_name:value json_encode will return a dictionary

  print("returning single comment");
  print("<br><br>");

  return $comments;
}


$comment_post_id = 1;
$reply = 0;
$parent_comment_id = null;
$email = "gusdstevens@gmail.com";
$author = "gus";
$comment = "test from other program";

$sql = "INSERT INTO comments (post_id, reply, parent_comment_id, email, author, comment_text) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $db->prepare($sql);
$stmt->bind_param("iiisss", $comment_post_id, $reply, $parent_comment_id, $email, $author, $comment);
if ( $stmt->execute() ) {
  // this means the query executed so get the last inserted id
  print("sql executed succesfully");
  print("<br><br>");

  $last_id = mysqli_insert_id($db);
  print("last inserted comment id: ");
  print("<br><br>");
  print($last_id);
  print("<br><br>");
  print(json_encode(get_exact_comment($db, $last_id)));
}

?>

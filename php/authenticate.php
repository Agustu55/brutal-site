<?php
function console_log($output) {
	$js_code = json_encode($output);
	echo "<script> console.log(" . $js_code . ");</script>";
}

// todo: this function doesn't work but would be better to have sperate functions
// function validate_user($firstname, $lastname, $phone) {
// 	console_log($firstname);
// 	console_log($lastname);
// 	console_log($phone);
//
// 	$dbhost = 'localhost';
// 	$dbuser = 'gusdstevens';
// 	$dbpass = 'web';
// 	$dbname = 'broll';
//
// 	console_log($dbhost);
// 	consoel_log($dbuser);
// 	console_log($dbpass);
// 	consoel_log($dbname);
// 	console_log("connecting to db");
// 	// $db = new mysqli($dbhost,$dbuser, $dbpass,$dbname);
// 	$db = new mysqli('localhost','gusdstevens', 'web','broll');
//
//
//
// 	if ($db->connect_errno) {
// 	        consoel_log("Failed to connect to MySQL: (" . $db->connect_erno . ")" . $db->connect_error);
// 	} else {
// 		consoel_log("connected to database");
// 	}
//
// 	$sql = "SELECT * FROM users WHERE firstname=? AND lastname=? AND phone=?"; // SQL with parameters
// 	consoel_log($sql);
// 	$stmt = $db->prepare($sql);
// 	$stmt->bind_param("sss", $firstname,$lastname,$phone);
// 	$stmt->execute();
// 	$result = $stmt->get_result(); // get the mysqli result
// 	$user = $result->fetch_assoc(); // fetch data
// 	consoel_log("returning user from function");
// 	consoel_log($user);
// 	return $user;
// }

console_log("hello");
$errors = array();

console_log($_SERVER);
console_log($_POST);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	console_log("something was sent to the server");

	// if enter was pressed try to authenticate
	if (isset($_POST['enter'])) {
        console_log("authenticating user");
				$firstname = strtolower($_POST['firstname']);
				$lastname = strtolower($_POST['lastname']);
				$phone = $_POST['phone'];


				// check data
				if (empty($firstname)) {
					array_push($errors, "your name...");
				}
				if (empty($lastname)) {
					array_push($errors, "your last name...");
				}
				console_log(strlen($phone));
				if(strlen($phone) != 12) {
					if (empty($phone)) {
						array_push($errors, "your phone number...");
					}
					else {
						console_log("the phone number is too short");
						array_push($errors, "a real phone number...");
					}
				}

				// if there are no empty fields authenticate the  user
				if (count($errors) < 1) {

					// authenticate user
					console_log($firstname);
					console_log($lastname);
					console_log($phone);

					$dbhost = 'localhost';
					$dbuser = 'gusdstevens';
					$dbpass = 'web';
					$dbname = 'broll';

					$db = new mysqli($dbhost,$dbuser, $dbpass,$dbname);


					if ($db->connect_errno) {
					        consoel_log("Failed to connect to MySQL: (" . $db->connect_erno . ")" . $db->connect_error);
					}

					$sql = "SELECT * FROM users WHERE firstname=? AND lastname=? AND phone=?"; // SQL with parameters
					$stmt = $db->prepare($sql);
					$stmt->bind_param("sss", $firstname,$lastname,$phone);
					$stmt->execute();
					$result = $stmt->get_result(); // get the mysqli result
					$user = $result->fetch_assoc(); // fetch data
					// console_log("using function to validate");
					// $user = validate_user($firstname, $lastname, $phone);
					// consoel_log($user);

					console_log("the user was: ");
					console_log($user);
					if (!empty($user) && ($phone == '801-231-0369') ) { // liv's page
						header("location: spcl/liv.html");
						// header("location: 2ijf09fsdf2f.html");
					} else if (($firstname == 'ruby') && ($phone == '801-657-0500')) {
						header("location: spcl/rby.html");
					} else if (!empty($user)) {
						header("location: 2ijf09fsdf2f.html");
					} else {
						echo "<div id='loginMessage' class='mini'>";
						echo "<p> sry the broll doesn't exist... </p>";
						echo "<p> everything i shoot is aroll level material </p>";
						echo "</div>";

						echo "<div id='requestAccess' class='mini'>";
						echo "<p> OR </p>";
						echo "<br>";
						echo "<p><a id='email' href='mailto:gusdstevens@gmail.com?Subject=broll%20access&body=first%20name:%0D%0Alast%20name:%0D%0Aphone%20number:%0D%0a%0D%0A'>request access</a></p>";
						echo "</div>";
					}

					// record login attempt -- ignore my login attempts
					if (!($phone == '801-879-0362')) {
						$sql = "INSERT INTO logins (firstname, lastname, phone) VALUES (?, ?, ?)";
						$stmt = $db->prepare($sql);
						$stmt->bind_param("sss", $firstname,$lastname,$phone);
						$stmt->execute();
					}

				} else {
					$lilwords = array("pls enter", "and", "and");
					console_log(sizeof($errors));
					echo "<div id='loginMessage' class='mini'>";
					for ($i = 0; $i < sizeof($errors); $i++) {
							echo "<p> $lilwords[$i] $errors[$i] </p>";
						}
					echo "</div>";
				}



    }
}

?>

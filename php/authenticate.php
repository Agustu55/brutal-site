<?php
function console_log($output) {
	$js_code = json_encode($output);
	echo "<script> console.log(" . $js_code . ");</script>";
}

console_log("hello");
$errors = array();

console_log($_SERVER);
console_log($_POST);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	console_log("something was sent to the server");

	// if enter was pressed try to authenticate
	if (isset($_POST['enter'])) {
        console_log("authenticating user");
				$firstname = $_POST['firstname'];
				$lastname = $_POST['lastname'];
				$phone = $_POST['phone'];


				// check data
				if (empty($firstname)) {
					array_push($errors, "what's your name");
				}
				if (empty($lastname)) {
					array_push($errors, "last name too...");
				}
				if (empty($phone)) {
					array_push($errors, "it's really just for authentication");
				}

				// if there are no empty fields authenticate the  user
				if (count($errors) < 1) {
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

					if (!empty($user)) {
						console_log("Welcome to the broll");
						header("location: broll.html");
						console_log($user);
					}


				} else {
					console_log("enter your info");
				}



    }
}

?>

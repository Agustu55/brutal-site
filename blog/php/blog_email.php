<?php
function console_log($output) {
	$js_code = json_encode($output);
	echo "<script> console.log(" . $js_code . ");</script>";
}

console_log("hello");
$error;

console_log($_SERVER);
console_log($_POST);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	console_log("something was sent to the server");

    $email = strtolower($_POST['email']);
    $sanitized_email = filter_var($email, FILTER_SANITIZE_EMAIL);
    
    // check data
    if (empty($sanitized_email)) {
        console_log("email is empty");
        $error = "*no email added";
    } elseif (filter_var($sanitized_email, FILTER_VALIDATE_EMAIL) == FALSE) {
        console_log("email is improperly formatted");
        $error = "*inavalid email format";
    }

    // if there are no errors store the email
    if (empty($error)) {

        console_log($email);
        console_log("connecting to db ");

        $dbhost = 'localhost';
        $dbuser = 'gusdstevens';
        $dbpass = 'web';
        $dbname = 'blog';

        $db = new mysqli($dbhost,$dbuser, $dbpass,$dbname);


        if ($db->connect_errno) {
            console_log("Failed to connect to MySQL: (" . $db->connect_erno . ")" . $db->connect_error, 3, "/var/log/nginx/error.log");
        }
        console_log("conneted to db ");
        console_log("checking if it's a duplicate email");

        // make sure the eail isn't a duplicate
        $duplicate_check_sql = "SELECT email FROM post_notifications WHERE email=?"; // SQL with parameters
        $duplicate_stmtnt = $db->prepare($duplicate_check_sql);
        $duplicate_stmtnt->bind_param("s", $sanitized_email);
        $duplicate_stmtnt->execute();
        $duplicate_results = $duplicate_stmtnt->get_result();
        $duplicates = $duplicate_results->fetch_assoc();

        // this means it is a new email
        if ( empty($duplicates) ) {
            console_log("inserting a new email");
            $sql = "INSERT INTO post_notifications (email) VALUES (?)"; // SQL with parameters
            $stmt = $db->prepare($sql);
            $stmt->bind_param("s", $sanitized_email);
            $stmt->execute();
            console_log("email was added to post_notifications");
        } else {
            console_log("email already exists");
            $error = "*you're already subscribed. thank you!";
        }
    }
    
    if (!empty($error)) { // this is to show the error message
        echo "<div id='email_error'>";
        echo "<p> $error </p>";
        echo "</div>";
    }
}
?>
<?php
// Establish database connection
$host = "localhost";
$username = "admin";
$password = "jatinrds";
$database = "student_details";

$connection = new mysqli($host, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input to prevent SQL injection
        $roll_number = mysqli_real_escape_string($db, $_POST['roll_number']);
	$full_name = mysqli_real_escape_string($db, $_POST['full_name']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$mobileno = mysqli_real_escape_string($db, $_POST['mobileno']);
	
   
    // Check if all required fields are filled
    if(empty($name) || empty($email) || empty($phone) || empty($major)) {
        echo "All fields are required.";
        exit;
    }

    $query = "INSERT INTO student_details(roll_number,full_name,email,mobileno) 
					  VALUES('$roll_number','$full_name','$email','$mobileno')";
			
}

// Close connection
$connection->close();
?>

<?php
// Database connection parameters
$host = 'jatindatabase.cdame0iw4fi8.us-east-1.rds.amazonaws.com';
$username = 'admin';
$password = 'jatinsql';
$database = 'college_registration';

// Establish database connection
$connection = new mysqli($host, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input to prevent SQL injection
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
    $major = mysqli_real_escape_string($connection, $_POST['major']);

    // SQL query to insert data into students table
    $sql = "INSERT INTO students (name, email, phone, major) VALUES ('$name', '$email', '$phone', '$major')";

    // Execute query
    if ($connection->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

// Close connection
$connection->close();
?>

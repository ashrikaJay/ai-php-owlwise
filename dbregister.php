<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aiphp";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmedPassword'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$contactNumber = $_POST['phone'];
$birthday = $_POST['birthday'];
$gender = $_POST['gender'];
$salary = $_POST['salary'];

// Insert data into the database
$sql = "INSERT INTO Employee (Email, Password, FirstName, LastName, Phone, DateOfBirth, Gender, Salary)
        VALUES ('$email', '$confirmPassword', '$firstName', '$lastName', '$contactNumber', '$birthday', '$gender', '$salary')";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
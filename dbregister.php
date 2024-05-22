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

$sql = "INSERT INTO Employee (Email, Password, FirstName, LastName, Phone, DateOfBirth, Gender, Salary)
VALUES ('$email', '$confirmPassword', '$firstName', '$lastName', '$contactNumber', '$birthday', '$gender', '$salary')";


try{
    if ($conn->query($sql) === TRUE) {
        //echo "Data inserted successfully";
        header('Location:login.php?');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}catch(mysqli_sql_exception $e){
    if(strpos($e->getMessage(),'Duplicate entry') !== false){
        //echo("User already exists");
        header('Location:register.php?error');
        exit();
    }else{
        echo"Error: " . $e->getMessage();
    }

}

$conn->close();

?>
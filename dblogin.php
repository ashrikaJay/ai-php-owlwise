<?php
session_start();

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

$uname=$_POST['email'];
$pass=$_POST['pass'];

// Handling the admin login to access usersList.php
if($uname=="admin@gmail.com" && $pass=="admin2024"){
    $_SESSION['adminloggedin']=true;
    header('Location:usersList.php');
    exit();
}

// Handling the user login to access the dashboard.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aiphp";

$conn = new mysqli($servername, $username, $password, $dbname);
//Prepared statements where values aren't passed to prevent sql injection attack
$sql = "SELECT * FROM Employee WHERE Email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $uname);
$stmt->execute();
$result = $stmt->get_result();

// Check if a user with the given email and password exists
if ($result->num_rows === 1) {
    // Fetch the user data
    $user = $result->fetch_assoc();
    if ($user['Password']===$pass) {
        //echo "Data inserted successfully";
        $_SESSION['userloggedin']=$uname;

        header("Location: dashboard.php");
        exit();
    } else {
        //Password error
        header('Location:login.php?error');
        exit();
    }
    

} else {
    // Username error
    //echo("Invalid display... you're not suposed to get me!");
    header('Location:login.php?error-user');
    exit();
}


/*if($uname==true && $pass==true){
    $_SESSION['userloggedin']=true;
    header('Location:dashboard.php');
    exit();
}
if($user['Email']===$uname && $user['Password']===$pass){
    $_SESSION['userloggedin']=true;
    header('Location:dashboard.php');
    exit();
}*/



?>

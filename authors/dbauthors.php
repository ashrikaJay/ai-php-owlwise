<?php
    session_start();
    if(!isset($_SESSION['userloggedin'])){
      header('Location: ../login.php');
      exit();
    
    }
    
    // Enable error reporting
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "aiphp";

    // Check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the form data
        $authorid = $_POST['authorid'];
        $authorname = $_POST['authorname'];
        $famousfor = $_POST['famousfor'];
        $email = $_SESSION['userloggedin'];

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and execute the SQL statement
        $stmt = $conn->prepare("INSERT INTO Author(authorID, Name, Famous_For) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $authorid , $authorname, $famousfor);

        if ($stmt->execute()) {
            //echo "Data inserted successfully";
            header("Location: index.php?insertedsuccess");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    }

    // Check if the delete request has been made
    if(isset($_GET['delid'])) {
        $delid = $_GET['delid'];
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

    

        // Prepare and execute the DELETE statement
        $stmt = $conn->prepare("DELETE FROM Author WHERE authorID = ?");
        $stmt->bind_param("s", $delid);

        if ($stmt->execute()) {
            header('Location: index.php?deleted');
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    } else {
        echo "Invalid Author ID";
    }

        /*$sql = "DELETE FROM Task WHERE TaskName = $deltask AND Deadline = $deldeadline";
        if($conn->query($sql) === TRUE){
            header('Location:index.php?deleted');
            exit();
        }else{
            echo "Error deleting record: " . $conn->error;
        }
        $conn->close();
    }*/

    
    
?>
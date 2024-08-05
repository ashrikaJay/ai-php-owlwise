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
        $deadline = $_POST['deadline'];
        $taskName = $_POST['taskName'];
        $caption = $_POST['caption'];
        $email = $_SESSION['userloggedin'];

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and execute the SQL statement
        $stmt = $conn->prepare("INSERT INTO Task(Deadline, TaskName, Caption, email) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $deadline , $taskName, $caption, $email);

        if ($stmt->execute()) {
            //echo "Data inserted successfully";
            header("Location: index.php?success");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    }

    // Check if the delete request has been made
    if(isset($_GET['deltask']) && isset($_GET['deldeadline'])){
        $deltask = $_GET['deltask'];
        $deldeadline = $_GET['deldeadline'];

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

    

        // Prepare and execute the DELETE statement
        $stmt = $conn->prepare("DELETE FROM Task WHERE TaskName = ? AND Deadline = ?");
        $stmt->bind_param("ss", $deltask, $deldeadline);

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
        echo "Invalid TaskRow.";
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
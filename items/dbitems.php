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
        $description = $_POST['description'];
        $taskname = $_GET['taskname'];
        $cdate=$_GET['cdate'];
        

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and execute the SQL statement
        $stmt = $conn->prepare("INSERT INTO Item (Description,TaskName) VALUES (?, ?)");
        $stmt->bind_param("ss",$description, $taskname);

        if ($stmt->execute()) {
            //echo "Data inserted successfully";
            header("Location: index.php?taskname=" . urlencode($taskname) . "&cdate=" . urlencode($cdate) . "&success");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    }

    // Check if the delete request has been made
    if(isset($_GET['delid']) && isset($_GET['deltaskname']) && isset($_GET['cdate'])){
        $delid = $_GET['delid'];
        $deltaskname = $_GET['deltaskname'];
        $cdate = $_GET['cdate'];

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        //Prepare and execute the DELETE statement
        $stmt = $conn->prepare("DELETE FROM Item WHERE ItemId = ? AND TaskName = ?");
        $stmt->bind_param("is", $delid, $deltaskname);

        if ($stmt->execute()) {
            header("Location: index.php?taskname=" . urlencode($deltaskname) . "&cdate=" . urlencode($cdate) . "&deleted=true");
            exit();
            
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    } else {
        echo "Invalid Item in task list";
    }

?>
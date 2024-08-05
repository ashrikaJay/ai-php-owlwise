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
        $title = $_POST['title'];
        $description = $_POST['description'];
        $email=$_SESSION['userloggedin'];

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and execute the SQL statement
        $stmt = $conn->prepare("INSERT INTO Note (title, description, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $title, $description, $email);

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
    if(isset($_GET['delid'])){
        $delid = intval($_GET['delid']); // Ensure delid is an integer
        if ($delid > 0) { // Validate `delid`
            $conn = new mysqli($servername, $username, $password, $dbname);
    
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
    
            // Prepare and execute the DELETE statement
            $stmt = $conn->prepare("DELETE FROM Note WHERE id = ?");
            $stmt->bind_param("i", $delid);
    
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
            echo "Invalid ID.";
        }
    }



        /*$conn = new mysqli($servername, $username, $password, $dbname);
        $sql = "DELETE FROM Note WHERE id = $delid";
        if($conn->query($sql) === TRUE){
            header('Location:index.php?deleted');
            exit();
        };
        $conn->close();
    }*/

    
    
?>
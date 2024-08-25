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
        $bookid = $_POST['bookid'];
        $title = $_POST['title'];
        $authorname = $_POST['authorname'];
        $email=$_SESSION['userloggedin'];

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and execute the SQL statement
        $stmt = $conn->prepare("INSERT INTO Book (bookId, Title, Author) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $bookid, $title, $authorname);

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

    // Check if the form has been submitted
    if (isset($_GET['delid'])) {
        echo "Delete request received.<br>";
        
        $delid = $_GET['delid']; // Ensure delid is treated as a string (since bookId is a VARCHAR)
        if (!empty($delid)) { // Validate `delid`
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Prepare and execute the DELETE statement
            $stmt = $conn->prepare("DELETE FROM Book WHERE bookId = ?");
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
            echo "Invalid Book ID.";
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
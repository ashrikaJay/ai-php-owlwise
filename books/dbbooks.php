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

    // // Check if the form has been submitted
    // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //     // Get the form data
    //     $bookid = $_POST['bookid'];
    //     $title = $_POST['title'];
    //     $authorname = $_POST['authorname'];
    //     $email=$_SESSION['userloggedin'];

    //     $conn = new mysqli($servername, $username, $password, $dbname);

    //     // Check connection
    //     if ($conn->connect_error) {
    //         die("Connection failed: " . $conn->connect_error);
    //     }

    //     // Prepare and execute the SQL statement
    //     $stmt = $conn->prepare("INSERT INTO Book (bookId, Title, Author) VALUES (?, ?, ?)");
    //     $stmt->bind_param("sss", $bookid, $title, $authorname);

    //     if ($stmt->execute()) {
    //         //echo "Data inserted successfully";
    //         header("Location: index.php?success");
    //         exit();
    //     }else {
    //         echo "Error: " . $stmt->error;
    //     }

    //     // Close the statement and connection
    //     $stmt->close();
    //     $conn->close();
    // }
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['bookid'])) {
            $bookid = $_POST['bookid'];
            $title = isset($_POST['title']) ? $_POST['title'] : null;
            $authorname = isset($_POST['authorname']) ? $_POST['authorname'] : null;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : null;
    
            $conn = new mysqli($servername, $username, $password, $dbname);
    
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
    
            // Check if the book already exists
            $checkStmt = $conn->prepare("SELECT bookId FROM Book WHERE bookId = ?");
            $checkStmt->bind_param("s", $bookid);
            $checkStmt->execute();
            $checkStmt->store_result();
    
            if ($checkStmt->num_rows > 0) {
                // Book exists, update the record dynamically based on provided fields
                $query = "UPDATE Book SET";
                $params = [];
                $types = "";
    
                if ($title !== null) {
                    $query .= " Title = ?,";
                    $params[] = $title;
                    $types .= "s";
                }
    
                if ($authorname !== null) {
                    $query .= " Author = ?,";
                    $params[] = $authorname;
                    $types .= "s";
                }
    
                if ($stock !== null) {
                    $query .= " Stock_count = ?,";
                    $params[] = $stock;
                    $types .= "i";
                }
    
                // Remove the trailing comma
                $query = rtrim($query, ',');
                $query .= " WHERE bookId = ?";
                $params[] = $bookid;
                $types .= "s";
    
                // Prepare and execute the SQL statement
                $stmt = $conn->prepare($query);
                $stmt->bind_param($types, ...$params);
    
                if ($stmt->execute()) {
                    header("Location: index.php?success=edit");
                    exit();
                } else {
                    echo "Error: " . $stmt->error;
                }
    
            } else {
                // Book doesn't exist, insert a new record
                $stmt = $conn->prepare("INSERT INTO Book (bookId, Title, Author) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $bookid, $title, $authorname);
    
                if ($stmt->execute()) {
                    header("Location: index.php?success=add");
                    exit();
                } else {
                    echo "Error: " . $stmt->error;
                }
            }
    
            // Close the statements and connection
            $checkStmt->close();
            $stmt->close();
            $conn->close();
        } else {
            echo "Book ID is required.";
        }
    }
    
    // Check if delete has been submitted
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
    
?>
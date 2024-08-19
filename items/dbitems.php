<?php
session_start();
if (!isset($_SESSION['userloggedin'])) {
    header('Location: ../login.php');
    exit();
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function getDatabaseConnection() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "aiphp";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

$conn = getDatabaseConnection();

// Handle Form Submission for Add/Edit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $description = $_POST['description'];
    $taskname = $_POST['taskname'];
    $cdate = $_POST['cdate'];

    if (isset($_POST['editid']) && isset($_POST['edittaskname'])) {
        $editid = $_POST['editid'];
        $edittaskname = $_POST['edittaskname'];

        $stmt = $conn->prepare("UPDATE Item SET Description = ? WHERE ItemId = ? AND TaskName = ?");
        $stmt->bind_param("sis", $description, $editid, $edittaskname);

        if ($stmt->execute()) {
            header("Location: index.php?taskname=" . urlencode($edittaskname) . "&cdate=" . urlencode($cdate) . "&edited=true");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        $taskname = $_GET['taskname'];
        $cdate = $_GET['cdate'];
        $stmt = $conn->prepare("INSERT INTO Item (Description, TaskName) VALUES (?, ?)");
        $stmt->bind_param("ss", $description, $taskname);

        if ($stmt->execute()) {
            header("Location: index.php?taskname=" . urlencode($taskname) . "&cdate=" . urlencode($cdate) . "&success");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    $stmt->close();
}

// Handle Delete Request(no change)
if (isset($_GET['delid']) && isset($_GET['deltaskname']) && isset($_GET['cdate'])) {
    $delid = $_GET['delid'];
    $deltaskname = $_GET['deltaskname'];
    $cdate = $_GET['cdate'];

    $stmt = $conn->prepare("DELETE FROM Item WHERE ItemId = ? AND TaskName = ?");
    $stmt->bind_param("is", $delid, $deltaskname);

    if ($stmt->execute()) {
        header("Location: index.php?taskname=" . urlencode($deltaskname) . "&cdate=" . urlencode($cdate) . "&deleted=true");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid Item in task list";
}

$conn->close();
?>

<?php
// Start the session
session_start();

// Unset all session variables
$referer = $_SERVER['HTTP_REFERER'];

// Destroy the session
session_destroy();

// Redirect back to the referring page
header('Location: ' . $referer);
exit();
?>
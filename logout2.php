<?php
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect the user to another page after logout
header("Location: studentreg.php"); // Replace 'index.php' with the URL of the page you want to redirect to
exit;
?>

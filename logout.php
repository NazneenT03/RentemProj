<?php
session_start();

// Destroy the session
session_destroy();

// Redirect to the login page or any other desired location
header("Location: rentem.php");
exit();
?>

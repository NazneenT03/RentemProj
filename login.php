<?php
session_start();

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "user";

$connection = new mysqli($hostname, $username, $password, $dbname);

if ($connection->connect_error) {
    die('Connection failed: ' . $connection->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") { 
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    // Use prepared statements to prevent SQL injection
    $query = "SELECT email FROM test WHERE uname = ? AND pass = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("ss", $uname, $pass);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // Assuming the email column in your 'test' table is called 'email'
        $row = $result->fetch_assoc();
        $email = $row['email'];

        // Store the email ID in a session variable
        $_SESSION['email'] = $email;

        // Check if the username and password are "owner" and "owner"
        if ($uname === "owner" && $pass === "owner") {
            header("Location: owner.php");
            exit(); // Make sure to exit the script after the header redirection
        } else {
            header("Location: next.php");
            exit(); // Make sure to exit the script after the header redirection
        }
    } else {
        echo "Invalid username or password.";
    }
}

$connection->close();
?>

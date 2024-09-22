<?php
$hostname = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "user";

if (isset($_POST['uname'], $_POST['email'], $_POST['pass'])) {
    
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    
    $conn = new mysqli($hostname, $username, $password, $dbname );

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO test (uname, email, pass) VALUES ('$uname', '$email', '$pass')";
    if ($conn->query($sql) === TRUE) {
        echo "Registration successful";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
} else {
    echo "Form data not submitted";
 
}
?>

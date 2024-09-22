<?php
$hostname = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "orders";

    
    $conn = new mysqli($hostname, $username, $password, $dbname );

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $p_id = $_POST['p_id'];  // Assuming the product ID is submitted via a form
    $query = "SELECT * FROM product WHERE p_id = '$p_id'";
    $result = mysqli_query($conn, $query);
    $product = mysqli_fetch_assoc($result);
    
    $p_name = $product['p_name'];
    $p_price = $product['p_price'];
    
    $insertQuery = "INSERT INTO orders (p_name, p_price) VALUES ('$p_name', '$p_price')";
    if (mysqli_query($conn, $insertQuery)) {
      echo "Order placed successfully!";
    } else {
      echo "Error inserting order: " . mysqli_error($conn);
    }
    
?>

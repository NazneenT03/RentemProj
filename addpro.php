<?php
// Replace these with your actual database connection details
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "user";

try {
    $pdo = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch all product details from the database
    $stmt = $pdo->query("SELECT * FROM product");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Send the product details as JSON data to the client
    header('Content-Type: application/json');
    echo json_encode($products);
} catch (PDOException $e) {
    // Return an error message if there's an issue with the database connection
    echo "Error: " . $e->getMessage();
}
?>

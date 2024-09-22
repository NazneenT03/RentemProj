<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cart";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query the database
$sql = "SELECT * FROM bag";
$result = $conn->query($sql);

// Generate HTML content dynamically
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p>" . $row["pid"] . "</p>";
        echo "<img src='" . $row["image_url"] . "' alt='" . $row["product_name"] . "'>";
        // ... Display other data as needed
    }
} else {
    echo "No products found.";
}

// Close the database connection
$conn->close();
?>

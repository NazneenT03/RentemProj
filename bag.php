<?php
// Start the session to access the stored email ID
session_start();

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["pid"])) {
    // Your database connection credentials
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "user";

    // Establish a database connection
    $conn = new mysqli($hostname, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the product ID from the URL parameter
    $productId = $_GET["pid"];

    // Query to fetch the product details based on the provided PID
    $sql = "SELECT * FROM product WHERE pid = $productId";
    $result = mysqli_query($conn, $sql);

    // Check if the product with the given PID exists
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Extract the required product details
        $productName = $row['pname'];
        $productDescription = $row['pdes'];
        $productPrice = $row['price'];
        $productCategory = $row['category'];
        $productImage = $row['image'];

        // Check if the "email" key is set in the session
        if (isset($_SESSION['email'])) {
            // Get the user's email ID from the session
            $userEmail = $_SESSION['email'];

            // Insert the product details into the "bag" table along with the user's email
            $insertSql = "INSERT INTO bag (pid, pname, pdes, price, category, image, email) VALUES ('$productId', '$productName', '$productDescription', '$productPrice', '$productCategory', '$productImage', '$userEmail')";
            if (mysqli_query($conn, $insertSql)) {
                echo "Product added to the bag successfully!";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo "User email not found in the session.";
        }
    } else {
        echo "Product not found.";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

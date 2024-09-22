
<?php
// Start the session to access the stored email ID
session_start();

// Check if the "email" key is set in the session
if (isset($_SESSION['email'])) {
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

    // Get the user's email ID from the session
    $userEmail = $_SESSION['email'];

    // Query to fetch the products in the user's cart based on their email
    $sql = "SELECT * FROM bag WHERE email = '$userEmail'";
    $result = mysqli_query($conn, $sql);

    // Check if there are products in the cart for the user
    if (mysqli_num_rows($result) > 0) {
        echo '<h1>Your Cart</h1>';
        while ($row = mysqli_fetch_assoc($result)) {
            // Extract the required product details from the row
            $productId = $row['pid'];
            $productName = $row['pname'];
            $productDescription = $row['pdes'];
            $productPrice = $row['price'];
            $productImage = $row['image'];

            // Display the product details
            echo '<div class="cart-item">';
            echo "<img src=\"$productImage\" alt=\"$productName\">";
            echo '<h2>' . $productName . '</h2>';
            echo '<p>' . $productDescription . '</p>';
            echo '<p class="price">Price: $' . $productPrice . '</p>';
            // Add additional elements or functionality as needed
            echo '</div>';
        }}
    // ... Your existing code ...
    
    // Check if there are products in the cart for the user
    if (mysqli_num_rows($result) > 0) {
        // ... Your existing code ...
    
        // Calculate the total amount
        $totalAmount = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            // ... Your existing code ...
            $totalAmount += $productPrice;
        }
    
        // Display the "Place Order" button as an anchor link with the total amount in the URL
        echo '<a href="placed.php?amount=' . $totalAmount . '" class="order-button">Place Order</a>';
    } else {
        // ... Your existing code ...
    }
    
    
    

    // Close the database connection
    mysqli_close($conn);
} else {
    echo '<p class="cart-empty">User email not found in the session. Please log in first.</p>';
}
?>

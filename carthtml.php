<!DOCTYPE html>
<html>
<head>
    <title>RENTEM-BAG</title>
    
    
<style>
/* Reset default styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Global styles */
body {
    font-family: 'Times New Roman', Times, serif;
    color: #333;
    background-color: #f9f9f9;
}

.cart-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

/* Cart item styles */
.cart-item {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
}

.cart-item img {
    width: 100px;
    height: 100px;
    margin-right: 20px;
}

.cart-item h2 {
    font-size: 24px;
    margin-bottom: 10px;
}

.cart-item p {
    font-size: 16px;
    margin-bottom: 10px;
}

.cart-item p.price {
    font-weight: bold;
}

/* Cart is empty message */
.cart-empty {
    text-align: center;
    font-size: 20px;
    margin: 40px 0;
    color: #666;
}/* Add this CSS in the head section of your HTML or in a separate CSS file */
.order-button {
    display: block;
    margin-top: 20px;
    padding: 10px 20px;
    background-color: #333;
    color: #fff;
    text-align: center;
    text-decoration: none;
    font-size: 16px;
    border-radius: 4px;
    transition: background-color 0.3s ease;
}

.order-button:hover {
    background-color: #555;
}

/* Additional styles for a more prominent button */
.order-button {
    width: 150px;
    margin: 20px auto;
    font-weight: bold;
}

.order-button:active {
    background-color: #222;
}


/* Additional styling as needed */</style>

</head>
<body>
    <div class="cart-container">
        <?php include 'cart.php'; ?> <!-- Include the PHP code to display cart details -->
    </div>
</body>
</html>

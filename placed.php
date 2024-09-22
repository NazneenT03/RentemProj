<!DOCTYPE html>
<html>
<head>
    <title>RENTEM</title>
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
            text-align: center;
            padding: 50px;
        }

        .message {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .amount {
            font-size: 36px;
            color: black;
            font-weight: bold;
        }

        .confirmation-button {
            display: inline-block;
            background-color: #9e8046;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            text-transform: uppercase;
            border-radius: 4px;
            transition: background-color 0.3s ease;
            text-decoration: none;
            margin-top: 20px;
        }

        .confirmation-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php
    // Get the total amount from the previous page
    $totalAmount = isset($_GET['amount']) ? $_GET['amount'] : 0;
    ?>

    <div class="message">Your order has been placed successfully, the amount to be paid is:</div>
    <div class="amount">$<?php echo $totalAmount; ?></div>

    <!-- Confirmation Button -->
    <a href="next.php" class="confirmation-button">Rent more</a>
</body>
</html>

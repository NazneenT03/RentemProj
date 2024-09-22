<!DOCTYPE html>
<html>
<head>
    <title>RENTEM</title>
    <style>
    /* Reset default styles */
 *{
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
  
  .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
  }
  
  /* Header styles */
  
  
  /* Gender catalogs section styles */
  .catalogs {
    padding: 40px 0;
    text-align: center;
  }
  
  .catalogs h2 {
    font-size: 36px;
    margin-bottom: 20px;
  }

  .catalog-grid {
        display: grid; /* Use Grid layout */
        grid-template-columns: repeat(3, 1fr); /* Three columns */
        gap: 40px;
        justify-items: center;
    }
  
  .catalog-container {
        display: grid;
        grid-template-rows: repeat(auto-fill, minmax(300px, 1fr)); /* Use grid-template-rows for row-wise layout */
        gap: 40px;
        justify-items: center;
    }

    .catalog-card {
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease;
        text-align: center;
    }

  .catalog-card {
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease;
        max-width: 300px;
        width: 100%; /* Set width to fill available space */
        flex-basis: calc(33.33% - 80px); /* Set flex-basis to distribute 3 cards in a row */
        text-align: center;
    } 
  
  .catalog-card:hover {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }
  
  .catalog-card img {  
    width: 100%;
    margin-bottom: 20px;
  }
  
  .catalog-info {
    text-align: center;
  }
  
  .catalog-info h3 {
    font-size: 24px;
    margin-bottom: 10px;
  }
  
  .rent-button {
    display: inline-block;
    background-color: #333;
    color: #fff;
    padding: 10px 20px;
    font-size: 16px;
    text-transform: uppercase;
    border-radius: 4px;
    transition: background-color 0.3s ease;
    text-decoration: none;
  }
  
  .rent-button:hover {
    background-color: #555;
  }/* Add this CSS to your existing styles */
.top-nav {
    background-color: #333;
    color: #fff;
    padding: 10px;
    text-align: center;
}

.top-nav a {
    color: #fff;
    text-decoration: none;
    margin-right: 20px;
}

.top-nav a:last-child {
    margin-right: 0;
}

  
  /* Footer styles */
  </style>
</head>
<body><div class="top-nav">
        <a href="next.php">Home</a>
        <a href="carthtml.php">Bag</a>
    </div>
    <!-- PHP code starts here -->
    <?php
    // Step 1: Connect to the database
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "user";

    $conn = mysqli_connect($host, $username, $password, $database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM product WHERE category = 'formals'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        echo '<div class="product-container">';
        echo '<div class="catalog-grid">';
        while ($row = mysqli_fetch_assoc($result)) {
            // Retrieve item details from the row
            $itemName = $row['pname'];
            $itemDescription = $row['pdes'];
            $itemPrice = $row['price'];
            $itemImage = $row['image'];

            // Generate a new section for each item
            echo '<section class="catalogs">';
            echo '<div class="catalog-container">';
            echo '<div class="catalog-card">';
            echo "<img src=\"{$itemImage}\" alt=\"{$itemName}\">";
            echo '<h2>' . $itemName . '</h2>';
            echo $itemDescription . '</p>';
            echo '<p>Price: $' . $itemPrice . '</p>';
            echo '<a href="bag.php?pid=' . $row['pid'] . '" class="rent-button">Rent Now</a>';

            echo '</div></section>';
        }
        echo '</div>'; // Close .catalog-grid
        echo '</div>'; // Close .product-container
    } else {
        echo "No products found.";
    }
    mysqli_close($conn);
    ?> 
</body>
</html>
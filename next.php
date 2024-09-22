<!DOCTYPE html>
<html>
<head>
  <title>RENTEM</title>
  <link rel="stylesheet" href="next.css">
  <!-- HTML links (anchors) that call the addToCart function with different product IDs -->
</head>
<body>
  <header>
    <nav>
      <ul>
        <li><a href="about.html">About</a></li>
        <li><a href="acc.php">Accessories</a></li>
        <li><a href="contact.html">Contact</a></li>
        

      </ul>
    </nav>
    <i class="fa-duotone fa-basket-shopping-simple fa-beat" style="--fa-primary-color: #9e6c51; --fa-secondary-color: #b09682;"></i>
  </header>

  <section class="hero">
    <div class="hero-content">
      <img src="logo.jpeg" width= "200" height="200">
    <div class="button-container"> 
      <a href="catalog.php" class="cta-button">Shop Now</a>
      <a href="logout.php" class="cta-button">logout</a>
    </div>
    </div>
    </section>

  <section class="featured-products">
    <h2>Featured Products</h2>
    <div class="product-grid">
      <div class="product-card"name="pid"  >
        <img src="maxi1.jpg" alt="Dress" width="300" height="200">>
        <h3>Floral Maxi Dress</h3>
        <p>Perfect for a summer day</p>
        
      </div>
      <div class="product-card" name="pid" >
        <img src="suit.jpg" alt="Suit" width="300" height="200">>
        <h3>Classic Black Suit</h3>
        <p>Elegant and timeless</p>
        
      </div>
      <div class="product-card"name="pid" >
        <img src="gown.jpg" alt="Gown" width="300" height="200">>
        <h3>Evening Gown</h3>
        <p>Make a statement at any formal event</p>
        
      </div>
    </div>
  </section>

  <footer>
    <p>&copy; 2023 Clothing Rental Website. All rights reserved.</p>
  </footer>
</body>
</html>

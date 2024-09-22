<!DOCTYPE html>
<html>
<head>
  <title>RENTEM</title>
  <link rel="stylesheet" href="next.css">
 <script> 
// Function to handle the button click event
// Function to handle the link click event
// Function to handle the link click event
// Function to check if the user is logged in
function isLoggedIn() {
  // Replace this with your own logic to check if the user is logged in
  // For example, you might use cookies, sessions, or authentication tokens.
  // For this example, let's assume there's a variable "isLoggedIn" set to true if the user is logged in.
  return isLoggedIn;
}

// Function to display the login message
function showLoginMessage() {
  document.getElementById("loginMessage").style.display = "block";
}

// Add event listener to the Rent Now button
document.getElementById("rentButton").addEventListener("click", function() {
  if (!isLoggedIn()) {
    showLoginMessage();
  } else {
    // Add the logic to handle the rent process here
    // For example, redirect the user to the rent page or perform the rent action.
    // This part depends on your application's requirements.
    console.log("Renting now...");
  }
});

</script>
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
  </header>
  <section class="hero">
    <div class="hero-content">
      <img src="logo.jpeg" width= "200" height="200">
    <div class="button-container"> 
      <a href="catalog.php" class="cta-button">Shop Now</a>
      <a href="signup.php" class="cta-button">login/sign up</a>
    </div>
    </div>
    </section>

  <section class="featured-products">
    <h2>Featured Products</h2>
    <div class="product-grid">
      <div class="product-card">
        <img src="maxi1.jpg" alt="Dress" width="300" height="200">>
        <h3>Floral Maxi Dress</h3>
        <p>Perfect for a summer day</p>
        
        <div id="loginMessage" style="display: none;">Please login to continue.</div></div>

      <div class="product-card">
        <img src="suit.jpg" alt="Suit" width="300" height="200">>
        <h3>Classic Black Suit</h3>
        <p>Elegant and timeless</p>
        
       <div id="loginMessage" style="display: none;">Please login to continue.</div>
      </div>
      <div class="product-card">
        <img src="gown.jpg" alt="Gown" width="300" height="200">>
        <h3>Evening Gown</h3>
        <p>Make a statement at any formal event</p>
        
       <div id="loginMessage" style="display: none;">Please login to continue.</div>
      </div>
    </div>
  </section>

  <footer>
    <p>&copy; 2023 Clothing Rental Website. All rights reserved.</p>
  </footer>
</body>
</html>

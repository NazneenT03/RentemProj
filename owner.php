<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RENTEM</title>
    <link rel="stylesheet" href="owner.css">
</head>
<body><a href="next.php">Home</a></li>
    <div class="container">
        <h1 class="heading">Product Details</h1>
        <form method="POST" enctype="multipart/form-data">
            <!-- Existing form fields -->
            <label for="pid">Product id:</label>
            <input type="number" id="pid" name="pid" required>

            <label for="pname">Product Name:</label>
            <input type="text" id="pname" name="pname" required>

            <label for="pdes">Product Description:</label>
            <textarea type="text" id="pdes" name="pdes" rows="5" required></textarea>

            <label for="price">Product Price:</label>
            <input type="number" id="price" name="price" step="0.01" required>
           
            <label for="category" type="category">Product Category:</label>
            <select id="category" name="category">
                <option value="wedding">Wedding Collection</option>
                <option value="ethnics">Ethnics</option>
                <option value="trendy">Trendy Casuals</option>
                <option value="formals">Classy Formals</option>
                <option value="casuals">Casuals</option>
                <option value="summer">Summer Collection</option>
                <option value="acc">Accessories</option>

            </select>

            <!-- Image upload field -->
            <label for="image">Product Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required>
            <!-- The "accept" attribute restricts the file selection to images only -->

            <button type="submit" class="submit-button">Submit</button>
        </form>
    </div>
</body>
</html>

<?php
// Your database connection credentials
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "user";

// Establish a database connection
$conn = new mysqli($hostname, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Get the values from the form
    $pid = $_POST['pid'];
    $pname = $_POST['pname'];
    $pdes = $_POST['pdes'];
    $price = $_POST['price'];
    $category = $_POST['category']; // This will contain the selected value from the dropdown

    // Image Upload
    $targetDir = "product/"; // Directory where you want to store the uploaded images
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["image"]["size"] > 500000) { // Adjust the size limit as needed
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats (you can add more if needed)
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // if everything is ok, try to upload file
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    // Prepare the SQL statement with placeholders to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO product (pid, pname, pdes, price, category, image) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issdss", $pid, $pname, $pdes, $price, $category, $targetFile);

    // Execute the SQL statement
    if ($stmt->execute()) {
        // Data inserted successfully
        echo "Product added to the database.";
    } else {
        // Error occurred while inserting data
        echo "Error: " . $stmt->error;
    }

    // Close the statement and database connection
    $stmt->close();
    $conn->close();
}
?>
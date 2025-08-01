
<?php include "db.php"; session_start(); ?>
<?php if (!isset($_SESSION['user'])) { header("Location: login.php"); exit(); } ?>
<form method="POST" enctype="multipart/form-data">
  <h2>Upload Product</h2>
  <input type="text" name="name" placeholder="Product Name" required><br>
  <input type="number" name="price" placeholder="Price" required><br>
  <input type="file" name="image" required><br>
  <button type="submit" name="upload">Upload</button>
</form>
<?php
if (isset($_POST['upload'])) {
  $name = $_POST['name'];
  $price = $_POST['price'];
  $image = $_FILES['image']['name'];
  $target = "uploads/" . basename($image);
  move_uploaded_file($_FILES['image']['tmp_name'], $target);
  $conn->query("INSERT INTO products (name, price, image) VALUES ('$name', '$price', '$image')");
  echo "Product uploaded successfully.";
}
?>

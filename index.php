
<?php include "db.php"; session_start(); ?>
<h1>Welcome to Mini Daraz</h1>
<?php if (isset($_SESSION['user'])): ?>
  <p>Hello, <?= $_SESSION['user'] ?> | <a href="admin_upload.php">Upload Product</a> | <a href="logout.php">Logout</a></p>
<?php else: ?>
  <p><a href="login.php">Login</a> | <a href="register.php">Register</a></p>
<?php endif; ?>
<hr>
<h2>All Products</h2>
<div style="display: flex; flex-wrap: wrap;">
<?php
$result = $conn->query("SELECT * FROM products");
while($row = $result->fetch_assoc()):
?>
  <div style="border:1px solid #ccc; padding:10px; margin:10px; width:200px;">
    <img src="uploads/<?= $row['image'] ?>" width="100%" height="150"><br>
    <strong><?= $row['name'] ?></strong><br>
    Price: $<?= $row['price'] ?>
  </div>
<?php endwhile; ?>
</div>

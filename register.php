
<?php include "db.php"; ?>
<form method="POST">
  <h2>Register</h2>
  <input type="text" name="username" placeholder="Username" required><br>
  <input type="email" name="email" placeholder="Email" required><br>
  <input type="password" name="password" placeholder="Password" required><br>
  <button type="submit" name="register">Register</button>
</form>
<?php
if (isset($_POST['register'])) {
  $name = $_POST['username'];
  $email = $_POST['email'];
  $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $conn->query("INSERT INTO users(username, email, password) VALUES ('$name', '$email', '$pass')");
  echo "Registration successful.";
}
?>

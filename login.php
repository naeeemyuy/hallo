
<?php
include "db.php";
session_start();
?>
<form method="POST">
  <h2>Login</h2>
  <input type="email" name="email" placeholder="Email" required><br>
  <input type="password" name="password" placeholder="Password" required><br>
  <button type="submit" name="login">Login</button>
</form>
<?php
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $pass = $_POST['password'];
  $result = $conn->query("SELECT * FROM users WHERE email='$email'");
  $user = $result->fetch_assoc();
  if ($user && password_verify($pass, $user['password'])) {
    $_SESSION['user'] = $user['username'];
    echo "Login successful. <a href='index.php'>Go to Home</a>";
  } else {
    echo "Invalid credentials.";
  }
}
?>

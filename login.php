<?php include 'header.php' ?>

<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $conn = require __DIR__ . "/db_connection.php";

  $sql = sprintf("SELECT * FROM user 
                    WHERE email = '%s'",
    $conn->real_escape_string($_POST['email'])
  );

  $result = $conn->query($sql);

  $user = $result->fetch_assoc();



  if ($user) {
    if ($_POST['password'] == $user['password']) {

      session_start();

      session_regenerate_id();

      $_SESSION['user_id'] = $user['user_id'];

      header("Location: member.php");
      exit;
    }
  }
  $is_invalid = true;
}




?>

<div class="login-page">

  <div class="form">
    <h3 class="padding">Login</h3>
    <?php if ($is_invalid): ?>
      <em>Invalid login</em>
    <?php endif; ?>
    <form class="login-form" method="POST">
      <input type="email" name="email" placeholder="Email" id="email"
        value="<?= htmlspecialchars($_POST["email"] ?? "") ?>" required />
      <input type="password" name="password" placeholder="Password" required />
      <button type="submit" name="btn_login">login</button>
      <p class="message">Not registered? <a href="register.php">Register</a></p>
    </form>
  </div>
</div>

<!-- <script lang="JavaScript" type="text/javascript" src="JS/login.js"></script> -->

<?php include 'footer.php' ?>
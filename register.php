<!-- Purpose: Register page for new users -->

<?php include 'header.php' ?>





<div class="login-page">
  <div class="form" id="submit">
    <h3 class="padding">Register</h3>
    <?php include('errors.php'); ?>
    <form action="process_register.php" class="register-form" method="POST" id="register" ">
      <input type=" text" name="first_name" placeholder="First Name" id="fname" required />
    <input type="text" name="last_name" placeholder="Last Name" id="lname" required />
    <input type="email" name="email" placeholder="Email" id="email" required />
    <input type="password" name="password" placeholder="Password" id="password" required />

    <button type="submit" name="submit">Register</button>
    <p class="message">Already registered? <a href="login.php">Log In</a></p>
    </ form>
    </di v>
  </div>

  <?php include 'footer.php' ?>
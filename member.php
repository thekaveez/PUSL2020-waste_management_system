<?php

session_start();

if (isset($_SESSION['user_id'])) {

    $conn = require __DIR__ . "/db_connection.php";

    $sql = "SELECT * FROM user 
            WHERE user_id = {$_SESSION['user_id']}";

    $result = $conn->query($sql);

    $user = $result->fetch_assoc();
}

?>

<?php include 'header.php' ?>

<?php if (isset($user)): ?>
    <p> Hello
        <?= htmlspecialchars($user["first_name"]) ?>
    </p>

    <a href="logout.php">Logout</a>

<?php else: ?>

    <p> <a href="login.php">Login</a> or <a href="register.php">Register</a> </p>

<?php endif; ?>



</div>


<?php include 'footer.php' ?>
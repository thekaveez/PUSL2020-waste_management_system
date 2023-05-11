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

    <a href="logout.php">Logout</a><br>

    <a href="incident_report.php">report</a>


    <table class="table">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Title</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $conn = require 'db_connection.php';
            $rows = mysqli_query($conn, "SELECT * FROM incident 
            where user_id = $user[user_id] ORDER BY incident_id DESC ");

            $i = 1;

            foreach ($rows as $row):

                ?>

                <tr>
                    <th scope="row">
                        <?php echo $i++ ?>
                    </th>
                    <td>
                        <a href="article.php?id=<?= $row['incident_id'] ?>" role="button" class="btn">
                            <?php echo $row["incident_title"] ?>
                        </a>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


<?php else: ?>

    <p> <a href="login.php">Login</a> or <a href="register.php">Register</a> </p>

<?php endif; ?>



</div>


<?php include 'footer.php' ?>
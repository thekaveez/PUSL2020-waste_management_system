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

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="p-3 m-0 border-0 bd-example">

    <!-- Example Code -->
    <?php if (isset($user)): ?>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid ">
                <a class="navbar-brand " href="#"> Hello
                    <?= htmlspecialchars($user["first_name"]) ?>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <ul class="navbar-nav ms-auto">
                        <a class="nav-link active" style="color:#0A70F6" href="logout.php">Logout</a>
                    </ul>
                </div>
            </div>
        </nav>


        <a class="btn btn-primary" href="incident_report.php" role="button"
            style="margin-top: 30px; margin-bottom: 30px;">Report an Incident</a>

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

        <a class="btn btn-primary" href="login.php" role="button"
            style="margin-top: 30px; margin-bottom: 30px;">Login/Register</a>

    <?php endif; ?>



    </div>


    <?php include 'footer.php' ?>
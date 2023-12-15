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

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box;
        }


        body {
            font-family: Arial;
            padding: 50px;
            background: #f1f1f1;
        }


        .header {
            padding: 30px;
            font-size: 40px;
            text-align: center;
            background: white;
        }


        .leftcolumn {
            float: left;
            width: 100%;
        }


        .fakeimg {
            background-color: #aaa;
            width: 100%;
            padding: 20px;
        }

        .card {
            background-color: white;
            padding: 20px;
            margin-top: 20px;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Footer */
        .footer {
            padding: 20px;
            text-align: center;
            background: #ddd;
            margin-top: 20px;
        }

        @media screen and (max-width: 800px) {

            .leftcolumn,
            .rightcolumn {
                width: 100%;
                padding: 0;
            }
        }

        .img-fluid {
            width: 80%;
            height: 80%;
        }

        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            margin-top: 20px;
            width: 80%;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css"
        integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
    <?php if (isset($user)): ?>

        <?php
        $conn = require 'db_connection.php';
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $stmt = $conn->prepare("SELECT * FROM incident 
            where incident_id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();

            $result = $stmt->get_result();

            $desc = $result->fetch_assoc();

            if (!$desc) {
                die("Article not found");
            }

            ?>

            <div class="row">
                <div class="leftcolumn">
                    <div class="card">
                        <h2 class="center">
                            <?= htmlspecialchars($desc["incident_title"]) ?>
                        </h2>

                        <img class="img-fluid center" src="uploads/<?= $desc["incident_image"] ?>" alt="">

                        <p class="center">
                            <?= htmlspecialchars($desc["incident_description"]) ?>
                        </p>

                    </div>
                    <div>

                        <iframe
                            src="src=https://www.google.com/maps?g=<?php echo $desc["lat"]; ?>,<?php echo $desc["lng"]; ?>&h1=es;z=14&output=embed"></iframe>
                    </div>
                    <div>
                        <form class="center" action="update.php" method="post" enctype="multipart/form-data">
                            <button type="submit" class="btn btn-success btn-sm ">UPDATE</button>

                    </div>
                    <div">
                        </form>
                        <form class="center" action="update.php" method="post" enctype="multipart/form-data">
                            <button type="submit" class="btn btn-danger btn-sm">DELETE</button>
                        </form>
                </div>
            </div>





            </div>

            <?php

        } else {
            $id = 1;

        }

        ?>
    <?php else: ?>

        <p> <a href="login.php">Login</a> or <a href="register.php">Register</a> </p>

    <?php endif; ?>

    <script
        src="https://maps.googleapis.com/maps/api/js?key=<YOUR API KEY>&callback=initMap"></script>

</body>

</html>

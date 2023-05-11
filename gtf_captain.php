<?php

use JetBrains\PhpStorm\Internal\LanguageLevelTypeAware;

include 'db_connection.php';
$conn = require __DIR__ . "/db_connection.php";

$sql = "SELECT *  FROM incident ";

$result = $conn->query($sql);

$result_info = $conn->query($sql);

$incidents = $result->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css"
        integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <!-- <script type="module" src="JS/map.js"></script> -->
    <title>Report Incident</title>
    <style>
        .map {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <div class="container">

        <h1 class="display-1 ">Incidents - GTF Captain</h1>
        <?php if (isset($_GET['error'])): ?>
            <p>
                <?php echo $_GET['error']; ?>
            </p>
        <?php endif ?>


        <!-- map -->
        <div id="map" style="height: 800px;" class="map"></div>



        </form>
    </div>
    <script>

        function initMap() {

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 10,
                center: { lat: 6.820795, lng: 80.03944, } // default map center
            });

            <?php foreach ($incidents as $incident): ?>
                var marker = new google.maps.Marker({
                    position: { lat: <?php echo $incident['lat'] ?>, lng: <?php echo $incident['lng'] ?> },
                    map: map,
                    title: '<?php echo $incident['incident_title'] ?>'
                });



            <?php endforeach; ?>

        }



    </script>

    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6IU7x0jaNIUtxi-dJCASHNknI-TfyWWU&callback=initMap"></script>

</body>

</html>

<!-- AIzaSyA6IU7x0jaNIUtxi-dJCASHNknI-TfyWWU -->
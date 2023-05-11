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
        input[type=text],
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
            margin-bottom: 10px;
        }

        input[type=submit] {
            margin-top: 20px;
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        .container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
            margin-bottom: 20px;
        }

        .display-1 {
            text-align: center;
            margin-top: 30px;
            margin-bottom: 20px;
        }

        .form-control {
            margin-bottom: 10px;
        }

        .map {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <h1 class="display-1">Report Incident</h1>
    <div class="container">
        <?php if (isset($_GET['error'])): ?>
            <p>
                <?php echo $_GET['error']; ?>
            </p>
        <?php endif ?>
        <form action="incident_process.php" method="post" enctype="multipart/form-data">
            <label for="location">Location</label>
            <!-- <input type="text" id="location" name="location" placeholder="Enter location" required> -->

            <!-- map -->
            <div id="map" style="height: 400px;" class="map"></div>

            <input type="hidden" name="lat" value="">
            <input type="hidden" name="lng" value="">

            <label for="title">Title</label>
            <input type="text" id="title" name="incident_title" placeholder="Enter Title" required>

            <label for="image" class="form-label">Image</label>
            <input class="form-control" type="file" id="image" name="incident_image" accept="image/*">

            <label for="details">Description</label>
            <textarea id="details" name="incident_description" placeholder="Enter incident details" style="height:200px"
                required></textarea>



            <input type="submit" value="Submit">
        </form>
    </div>
    <script>

        function initMap() {

            let mapOptions = {
                center: { lat: 6.820795, lng: 80.03944 },
                zoom: 12,
            }
            let map = new google.maps.Map(document.getElementById("map"), mapOptions);

            let markerOptions = {
                position: { lat: 6.820795, lng: 80.03944 },
                map: map,
                draggable: true,

            }
            var marker = null;
            google.maps.event.addListener(map, 'click', function (event) {
                if (marker) {

                    marker.setMap(null);

                    let pos = marker.getPosition(showError);
                    document.querySelector('input[name="lat"]').value = pos.lat();
                    document.querySelector('input[name="lng"]').value = pos.lng();
                }

                marker = new google.maps.Marker({
                    position: event.latLng,
                    map: map,
                    draggable: true,
                });

                marker.addListener('dragend', function () {
                    let pos = marker.getPosition(showError);
                    document.querySelector('input[name="lat"]').value = pos.lat();
                    document.querySelector('input[name="lng"]').value = pos.lng();

                });

                function showError(error) {

                    switch (error.code) {
                        case error.PERMISSION_DENIED:
                            alert("User denied the request for Geolocation.")
                            break;
                        case error.POSITION_UNAVAILABLE:
                            alert("Location information is unavailable.")
                            break;
                        case error.TIMEOUT:
                            alert("The request to get user location timed out.")
                            break;
                        case error.UNKNOWN_ERROR:
                            alert("An unknown error occurred.")
                            break;
                    }
                }

            });
        }

    </script>

    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6IU7x0jaNIUtxi-dJCASHNknI-TfyWWU&callback=initMap"></script>

</body>

</html>

<!-- AIzaSyA6IU7x0jaNIUtxi-dJCASHNknI-TfyWWU -->
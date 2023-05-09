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
    <script type="module" src="JS/map.js"></script>
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
        <form action="report.php" method="post" enctype="multipart/form-data">
            <label for="location">Location</label>
            <!-- <input type="text" id="location" name="location" placeholder="Enter location" required> -->

            <!-- map -->
            <div id="map" style="height: 400px;" class="map"></div>

            <label for="title">Title</label>
            <input type="text" id="title" name="title" placeholder="Enter Title" required>

            <label for="image" class="form-label">Image</label>
            <input class="form-control" type="file" id="image" name="image" accept="image/*">

            <label for="details">Description</label>
            <textarea id="details" name="details" placeholder="Enter incident details" style="height:200px"
                required></textarea>



            <input type="submit" value="Submit">
        </form>
    </div>

    <script>
        (g => { var h, a, k, p = "The Google Maps JavaScript API", c = "google", l = "importLibrary", q = "__ib__", m = document, b = window; b = b[c] || (b[c] = {}); var d = b.maps || (b.maps = {}), r = new Set, e = new URLSearchParams, u = () => h || (h = new Promise(async (f, n) => { await (a = m.createElement("script")); e.set("libraries", [...r] + ""); for (k in g) e.set(k.replace(/[A-Z]/g, t => "_" + t[0].toLowerCase()), g[k]); e.set("callback", c + ".maps." + q); a.src = `https://maps.${c}apis.com/maps/api/js?` + e; d[q] = f; a.onerror = () => h = n(Error(p + " could not load.")); a.nonce = m.querySelector("script[nonce]")?.nonce || ""; m.head.append(a) })); d[l] ? console.warn(p + " only loads once. Ignoring:", g) : d[l] = (f, ...n) => r.add(f) && u().then(() => d[l](f, ...n)) })({
            key: "AIzaSyCj45z8ZE7hzURM2u1zJwbRPFuEuemtcmw",
            // Add other bootstrap parameters as needed, using camel case.
            // Use the 'v' parameter to indicate the version to load (alpha, beta, weekly, etc.)
        });
    </script>

</body>

</html>
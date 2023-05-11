<?php

include 'db_connection.php';

session_start();

$user_id = $_SESSION["user_id"];
$lat = $_POST["lat"];
$lng = $_POST["lng"];
$title = $_POST["incident_title"];
$image = $_FILES["incident_image"]["name"];
$image_tmp = $_FILES["incident_image"]["tmp_name"];
$folder = "uploads/" . $image;
$description = $_POST["incident_description"];

$sql = "INSERT INTO incident(user_id, lat, lng, incident_title, incident_image,incident_description) VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL eror: " . $conn->error);
}
$stmt->bind_param("ssssss", $user_id, $lat, $lng, $title, $image, $description);

if ($stmt->execute()) {

    move_uploaded_file($image_tmp, $folder);

    header("Location: member.php");
    exit;
} else {

    die($conn->error . " " . $conn->errno);


}




// $image_ex = pathinfo($image, PATHINFO_EXTENSION);
// $img_ec_lc = strtolower($image_ex);
// $new_img_name = uniqid("IMG-", true) . '.' . $img_ec_lc;
// $img_upload_path = 'uploads/' . $new_img_name;
// move_uploaded_file($image_tmp, $img_upload_path);


?>
<?php


if (empty($_POST['first_name'])) {
    $name_error = die("Please enter your first name");
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    die("Invalid email format");
}

if (strlen($_POST['password']) < 6) {
    die("Password must be at least 6 characters long");
}

require __DIR__ . "/db_connection.php";

$sql = "INSERT INTO user (first_name, last_name, email, password) VALUES (?, ?, ?, ?)";

$stmt = $conn->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL eror: " . $conn->error);
}

$stmt->bind_param("ssss", $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password']);

if ($stmt->execute()) {

    header("Location: login.php");
    exit;
} else {
    if ($conn->errno == 1062) {
        die("Email already exists");
    } else {
        die($conn->error . " " . $conn->errno);
    }

}




?>
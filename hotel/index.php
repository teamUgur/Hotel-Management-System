<?php
include "./config.php";
session_start();

function prepareAndExecute ($conn, $sql, $params) {
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("sqli error: " . htmlspecialchars($conn->error));
    }
    $stmt->bind_param(str_repeat('s', count($params)), ...$params);
    $stmt->execute();
    return $stmt;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
<body>

    <div class="carusel-container">

        <div class="carousel-slide active">
            <img src="./img/hotel 1.JPG" alt="Room 1">
        </div>

        <div class="carousel-slide">
            <img src="./img/hotel 2.JPG" alt="Room 2">
        </div>

        <div class="carousel-slide">
            <img src="./img/hotel 3.JPG" alt="Room 3">
        </div>

        <div class="carousel-slide">
            <img src="./img/hotel 4.JPG" alt="Room 4">
        </div>

        <div class="carousel-dots">
            <div class="dot active" data-slide="0"></div>
            <div class="dot" data-slide="1"></div>
            <div class="dot" data-slide="2"></div>
            <div class="dot" data-slide="3"></div>
        </div>

    </div>

</body>
</html>
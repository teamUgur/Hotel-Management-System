<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
    <title>Carusel</title>
    <link href="http://localhost/hotel-management-system/css/login.css" rel="stylesheet">
</head>
<!-- <style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: rgb(183, 183, 183);
    }

    body {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    .carusel-container {
        width: 100%;
        height: 300px;
        position: relative;
        /* overflow: hidden; */
    }

    .carusel-slide {
        display: none;
        width: 100%;
        height: 100%;
    }

    .carusel-slide.active {
        display: active;
    }

    .carusel-slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .carousel-dots {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 10px;
    }

    .dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background-color: rgba(255, 255, 255, 0.5);
        cursor: pointer;
    }

    .dot.active {
        background-color: white;
    }
</style> -->
<!-- <script>
    let currentSlide = 0;
    let slides = document.querySelectorAll('carousel-slide');
    let dots = document.querySelectorAll('dot');
    totalSlides = slides.length;

    function showSlides(n) {
    slides.forEach(slide => slide.classList.remove('active'));
    dots.forEach(dot => dot.classList.remove('active'));

    currentSlide = (n + currentSlide) % totalSlides;
    slides[currentSlide].classList.add('active');
    dots[currentSlide].classList.add('active');
    }

    function rotateCarusel() {
        currentSlide = (currentSlide + 1) % currentSlide;
        showSlides(currentSlide);
    }

    showSlides(0);
    const slideInterval = setInterval(rotateCarusel, 5000);

    dots.forEach(dot => dot.addEventListener('click', function() {
        const slideIndex = parseInt(this.getAttribute('data-slide'));
        showSlides(slideIndex);
        clearInterval(slideInterval);
        slideInterval = setInterval(rotateCarusel, 5000);
    }))
</script> -->
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

    <script src="./js/index.js"></script>
</body>
</html>
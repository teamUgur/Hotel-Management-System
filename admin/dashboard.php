<?php

session_start();
include "../config.php";

// roombook
$roombook = "SELECT * FROM roombook";
$roombookSql = mysqli_query($conn, $roombook);
$roombookRow = mysqli_num_rows($roombookSql);

// staff
$staff = "SELECT * FROM staff";
$staffSql = mysqli_query($conn, $staff);
$staffRow = mysqli_num_rows($staffSql);

// room
$room = "SELECT * FROM room";
$roomSql = mysqli_query($conn, $room);
$roomRow = mysqli_num_rows($roomSql);

// room type
$roomtypeOne = "SELECT * FROM roombook WHERE RoomType = 'Superior Room'";
$roomtypeOneSql = mysqli_query($conn, $roomtypeOne);
$roomtypeOneRow = mysqli_num_rows($roomtypeOneSql);

$roomtypeTwo = "SELECT * FROM roombook WHERE RoomType = 'Deluxe Room'";
$roomtypeTwoSql = mysqli_query($conn, $roomtypeTwo);
$roomtypeTwoRow = mysqli_num_rows($roomtypeTwoSql);

$roomtypeThree = "SELECT * FROM roombook WHERE RoomType = 'Guest House'";
$roomtypeThreeSql = mysqli_query($conn, $roomtypeThree);
$roomtypeThreeRow = mysqli_num_rows($roomtypeThreeSql);

$roomtypeFour = "SELECT * FROM roombook WHERE RoomType = 'Single Room'";
$roomtypeFourSql = mysqli_query($conn, $roomtypeFour);
$roomtypeFourRow = mysqli_num_rows($roomtypeFourSql);

// income
$incomeSql = 'SELECT * FROM payment'; 
$result = mysqli_query($conn, $incomeSql);
$total = 0;
$char_data = "";

while($row = mysqli_fetch_array($result)) {
    $chart_data .= "{ date:'".$row["cout"]."', profit:".$row["finaltotal"]*10/100 ."}, ";
    $total = $total + $row['finaltotal']*10/100;
}

$chart_data = substr($chart_data, 0, -2);
?>
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
$chart_data = "";

while($row = mysqli_fetch_array($result)) {
    $chart_data .= "{ date:'".$row["cout"]."', profit:".$row["finaltotal"]*10/100 ."}, ";
    $total = $total + $row['finaltotal']*10/100;
}

$chart_data = substr($chart_data, 0, -2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dasboard</title>
    <link rel="stylesheet" href="./css/dashboard.css">
    <!-- chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div id="data-box">

        <div class="box room-book-box">
            <h2>Total Booked Room</h2>
            <h1><?php echo $roombookRow ?> / <?php echo $roomRow ?></h1>
        </div>

        <div class="box staff-box">
            <h2>Total Staff</h2>
            <h1><?php echo $staffRow?></h1>
        </div>

        <div class="box profit-box">
            <h2>Profit</h2>
            <h1><?php echo $total?> <span>&#8381;</span></h1>
        </div>
        
    </div>

    <div id="charts-box">

        <div class="booked-room-chart">
            <canvas id="booked-room-canvas"></canvas>
            <h3>Booked Room</h3>
        </div>

        <div class="profit-bars">
            <canvas id="profit-canvas"></canvas>
            <h3>Profit</h3>
        </div>

    </div>
</body>

<!-- BOOKED ROOMS CHART -->
<script>
    const labels = [
          'Superior Room',
          'Deluxe Room',
          'Guest House',
          'Single Room',
        ];
      
        const data = {
          labels: labels,
          datasets: [{
            label: 'My First dataset',
            backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(153, 102, 255, 1)',
            ],
            borderColor: 'black',
            data: [<?php echo $roomtypeOneRow ?>,<?php echo $roomtypeTwoRow ?>,<?php echo $roomtypeThreeRow  ?>,<?php echo $roomtypeFourRow ?>],
          }]
        };
  
        const doughnutchart = {
          type: 'doughnut',
          data: data,
          options: {}
        };
        
      const myChart = new Chart(
      document.getElementById('booked-room-canvas'),
      doughnutchart);

</script>

<script>
    const profitData = [<?php echo $chart_data; ?>];
    new Chart(document.getElementById('profit-canvas'), {
        type: 'bar',
        data: {
            labels: profitData.map(item => item.date),
            datasets: [{
                label: 'Profit',
                data: profitData.map(item => item.profit),
                backgroundColor: '#9966FF'
            }]
        }
    });
</script>
</html>
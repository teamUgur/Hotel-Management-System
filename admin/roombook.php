<?php

session_start();
include "../config.php"

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roombook</title>
    <link rel="stylesheet" href="./css/roombook.css">
    <!-- fontowesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- sweet alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    
    <!-- guestdetailpanel -->

    <div id="guestdetailpanel">
        <form action="" method="POST" class="guestdetailpanelform">

            <div class="header-part">
                <h3>Reservation</h3>
                <i class="fa-solid fa-circle-xmark" id="closeBtn"></i>
            </div>

            <div class="middle-part">

                <!-- FIRST COL -->

                <div class="guest-info">
                    <h4>Guest Information</h4>
                    <input type="text" name="Name" placeholder="Enter your full name">
                    <input type="email" name="Email" placeholder="Enter your email">
                    
                    <?php
                    $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
                    ?>

                    <select name="Country" class="selectinput">

                        <option value selected>Select your Country</option>
                    
                        <?php
                        foreach($countries as $key => $value):
                            echo '<option value="'.$value.'">'.$value.'</option>';
                            endforeach;
                        ?>

                    </select>
                    <input type="text" name="Phone" placeholder="Enter your phone number">
                </div>
                

                <div class="line"></div>

                <!-- SECOND COL -->

                <div class="reservation-info">
                    <h4>Reservation information</h4>

                    <select name="RoomType" id="type-of-room">
                        <option value selected>Type of Room</option>
                        <option value="Superior room">Superior room</option>
                        <option value="Deluxe room">Deluxe room</option>
                        <option value="Guest house">Guest house</option>
                        <option value="Single room">Single room</option>
                    </select>

                    <select name="Bed" id="bedding-type">
                        <option value selected>Begging Type</option>
                        <option value="single">Single</option>
                        <option value="double">Double</option>
                        <option value="triple">Triple</option>
                        <option value="quad">Quad</option>
                        <option value="none">None</option>
                    </select>

                    <select name="NoofRoom" id="number-of-room">
                        <option value selected>Number of room</option>
                        <option value="1">1</option>
                    </select>

                    <select name="Meal" id="meal">
                        <option value selected>Meal</option>
                        <option value="room-only">Room Only</option>
                        <option value="breakfast">Breakfast</option>
                        <option value="half-board">Half Board</option>
                        <option value="full-board">Full Board</option>
                    </select>

                    <div class="check-in-out">
                        <span id="check-in">
                            <label for="cin">Check In</label>
                            <input name="cin" type="date">
                        </span>

                        <span id="check-out">
                            <label for="cout">Check Out</label>
                            <input name="cout" type="date">
                        </span>
                    </div>
                </div>
            </div>

            <div class="footer">
                <button class="btn btn-success" name="guestdetailsubmit">Submit</button>
            </div>
        </form>
    </div>

        <!-- room availablity -->

        <?php

        // ROOM
        
        $roomSqlDb = 'SELECT * FROM room';
        $roomQueryDb = mysqli_query($conn, $roomSqlDb);

        $totalRooms = 0;
        $superiorRoom = 0;
        $deluxeRoom = 0;
        $singleRoom = 0;
        $guestRoom = 0;

        while($numberRowsRooms = mysqli_fetch_array($roomQueryDb)) {
            $totalRooms = $totalRooms + 1;
            $theRoom = $numberRowsRooms['type'];

            if ($theRoom == "Superior Room") {
                $superiorRoom = $superiorRoom + 1;
            }
            if ($theRoom == "Deluxe Room") {
                $deluxeRoom = $deluxeRoom + 1;
            }
            if ($theRoom == "Guest House") {
                $singleRoom = $singleRoom + 1;
            }
            if ($theRoom == "Single Room") {
                $guestRoom = $guestRoom + 1;
            }
        }

        // PAYMENT

        $paymentSqlDb = "SELECT * FROM payment";
        $paymentQueryDb = mysqli_query($conn, $paymentSqlDb);

        $totalPayment = 0;
        $superiorPayment = 0;
        $deluxePayment = 0;
        $singlePayment = 0;
        $guestPayment = 0;

        while($numberRowsPayment = mysqli_fetch_array($paymentQueryDb)) {
            $totalPayment = $totalPayment + 1;
            $thePayment = $numberRowsPayment['RoomType'];

            if ($thePayment == "Superior Room") {
                $superiorPayment = $superiorPayment + 1;
            }
            if ($thePayment == "Deluxe Room") {
                $deluxePayment = $deluxePayment + 1;
            }
            if ($thePayment == "Guest House") {
                $singlePayment = $singlePayment + 1;
            }
            if ($thePayment == "Single Room") {
                $guestPayment = $guestPayment + 1;
            }
        }

        // AVAILABILITY

        $availableOne = $superiorRoom - $superiorPayment;
        if($availableOne <= 0) {
            $availableOne = "No";
        }

        $availableTwo = $deluxeRoom - $deluxePayment;
        if($availableTwo <= 0) {
            $availableTwo = "No";
        }

        $availableThree = $singleRoom - $singlePayment;
        if($availableThree <= 0) {
            $availableThree = "No";
        }

        $availableFour = $guestRoom - $guestPayment;
        if($availableFour <= 0) {
            $availableFour = "No";
        }

        $availableFive = $totalRooms - $totalPayment;
        if($availableFive <= 0) {
            $availableFive = "No";
        }
        ?>

        <!-- room book php -->

        <?php

        if($_POST['guestdetailsubmit']) {
            $name = $_POST['Name'];
            $email = $_POST['Email'];
            $country = $_POST['Country'];
            $phone = $_POST['Phone'];
            $roomtype = $_POST['RoomType'];
            $bed = $_POST['Bed'];
            $meal = $_POST['Meal'];
            $noofroom = $_POST['NoofRoom'];
            $cin = $_POST['cin'];
            $cout = $_POST['cout'];


            if ($name == '' || $email == "" || $country == "") {
                echo "<script>swal({
                    title: 'Fill the proper details',
                    icon: 'error',
                });
                </script>";
            } else {
                $stat = "NotConfirm";
                $sql = "INSERT INTO roombook (Name, Email, Country, Phone, RoomType, Bed, Meal, NoofRoom, cin, cout, stat, nodays)
                VALUES ('$name', '$email', '$country', '$phone', '$roomtype', '$bed', '$meal', '$noofroom', '$cin', '$cout', '$stat', date_diff('$cout', '$cin'))";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    echo "<script>swal({
                        title: 'Reservation successful',
                        icon: 'success',
                    });
                    </script>";
                } else {
                    echo "<script>swal({
                        title: 'Something went wrong',
                        icon: 'error',
                    });
                    </script>";
                }
            }
        }

        ?>

        <!-- HTML for this page -->

        <div class="searchsection">
            <input type="text" name="search_bar" id="search_bar" placeholder="search..." onkeyup="searchFun()">
            <button class="adduser" id="adduser" onclick="adduseropen()"><i class="fa-solid fa-bookmark"></i> Add</button>
            <form action="./exportdata.php" method="post">
                <button class="exportexcel" id="exportexcel" name="exportexcel" type="submit"><i class="fa-solid fa-file-arrow-down"></i></button>
            </form>
        </div>

        <div class="roombooktable">

            <?php
            $roombooknums = "SELECT * FROM roombook";
            $resultRoomBook = mysqli_query($conn, $roombooknums);
            $numRowRoomBook = mysqli_num_rows($resultRoomBook);
            ?>

            <table class="table table-bordered" id="table-data">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Country</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Type of Room</th>
                    <th scope="col">Type of Bed</th>
                    <th scope="col">No of Room</th>
                    <th scope="col">Meal</th>
                    <th scope="col">Check-In</th>
                    <th scope="col">Check-Out</th>
                    <th scope="col">No of Day</th>
                    <th scope="col">Status</th>
                    <th scope="col" class="action">Action</th>
                </tr>
            </thead>

            <tbody>

            </tbody>
        </div>
</body>
</html>
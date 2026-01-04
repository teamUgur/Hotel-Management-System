<?php

include 'config.php';
session_start();

// page redirect
$usermail="";
$usermail=$_SESSION['usermail'];
if ($usermail == true){

} else{ 
  header("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ugur Hotel</title>
    <link rel="stylesheet" href="./admin/css/roombook.css">
    <link rel="stylesheet" href="./css/home.css">
</head>
<body>

    <nav>
        <img src="./img/logo.png" alt="logo" id="logo">
        <ul id="nav-bar">
            <li><a href="#firstsection">Home</a></li>
            <li><a href="#secondsection">Rooms</a></li>
            <li><a href="#thirdsection">Facilities</a></li>
            <li><a href="#fourthsection">Connect Us</a></li>
            <a href="./logout.php"><button class="btn btn-danger">Logout</button></a>
        </ul>

    </nav>

    <section id="firstsection">

        <div class="inner">
            <img src="./img/hotel 5.png" alt="hotel" id="main-start-img">
            <div id="welcome-line">
                <h1 class="welcometag">Welcome to heaven on earth</h1>
            </div>
        </div>

        <!-- bookbox -->

        <div id="guestdetailpanel">
            <form action="" method="POST" class="guestdetailpanelform">

                <div class="header-part">
                    <h3>Reservation</h3>
                    <i class="fa-solid fa-circle-xmark" onclick="closebox()"></i>
                </div>

                <div class="middle-part">

                    <h4>Guest Information</h4>
                    <input type="text" name="full-name" placeholder="Enter your full name">
                    <input type="email" name="email" placeholder="Enter your email">
                    
                    <?php
                    $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
                    ?>

                    <select name="countries" class="selectinput">
                        <option value selected>Select your Country</option>
                    </select>

                    <?php
                    foreach($countries as $key => $value):
                        echo '<option value="'.$value.'">'.$value.'</option>';
                        endforeach;
                    ?>

                    <input type="text" name="phone-number" placeholder="Enter your phone number">
                </div>

                <div class="line"></div>

                <div class="reservation-info">
                    <h4>Reservation information</h4>

                    <select name="type-of-room" id="type-of-room">
                        <option value selected>Type of Room</option>
                        <option value="Superior room">Superior room</option>
                        <option value="Deluxe room">Deluxe room</option>
                        <option value="Guest house">Guest house</option>
                        <option value="Single room">Single room</option>
                    </select>

                    <select name="bedding-type" id="bedding-type">
                        <option value selected>Begging Type</option>
                        <option value="single">Single</option>
                        <option value="double">Double</option>
                        <option value="triple">Triple</option>
                        <option value="quad">Quad</option>
                        <option value="none">None</option>
                    </select>

                    <select name="number-of-room" id="number-of-room">
                        <option value selected>Number of room</option>
                        <option value="1">1</option>
                    </select>

                    <select name="meal" id="meal">
                        <option value selected>Meal</option>
                        <option value="room-only">Room Only</option>
                        <option value="breakfast">Breakfast</option>
                        <option value="half-board">Half Board</option>
                        <option value="full-board">Full Board</option>
                    </select>

                    <div>
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
                <div class="footer">
                    <button class="btn btn-success" name="guestdetailsubmit">Submit</button>
                </div>
            </form>

            <!-- ==== room book php ====-->
        </div>

    </section>

</body>
</html>
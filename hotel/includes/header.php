<?php
if ($_SESSION['id']) { ?>
    <div>
        <a href="#" class="logo">Hotel Management System</a>
        <span class="menu-btn"><i class="fa fa-bars"></i></span>
        <ul class="ts-profile-nav">
            <li class="ts-account">
                <a href="#"><img src="../img/avatar.png" class="ts-avatar hidden-side" alt="">Account <i class="fa fa-angle-down
                hidden-side"></i></a>
                <ul>
                    <li><a href="../my-rofile.php">My account</a></li>
                    <li><a href="../logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
<?php } else { ?>
    <a href="#" class="logo">Hotel Management System</a>
    <span class="menu-btn"><i class="fa fa-bars"></i></span>
<?php } ?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sidebar</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
	<style>

		* {
			margin: 0;
            padding: 0;
			box-sizing: border-box;
			font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
		}

		li {
			list-style-type: none;
			text-decoration: none;
			/* margin: 35px 0 35px 0; */
		}

		i {
			margin: 0 20px;
			color: rgb(79, 79, 79);
			padding: 20px 5px;
		}

		a {
			text-decoration: none;
			color: white;
		}

		nav {
			background-color: rgba(37, 37, 37, 1);
			width: 275px;
			height: 100vh;
			position: fixed;
		}

		.ts-sidebar-menu a i {
			width: 20px;             
			text-align: center;      
		}

		.ts-label {
			margin: 0;
			color: white;
			padding: 30px 0 0 20px;
			margin-bottom: 15px;
		}

		li:hover:not(.ts-label) {
			background-color: rgb(79, 79, 79);
		}

		li:hover a i {
			color: rgba(37, 37, 37, 1);
		}


	</style>
</head>
<body>
	<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">
			
				<li class="ts-label">Main</li>
				<?PHP if(isset($_SESSION['id']))
				{ ?>
					<li><a href="../dashboard.php"><i class="fa fa-desktop"></i>Dashboard</a></li>
					<li><a href="../book-hotel.php"><i class="fa fa-file-o"></i>Book Hostel</a></li>
					<li><a href="../room-details.php"><i class="fa fa-file-o"></i>Room Details</a></li>
					<li><a href="../register-complaint.php"><i class="fa fa-file"></i> Complaint Registration</a></li>
					<li><a href="../my-complaints.php"><i class="fa fa-files-o"></i> Registered Complaints </a></li>
					<li><a href="../feedback.php"><i class="fa fa-file"></i> Feedback </a></li>
					<li><a href="../my-profile.php"><i class="fa fa-user"></i> My Profile </a></li>
					<li><a href="../change-password.php"><i class="fa fa-files-o"></i>Change Password</a></li>
					<li><a href="../access-log.php"><i class="fa fa-file-o"></i>Access log</a></li>
				<?php } else { ?>
				
				<li><a href="/hotel/register.php"><i class="fa-regular fa-file"></i> User Registration</a></li>
				<li><a href="../index.php"><i class="fa fa-users"></i> User Login</a></li>
				<li><a href="../admin/"><i class="fa fa-user"></i> Admin Login</a></li> <!-- CHANGE LOCATION! -->
				<?php } ?>

			</ul>
		</nav>
</body>
</html>


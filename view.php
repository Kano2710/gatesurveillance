<?php
session_start();
require 'connectDB.php';
?>
<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Users Logs</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<link href="css/main.css" rel='stylesheet' type='text/css' />
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>

<body>


	<nav class="navbar navbar-expand-lg navbar-light navbar-inverse">
		<a class="navbar-brand" href="entry_exit.php">Go Buddy</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="entry_exit.php">Entry - Exit </a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="view.php">View <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="registration.php">Registration</a>
				</li>
			</ul>
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="logout.php">Log Out</a>
				</li>
			</ul>
		</div>
	</nav>



	<div class="head">
		<h3 align="center">Log View</h3>
	</div>
	<div>

		<table id='table'>
			<TR>
				<TH>Name</TH>
				<TH>CardID</TH>
				<TH>Gr No.</TH>
				<TH>MobileNumber</TH>
				<TH>Date</TH>
				<TH>Time In</TH>
				<TH>Time Out</TH>
				<TH>Vehicle Registration Number</TH>
			</TR>

			<?php
			//Connect to database
			require 'connectDB.php';
			if (isset($_SESSION["id"])) {
				$date = date('d-m-Y');
				$timein = date('H:i:s');
				$timeout = date('H:i:s');
				$sql = "SELECT * FROM logs_show ORDER BY id DESC";
				$result = mysqli_query($conn, $sql);

				if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
						?>
						<TR>
							<TD>
								<?php echo $row['username']; ?>
							</TD>
							<TD>
								<?php echo $row['CardID']; ?>
							</TD>
							<TD>
								<?php echo $row['GRNO']; ?>
							</TD>
							<TD>
								<?php echo $row['MobileNumber']; ?>
							</TD>
							<TD>
								<?php echo $row['DateLog']; ?>
							</TD>
							<TD>
								<?php echo $row['TimeIn']; ?>
							</TD>
							<TD>
								<?php echo $row['TimeOut']; ?>
							</TD>
							<TD>
								<?php echo $row['VehicleRegistrationNumber']; ?>
							</TD>
						</TR>
						<?php
					}
				}

			} else
				header("location: index.php");
			exit;
			?>
		</table>
		<div id="cards" class="cards">
		</div>
</body>

</html>

<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha1256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	crossorigin="anonymous">
	</script>
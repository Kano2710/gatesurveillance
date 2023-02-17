<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Entry Exit</title>


	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<link href="css/main.css" rel='stylesheet' type='text/css' />
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light navbar-inverse">
		<a class="navbar-brand" href="#">Go Buddy</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="entry_exit.php">Entry - Exit <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="view.php">View</a>
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
		<h3 align="center">Entry - Exit</h3>
	</div>
	<div>
		<form method="POST">
			<label><b>Card ID</b></label>

			<input type="text" autofocus="autofocus" name="CardID">
			<label><b>GRNO</b></label>

			<input type="text" name="GRNO">
			<button type="submit" class="registerbtn">Submit</button>

		</form>
	</div>
	</br>
	<div>
		<TABLE id='table'>


			<?php
			session_start();
			if (isset($_SESSION["id"])) {
				date_default_timezone_set('Asia/Kolkata');
				require 'connectDB.php';

				$CardID = isset($_POST['CardID']) ? $_POST['CardID'] : '';
				$sql = "SELECT * FROM vehicle WHERE CardID='$CardID'";
				$result = mysqli_query($conn, $sql);

				$GRNO = isset($_POST['GRNO']) ? $_POST['GRNO'] : '';
				$sql1 = "SELECT * FROM vehicle WHERE GRNO='$GRNO'";
				$result1 = mysqli_query($conn, $sql1);

				$timestamp = date('d-m-Y H:i:s');


				if ((mysqli_num_rows($result) > 0) || (mysqli_num_rows($result1) > 0)) {
					?>
					<TR>
						<TH>Gr No</TH>
						<TH>Card ID</th>
						<TH>Name</TH>
						<TH>Vehicle Registration Number</TH>
						<TH>Mobile Number</TH>
						<TH>Vehicle Type</TH>
						<TH>Gender</TH>
						<TH>Time</TH>
					</TR>
					<?php
					while (($row = mysqli_fetch_assoc($result)) || ($row = mysqli_fetch_assoc($result1))) {
						?>
						<TR>
							<TD>
								<?php echo $row['GRNO']; ?>
							</TD>
							<TD>
								<?php echo $row['CardID']; ?>
							</TD>
							<TD>
								<?php echo $row['username']; ?>
							</TD>
							<TD>
								<?php echo $row['VehicleRegistrationNumber']; ?>
							</TD>
							<TD>
								<?php echo $row['MobileNumber']; ?>
							</TD>
							<TD>
								<?php echo $row['VehicleType']; ?>
							</TD>
							<TD>
								<?php echo $row['gender']; ?>
							</TD>
							<TD>
								<?php echo $timestamp; ?>
							</TD>
						</TR>

						<TR>
							<TD colspan="2">
								<?php echo "<img src='photos/$row[image]' height='250px' width='200px'>"; ?>
							</TD>
						</TR>
						<?php
					}
				} else
					echo "<h1>No Record Found</h1>";


				?>
			</TABLE>

			<?php
			$date = date('Y-m-d');
			$timein = date('H:i:s');
			$timeout = date('H:i:s');








			$q = "SELECT * FROM logs WHERE CardID='$CardID'";
			$qdesh = mysqli_query($conn, $q);


			$q1 = "SELECT * FROM logs WHERE GRNO='$GRNO'";
			$q1desh = mysqli_query($conn, $q1);
			$r = mysqli_fetch_assoc($qdesh);
			$r1 = mysqli_fetch_assoc($q1desh);



			if ((mysqli_num_rows($qdesh) > 0) || (mysqli_num_rows($q1desh) > 0)) {

				while (($r['flag'] == 0) || ($r1['flag'] == 0)) {

					//  if(mysqli_query($conn,"SELECT flag FROM logs WHERE flag = 0"))
					//  {
					$sql4 = "UPDATE logs SET TimeOut = '$timeout', flag = 1 WHERE TimeOut IS NULL AND CardID='$CardID'";
					$result4 = mysqli_query($conn, $sql4) or die("error" . $conn->error);


					$sql5 = "UPDATE logs SET TimeOut = '$timeout', flag = 1 WHERE TimeOut IS NULL AND GRNO='$GRNO'";
					$result5 = mysqli_query($conn, $sql5) or die("error" . $conn->error);

					$sql14 = "UPDATE logs_show SET TimeOut = '$timeout', flag = 1 WHERE TimeOut IS NULL AND CardID='$CardID'";
					$result14 = mysqli_query($conn, $sql14) or die("error" . $conn->error);


					$sql15 = "UPDATE logs_show SET TimeOut = '$timeout', flag = 1 WHERE TimeOut IS NULL AND GRNO='$GRNO'";
					$result15 = mysqli_query($conn, $sql15) or die("error" . $conn->error);

					$query14 = "DELETE FROM logs WHERE CardID='$CardID' LIMIT 1";
					$qr14 = mysqli_query($conn, $query14) or die("error" . $conn->error);
					$query15 = "DELETE FROM logs WHERE GRNO='$GRNO' LIMIT 1";
					$qr15 = mysqli_query($conn, $query15) or die("error" . $conn->error);
					exit();
					//  }
		
				}
			} else {


				$sql2 = "INSERT INTO logs (username,VehicleRegistrationNumber, MobileNumber, CardID, GRNO, DateLog, TimeIn,flag)  SELECT username,VehicleRegistrationNumber, MobileNumber, CardID, GRNO, '$date', '$timein','$f' FROM vehicle WHERE CardID='$CardID'";
				$result2 = mysqli_query($conn, $sql2) or die("error" . $conn->error);


				$sql3 = "INSERT INTO logs (username,VehicleRegistrationNumber, MobileNumber, CardID, GRNO, DateLog, TimeIn,flag)  SELECT username,VehicleRegistrationNumber, MobileNumber, CardID, GRNO, '$date', '$timein','$f' FROM vehicle where GRNO='$GRNO'";
				$result3 = mysqli_query($conn, $sql3) or die("error" . $conn->error);

				$sql12 = "INSERT INTO logs_show (username,VehicleRegistrationNumber, MobileNumber, CardID, GRNO, DateLog, TimeIn,flag)  SELECT username,VehicleRegistrationNumber, MobileNumber, CardID, GRNO, '$date', '$timein','$f' FROM vehicle WHERE CardID='$CardID'";
				$result12 = mysqli_query($conn, $sql12) or die("error" . $conn->error);


				$sql13 = "INSERT INTO logs_show (username,VehicleRegistrationNumber, MobileNumber, CardID, GRNO, DateLog, TimeIn,flag)  SELECT username,VehicleRegistrationNumber, MobileNumber, CardID, GRNO, '$date', '$timein','$f' FROM vehicle where GRNO='$GRNO'";
				$result13 = mysqli_query($conn, $sql13) or die("error" . $conn->error);
				exit();

			}



				// 		if(($r['flag'] == "" ) || ($r1['flag'] =="" ))
				// 		{
				// 		    $id1 = $conn->insert_id;
				// 			$sql2 = "INSERT INTO logs (username,VehicleRegistrationNumber, MobileNumber, CardID, GRNO, DateLog, TimeIn)  SELECT username,VehicleRegistrationNumber, MobileNumber, CardID, GRNO, '$date', '$timein' FROM vehicle WHERE CardID='$CardID'";
				// 			$result2=mysqli_query($conn,$sql2)  or die("error".$conn->error);
			


				// 			$sql3 = "INSERT INTO logs (username,VehicleRegistrationNumber, MobileNumber, CardID, GRNO, DateLog, TimeIn)  SELECT username,VehicleRegistrationNumber, MobileNumber, CardID, GRNO, '$date', '$timein' FROM vehicle where GRNO='$GRNO'";
				// 			$result3=mysqli_query($conn,$sql3)  or die("error".$conn->error);
			
				// 		}
			




			} else
				header("location: index.php");
			exit;

			?>
	</div>

	<?php
	mysqli_close($conn); // Closing Connection with Server
	session_destroy();
	?>
	<div id="cards" class="cards">
	</div>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha1256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	crossorigin="anonymous">
	</script>
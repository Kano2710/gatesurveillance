<?php
session_start();
require 'connectDB.php';
if (isset($_SESSION["id"])) {

	?>
	<!DOCTYPE html>
	<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>User Reg</title>
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
					<li class="nav-item">
						<a class="nav-link" href="view.php">View </a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="registration.php">Registration <span class="sr-only">(current)</span></a>
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
			<h3 align="center">User Registration</h3>
		</div>
		<div>
			<div>
				<form method="POST" action="insert.php" enctype="multipart/form-data">

					<div class="container">

						<p>Please fill this form to Register a Vehicle</p>
						<hr>

						<label><b>
								<h4>Card ID</h4>
							</b></label>
						<input type="number" class="form-control" placeholder="Enter Card Id" autofocus="autofocus"
							name="CardID" required>

						<label><b>
								<h4>Gr No.</h4>
							</b></label>
						<input type="number" class="form-control" placeholder="Enter Gr No" name="GRNO" required>

						<label><b>
								<h4>Name</h4>
							</b></label>
						<input type="text" class="form-control" placeholder="Enter Name" name="username" maxlength="50"
							title="Only name can be filled" required>

						<label><b>
								<h4>Vehicle Registration Number</h4>
							</b></label>
						<input type="text" class="form-control" pattern="[A-Za-z]{2}[0-9]{2}[A-Za-z]{2}[0-9]{4}"
							title="Please, enter valid registration number" placeholder="Enter vehicle registration number"
							minlength="10" maxlength="10" name="VehicleRegistrationNumber" required>
						<div class="invalid-feedback">
							Please enter a message in the textarea.
						</div>

						<label><b>
								<h4>Mobile Number</h4>
							</b></label>
						<input type="text" class="form-control" pattern="[6-9]{1}[0-9]{9}" placeholder="Enter Mobile Number"
							name="MobileNumber" title="Please, enter valid mobile Number" required>

						<div class="row">
							<legend class=" col-sm-3 pt-0"><b>
									<h4>Gender</h4>
								</b></legend>
							<div>
								<input type="radio" name="gender" value="male" checked>
								Male
								<input type="radio" name="gender" value="female">
								Female
							</div>
						</div>

						<div class="row">
							<legend class="col-form-label col-sm-3 pt-0"><b>
									<h4>Select Vehicle Types</h4>
								</b></legend>
							<div>
								<input type="radio" name="VehicleType" value="2" checked>2 Wheeler
								<input type="radio" name="VehicleType" value="4">4 Wheeler
								<input type="radio" name="VehicleType" value="none">None
							</div>
						</div>
						<input type="file" name="image" />

						<hr>
						<input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info"
							onclick="myFunction()" />


					</div>
				</form>
			</div>



	</body>

	</html>

	<?php
} else
	header("location: index.php");
exit;
?>

<?php
mysqli_close($conn); // Closing Connection with Server
session_destroy();
?>
<script>
	$(document).ready(function () {
		$('#insert').click(function () {
			var image_name = $('#image').val();
			if (image_name == '') {
				alert("Please Select Image");
				return false;
			}
			else {
				var extension = $('#image').val().split('.').pop().toLowerCase();
				if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
					alert('Invalid Image File');
					$('#image').val('');
					return false;
				}
			}
		});
	});  
</script>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha1256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	crossorigin="anonymous">
	</script>
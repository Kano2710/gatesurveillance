<?php
if ((isset($_POST["insert"])) && (isset($_FILES['image']))) {
	$name = $_POST['username'];
	$VehicleRegistrationNumber = $_POST['VehicleRegistrationNumber'];
	$MobileNumber = $_POST['MobileNumber'];
	$CardID = $_POST['CardID'];
	$GRNO = $_POST['GRNO'];
	$VehicleType = $_POST['VehicleType'];
	$gender = $_POST['gender'];

	$errors = array();
	$file_name = $_FILES['image']['name'];
	$file_size = $_FILES['image']['size'];
	$file_tmp = $_FILES['image']['tmp_name'];
	$file_type = $_FILES['image']['type'];



	if (empty($errors) == true) {
		move_uploaded_file($file_tmp, "photos/" . $file_name);
		echo "Success";
	} else {
		print_r($errors);
	}


	if (!empty($name) && !empty($VehicleRegistrationNumber) && !empty($MobileNumber) && !empty($CardID) && !empty($VehicleType) && !empty($gender)) {
		$host = "localhost";
		$user = "root";
		$db = "gobuddy";
		$pass = "";

		$conn = mysqli_connect($host, $user, $pass, $db);

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		$INSERT = "INSERT INTO vehicle (GRNO, username, VehicleRegistrationNumber, MobileNumber, CardID, VehicleType, gender,image) VALUES ('$GRNO', '$name', '$VehicleRegistrationNumber', '$MobileNumber', '$CardID', '$VehicleType', '$gender','$file_name')";

		mysqli_query($conn, $INSERT) or die("error   " . $conn->error);

		$INSERT1 = "INSERT INTO logs (GRNO, CardID) VALUES ('$GRNO', '$CardID')";

		mysqli_query($conn, $INSERT1) or die("error   " . $conn->error);
		echo $INSERT;

		mysqli_close($conn);

	}
} else {
	echo "All fields are required!!";
	die();

}

header('location: registration.php');
exit;
?>
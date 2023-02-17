<?php
error_reporting(0);
session_start();
require_once("class/dbo.class.php");

$name = $_POST['username'];
$pass = $_POST['userpassword'];
$log_q = "SELECT * FROM admin WHERE username='$name'";
$log_res = $db->get($log_q);
$data = array();

if (count($log_res) > 0) {
	if ($log_res[0]['userpassword'] == $pass) {
		$data['status'] = true;
		$data['msg'] = "Authenticate";
		$_SESSION["id"] = $name;
		echo json_encode($data);
		exit;
	} else {
		$data['status'] = false;
		$data['msg'] = "Wrong Userid or  Password";
		echo json_encode($data);
		exit;
	}


} else {
	$data['status'] = false;
	$data['msg'] = "Wrong userid or password";
	echo json_encode($data);
	exit;

}

ob_end_flush();
exit();
?>
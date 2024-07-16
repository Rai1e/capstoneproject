<?php
require_once'admin/class.php';

if(ISSET($_POST['register'])){
	$firstname=htmlspecialchars($_POST['firstname']);
	$lastname=htmlspecialchars($_POST['lastname']);
	$email=$_POST['email'];
	$password=md5($_POST['password']);
	$phone_no=$_POST['phone_no'];
	$status=0;
	$db = new db_class();
	
	$db->signup($firstname,$lastname,$email,$password,$phone_no,$status);
	
	
	echo "<script>window.location='index.php'</script>";
}
?>
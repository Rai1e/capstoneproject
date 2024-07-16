<?php
	require_once'admin/class.php';
	session_start();
	
	if(ISSET($_POST['login'])){
	
		$db=new db_class();
		$email=$_POST['email'];
		$password=md5($_POST['password']);
		$get_id=$db->login($email, $password);
		
		echo $get_id['count'];
		
		if($get_id['count'] > 0){
			$_SESSION['user_id']=$get_id['user_id'];
			unset($_SESSION['user_message']);
			echo"<script>window.location='home.php'</script>";
		}else{
			$_SESSION['user_message']="Invalid Username or Password";
			echo"<script>window.location='index.php'</script>";
		}
	}
?>
<?php
require_once'admin/class.php';

if(ISSET($_POST['submit-feeback'])){
	$subject=$_POST['subject'];
	$message=$_POST['message'];
	$user_id=$_POST['user_id'];
	
	$db=new db_class();
	
	$db->submitFeedback($subject, $message, $user_id);
	
	echo "<script>window.location='feedbackResult.php'</script>";
}

?>
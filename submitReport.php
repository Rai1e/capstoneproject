<?php
date_default_timezone_set("Etc/GMT-8");
require_once'admin/class.php';
	if(ISSET($_POST['submit-report'])){
		$db = new db_class();
		
		
		$ticket_no = mt_rand(100000000, 999999999);

		
		if($db->checkTicket($ticket_no) == 1){
			$ticket_no = mt_rand(100000000, 999999999);
		}
		
		
		$subject=$_POST['subject'];
		$user_id=$_POST['user_id'];
		$message=$_POST['message'];
		$report_category=$_POST['report_category'];
		$date = date("Y-m-d H:i:s");
		$location = "user_files/".$user_id."/".$ticket_no;
		$address=$_POST['user_add'];
		$status="Reviewing";
	
		if(!file_exists("$location")){
			mkdir($location, 0777, true);
		}
		
		
		/* IMAGE UPLOAD */
		
		if(!empty($_FILES['reportImage']['tmp_name']) || is_uploaded_file($_FILES['reportImage']['tmp_name'])){	
			foreach($_FILES['reportImage']['tmp_name'] as $key =>$tmp_name){
				$image_name = $_FILES['reportImage']['name'][$key];
				$image_temp = $_FILES['reportImage']['tmp_name'][$key]; 
				move_uploaded_file($image_temp, $location."/".$image_name);
				$image_type="image";
				$db->submitFile($image_name,$image_type,$ticket_no,$user_id);
			}
			
			
		}
		
		/* VIDEO UPLOAD */
		
		if(!empty($_FILES['reportVideo']['tmp_name']) || is_uploaded_file($_FILES['reportVideo']['tmp_name'])){	
			$video_name=$_FILES['reportVideo']['name'];
			$video_temp=$_FILES['reportVideo']['tmp_name'];
			move_uploaded_file($video_temp, $location."/".$video_name);
			$video_type="video";
			$db->submitFile($video_name,$video_type,$ticket_no,$user_id);
		}
		
		
		$db->submitReport($ticket_no,$subject,$message,$report_category,$address,$date,$status,$user_id);
		
		echo "<script>window.location='report_status.php'</script>";
	}
?>
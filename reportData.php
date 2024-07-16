<?php
	require_once'admin/class.php';
	
	
	$data = array();
 	
	$db = new db_class();
	
	$user_id = $_GET['user_id'];
	
	$tbl_report=$db->displayUserReport($user_id);
											
	while($fetch=$tbl_report->fetch_array()){
		$data[] = $fetch;
	}
	
	echo json_encode($data);

?>
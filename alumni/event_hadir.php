<?php
	include("sess_check.php");
		$id = $_GET['eve'];	
		$nis = $sess_nis;
		$sql	 = "INSERT INTO temp_event(id_event,nis)VALUES('$id','$nis')";
		$ress = mysqli_query($conn, $sql);
		header("location: event_baru.php?act=update&msg=success");
?>
<?php
	include("sess_check.php");
		$id = $_GET['eve'];	
		$stt = "Open";
		$sql = "UPDATE event SET status='". $stt ."' WHERE id_event='". $id ."'";
		$ress = mysqli_query($conn, $sql);			
		$sqltemp = "UPDATE temp_event SET stts='". $stt ."' WHERE id_event='". $id ."'";
		$resstemp = mysqli_query($conn, $sqltemp);			
		header("location: event.php?act=update&msg=success");
?>
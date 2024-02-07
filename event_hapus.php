<?php
	include("sess_check.php");
		$id = $_GET['eve'];	
		$sql = "DELETE FROM event WHERE id_event='". $id ."'";
		$ress = mysqli_query($conn, $sql);
		$sqltemp = "DELETE FROM temp_event WHERE id_event='". $id ."'";
		$resstemp = mysqli_query($conn, $sqltemp);
		header("location: event.php?act=delete&msg=success");
?>
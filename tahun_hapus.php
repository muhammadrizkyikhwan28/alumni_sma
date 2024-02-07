<?php
	include("sess_check.php");
		$id = $_GET['thn'];	
		$sql = "DELETE FROM tahun WHERE id_thn='". $id ."'";
		$ress = mysqli_query($conn, $sql);
		header("location: tahun.php?act=delete&msg=success");
?>
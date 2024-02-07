<?php
	include("sess_check.php");
	
	// query database memperbarui data pada database
	if(isset($_POST['perbarui'])) {
		$nis=$_POST['nis'];
		$cekfoto=$_FILES["foto"]["name"];
		$foto=substr($_FILES["foto"]["name"],-5);
		$newfoto = "foto".$nis.$foto;
		move_uploaded_file($_FILES["foto"]["tmp_name"],"../foto/".$newfoto);
		$sql = "UPDATE alumni SET foto='". $newfoto ."'	WHERE nis='". $nis ."'";
		$ress = mysqli_query($conn, $sql);
		header("location: pengaturan_ubah.php?act=update&msg=success");
	}
?>
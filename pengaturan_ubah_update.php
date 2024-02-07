<?php
	include("sess_check.php");
	
	// query database memperbarui data pada database
	if(isset($_POST['perbarui'])) {
		$id=$_POST['id'];
		$cekfoto=$_FILES["foto"]["name"];
		$foto=substr($_FILES["foto"]["name"],-5);
		$newfoto = "foto".$id.$foto;
		move_uploaded_file($_FILES["foto"]["tmp_name"],"foto/".$newfoto);
		$sql = "UPDATE admin SET foto_adm='". $newfoto ."'	WHERE id_adm='". $id ."'";
		$ress = mysqli_query($conn, $sql);
		header("location: pengaturan_ubah.php?act=update&msg=success");
	}
?>
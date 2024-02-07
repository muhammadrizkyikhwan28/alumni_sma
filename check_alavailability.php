<?php 
require_once("dist/config/koneksi.php");
// code user username availablity
if(!empty($_POST["nis"])) {
	$nis= $_POST["nis"];
	$sql = "SELECT * FROM alumni WHERE nis='$nis'";
	$query = mysqli_query($conn,$sql);
	if(mysqli_num_rows($query)>0){
		echo "<span style='color:red'> NIS sudah terdaftar.</span>";
		echo "<script>$('#submit').prop('disabled',true);</script>";
	}else{
		echo "<span style='color:green'> NIS bisa digunakan.</span>";
		echo "<script>$('#submit').prop('disabled',false);</script>";
	}
}

?>

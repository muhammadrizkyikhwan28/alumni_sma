<?php
include("sess_check.php");

// query database memasukan data ke database
if (isset($_POST['simpan'])) {
	$nis = $_POST['nis'];
	$nama = $_POST['nama'];
	$id_thn = $_POST['id_thn'];
	$univer = $_POST['univer'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$no_wa = $_POST['no_wa'];
	$pekerjaan = $_POST['pekerjaan'];
	$alamat = $_POST['alamat'];
	$foto = $_POST['foto'];
	$alumni_kelas = $_POST['alumni_kelas'];
	$prestasi = $_POST['prestasi'];
	$jurusan = $_POST['jurusan'];
	$alkerja = $_POST['alkerja'];
	$ig = $_POST['ig'];
	$fb = $_POST['fb'];
	$sosmed = $_POST['sosmed'];
	$foto = $_POST['foto'];


	$sqlcek = "SELECT * FROM alumni WHERE nis='$nis'";
	$ress = mysqli_query($conn, $sqlcek);
	$rows = mysqli_num_rows($ress);
	if ($rows < 1) {
		$sql = "INSERT INTO alumni (nis,nama,id_thn,univer,tgl_lahir,no_wa,pekerjaan,alamat,foto,alumni_kelas,prestasi,jurusan,alkerja,ig,fb,sosmed)
					VALUES('$nis','$nama','$id_thn','$univer','$tgl_lahir','$no_wa','$pekerjaan','$alamat','$foto','$alumni_kelas','$prestasi','$jurusan','$alkerja','$ig','$fb','$sosmed')";
		$ress = mysqli_query($conn, $sql);
		header("location: alumni.php?act=add&msg=success");
	} else {
		header("location: alumni_tambah.php?act=add&msg=double");
	}
}

<?php
	// memulai session
	session_start();
	// membaca nilai variabel session 
	$chk_sess = $_SESSION['alumni'];
	// memanggil file koneksi
	include("../dist/config/koneksi.php");
	include("../dist/config/library.php");
	// mengambil data pengguna dari tabel pengguna
	$sql_sess = "SELECT * FROM alumni WHERE nis='". $chk_sess ."'";
	$ress_sess = mysqli_query($conn, $sql_sess);
	$row_sess = mysqli_fetch_array($ress_sess);
	// menyimpan id_pengguna yang sedang login
	$sess_nis = $row_sess['nis'];
	$sess_alumniname = $row_sess['nama'];
	$sess_alumnifoto = $row_sess['foto'];
	$sess_alumnithn = $row_sess['id_thn'];
	// mengarahkan ke halaman login.php apabila session belum terdaftar
	if(! isset($chk_sess)) {
		header("location: ../login.php?login=false");
	}
?>
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
	$alumni_kelas = $_POST['alumni_kelas'];
	$prestasi = $_POST['prestasi'];
	$jurusan = $_POST['jurusan'];
	$alkerja = $_POST['alkerja'];
	$ig = $_POST['ig'];
	$fb = $_POST['fb'];
	$sosmed = $_POST['sosmed'];

	// Proses unggah foto
	$fotoName = $_FILES['foto']['name'];
	$fotoTemp = $_FILES['foto']['tmp_name'];
	$fotoPath = "foto/" . $fotoName;

	// Cek apakah NIS sudah ada
	$sqlcek = "SELECT * FROM alumni WHERE nis=?";
	$stmt = mysqli_prepare($conn, $sqlcek);
	mysqli_stmt_bind_param($stmt, "s", $nis);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_store_result($stmt);
	$rows = mysqli_stmt_num_rows($stmt);

	if ($rows < 1) {
		// Query untuk memasukkan data ke dalam tabel
		$sql = "INSERT INTO alumni (nis, nama, id_thn, univer, tgl_lahir, no_wa, pekerjaan, alamat, foto, alumni_kelas, prestasi, jurusan, alkerja, ig, fb, sosmed)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$stmt = mysqli_prepare($conn, $sql);
		mysqli_stmt_bind_param($stmt, "ssssssssssssssss", $nis, $nama, $id_thn, $univer, $tgl_lahir, $no_wa, $pekerjaan, $alamat, $fotoPath, $alumni_kelas, $prestasi, $jurusan, $alkerja, $ig, $fb, $sosmed);
		mysqli_stmt_execute($stmt);

		// Pindahkan file foto ke lokasi yang diinginkan
		if (move_uploaded_file($fotoTemp, $fotoPath)) {
			header("location: alumni.php?act=add&msg=success");
		} else {
			echo "Maaf, terjadi kesalahan saat mengunggah foto.";
		}
	} else {
		header("location: alumni_tambah.php?act=add&msg=double");
	}
}

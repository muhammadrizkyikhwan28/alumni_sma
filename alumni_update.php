<?php
include("sess_check.php");

// query database memperbarui data pada database
if (isset($_POST['perbarui'])) {
	$nislama = $_POST['nislama'];
	$nis = $_POST['nis'];
	$nama = $_POST['nama'];
	$id_thn = $_POST['id_thn'];
	$alumni_kelas = $_POST['alumni_kelas'];
	$univer = $_POST['univer'];
	$jurusan = $_POST['jurusan'];
	$pekerjaan = $_POST['pekerjaan'];
	$alkerja = $_POST['alkerja'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$no_wa = $_POST['no_wa'];
	$prestasi = $_POST['prestasi'];
	$alamat = $_POST['alamat'];
	$ig = $_POST['ig'];
	$fb = $_POST['fb'];
	$sosmed = $_POST['sosmed'];
	// Add other fields for editing
	$foto = $_FILES['foto']['name'];

	// Memeriksa apakah ada file foto yang diunggah
	if (!empty($foto)) {
		$foto_temp = $_FILES['foto']['tmp_name'];
		$foto_path = "foto/" . $foto;

		// Pindahkan file foto yang diunggah ke folder 'foto'
		move_uploaded_file($foto_temp, $foto_path);
	}

	// Membuat query berdasarkan kondisi
	if (!empty($nis)) {
		$sqlcek = "SELECT * FROM alumni WHERE nis='$nis'";
		$ress = mysqli_query($conn, $sqlcek);
		$rows = mysqli_num_rows($ress);
		if ($rows < 1) {
			$sql = "UPDATE alumni SET
                    nis='" . $nis . "',
                    nama='" . $nama . "',
                    id_thn='" . $id_thn . "',
					alumni_kelas='". $alumni_kelas . "',
					univer='". $univer . "',
					jurusan='". $jurusan . "',
					pekerjaan='". $pekerjaan . "',
					alkerja='". $alkerja . "',
					tgl_lahir='". $tgl_lahir . "',
					no_wa='". $no_wa . "',
					prestasi='". $prestasi . "',
					alamat='". $alamat . "',
					ig='". $ig . "',
					fb='". $fb . "',
					sosmed='". $sosmed . "',
                    foto='" . "foto/" . $foto . "'
                    WHERE nis='" . $nislama . "'";
			$ress = mysqli_query($conn, $sql);
			header("location: alumni.php?act=update&msg=success");
		} else {
			header("location: alumni_edit.php?nis=$nislama&act=add&msg=double");
		}
	} else {
		$sql = "UPDATE alumni SET
                nama='" . $nama . "',
                id_thn='" . $id_thn . "',
				alumni_kelas='". $alumni_kelas . "',
				univer='". $univer . "',
				jurusan='". $jurusan . "',
				pekerjaan='". $pekerjaan . "',
				alkerja='". $alkerja . "',
				tgl_lahir='". $tgl_lahir . "',
				no_wa='". $no_wa . "',
				prestasi='". $prestasi . "',
				alamat='". $alamat . "',
				ig='". $ig . "',
				fb='". $fb . "',
				sosmed='". $sosmed . "',
                foto='" . "foto/" . $foto . "'
                WHERE nis='" . $nislama . "'";
		$ress = mysqli_query($conn, $sql);
		header("location: alumni.php?act=update&msg=success");
	}
}

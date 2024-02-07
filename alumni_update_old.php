<?php
	include("sess_check.php");
	
	// query database memperbarui data pada database
	if(isset($_POST['perbarui'])) {
		$nislama = $_POST['nislama'];
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
		
		if($foto!=""){
			$sqlcek = "SELECT * FROM alumni WHERE nis='$nis'";
			$ress = mysqli_query($conn, $sqlcek);
			$rows = mysqli_num_rows($ress);
			if($rows<1){
			$sql = "UPDATE alumni SET
				nis='". $nis ."',
				nama='". $nama ."',
				id_thn='". $id_thn ."',
				univer='". $univer ."',
				tgl_lahir='". $tgl_lahir ."',
				no_wa='". $no_wa ."',
				pekerjaan='". $pekerjaan ."',
				alamat='". $alamat ."',
				foto='". $foto ."',
				alumni_kelas='". $alumni_kelas ."',
				prestasi='". $prestasi ."',
				jurusan='". $jurusan ."',
				alkerja='". $alkerja ."',
				ig='". $ig ."',
				fb='". $fb ."',
				sosmed='". $sosmed ."'
				WHERE foto='". $foto ."'";
			$ress = mysqli_query($conn, $sql);			
			header("location: alumni.php?act=update&msg=success");
			}
		if($nis!=""){
			$sqlcek = "SELECT * FROM alumni WHERE nis='$nis'";
			$ress = mysqli_query($conn, $sqlcek);
			$rows = mysqli_num_rows($ress);
			if($rows<1){
			$sql = "UPDATE alumni SET
				nis='". $nis ."',
				nama='". $nama ."',
				id_thn='". $id_thn ."',
				univer='". $univer ."',
				tgl_lahir='". $tgl_lahir ."',
				no_wa='". $no_wa ."',
				pekerjaan='". $pekerjaan ."',
				alamat='". $alamat ."',
				foto='". $foto ."',
				alumni_kelas='". $alumni_kelas ."',
				prestasi='". $prestasi ."',
				jurusan='". $jurusan ."',
				alkerja='". $alkerja ."',
				ig='". $ig ."',
				fb='". $fb ."',
				sosmed='". $sosmed ."'
				WHERE nis='". $nislama ."'";
			$ress = mysqli_query($conn, $sql);			
			header("location: alumni.php?act=update&msg=success");
			}else{
				header("location: alumni_edit.php?nis=$nislama&act=add&msg=double");			
			}
		}else{
			$sql = "UPDATE alumni SET
				nama='". $nama ."',
				id_thn='". $id_hn ."',
				univer='". $univer ."',
				tgl_lahir='". $tgl ."',
				no_wa='". $no_wa ."',
				pekerjaan='". $pekerjaan ."',
				alamat='". $alamat ."',
				foto='". $foto ."',
				alumni_kelas='". $alumni_kelas ."',
				prestasi='". $prestasi ."',
				jurusan='". $jurusan ."',
				alkerja='". $alkerja ."',
				ig='". $ig ."',
				fb='". $fb ."',
				sosmed='". $sosmed ."'
				WHERE nis='". $nislama ."'";
			$ress = mysqli_query($conn, $sql);			
			header("location: alumni.php?act=update&msg=success");
		}
}
	}
?>
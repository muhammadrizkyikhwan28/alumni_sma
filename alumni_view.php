<!-- Printing -->
<link rel="stylesheet" href="css/printing.css">

<?php
include("sess_check.php");
include("dist/function/format_tanggal.php");
if ($_GET) {
	$kode = $_GET['code'];
	$sql = "SELECT alumni.*, tahun.* FROM alumni, tahun WHERE alumni.id_thn=tahun.id_thn AND alumni.nis='$kode'";
	$query = mysqli_query($conn, $sql);
	$result = mysqli_fetch_array($query);
} else {
	echo "Nomor Transaksi Tidak Terbaca";
	exit;
}
?>
<html>

<head>
</head>

<body>
	<div id="section-to-print">
		<div id="only-on-print">
			<!--	<h2>Profil Project Manager</h2> -->
		</div>
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
			<h4 class="modal-title" id="myModalLabel">Detail Alumni</h4>
		</div>
		<div><br />
			<table width="100%">
				<tr>
					<td width="20%"><b>NIS</b></td>
					<td width="2%"><b>:</b></td>
					<td width="78%"><?php echo $result['nis']; ?></td>
				</tr>
				<tr>
					<td colspan="3">&nbsp;</td>
				</tr>
				<tr>
					<td width="20%"><b>Nama</b></td>
					<td width="2%"><b>:</b></td>
					<td width="78%"><?php echo $result['nama']; ?></td>
				</tr>
				<tr>
					<td colspan="3">&nbsp;</td>
				</tr>
				<tr>
					<td width="20%"><b>Angkatan</b></td>
					<td width="2%"><b>:</b></td>
					<td width="78%"><?php echo $result['nama_thn']; ?></td>
				</tr>
				<tr>
					<td colspan="3">&nbsp;</td>
				</tr>
				<tr>
					<td width="20%"><b>Alumni Kelas</b></td>
					<td width="2%"><b>:</b></td>
					<td width="78%"><?php echo $result['alumni_kelas']; ?></td>
				</tr>
				<tr>
					<td colspan="3">&nbsp;</td>
				</tr>
				<tr>
					<td width="20%"><b>Universitas</b></td>
					<td width="2%"><b>:</b></td>
					<td width="78%"><?php echo $result['univer']; ?></td>
				</tr>
				<tr>
					<td colspan="3">&nbsp;</td>
				</tr>
				<tr>
					<td width="20%"><b>Jurusan</b></td>
					<td width="2%"><b>:</b></td>
					<td width="78%"><?php echo $result['jurusan']; ?></td>
				</tr>
				<tr>
					<td colspan="3">&nbsp;</td>
				</tr>
				<tr>
					<td width="20%"><b>Pekerjaan</b></td>
					<td width="2%"><b>:</b></td>
					<td width="78%"><?php echo $result['pekerjaan']; ?></td>
				</tr>
				<tr>
					<td colspan="3">&nbsp;</td>
				</tr>
				<tr>
					<td width="20%"><b>Alamat Kerja</b></td>
					<td width="2%"><b>:</b></td>
					<td width="78%"><?php echo $result['alkerja']; ?></td>
				</tr>
				<tr>
					<td colspan="3">&nbsp;</td>
				</tr>
				<tr>
					<td width="20%"><b>Tanggal Lahir</b></td>
					<td width="2%"><b>:</b></td>
					<td width="78%"><?php echo IndonesiaTgl($result['tgl_lahir']); ?></td>
				</tr>
				<tr>
					<td colspan="3">&nbsp;</td>
				</tr>
				<tr>
					<td width="20%"><b>Nomor WA</b></td>
					<td width="2%"><b>:</b></td>
					<td width="78%"><?php echo $result['no_wa']; ?></td>
				</tr>
				<tr>
					<td colspan="3">&nbsp;</td>
				</tr>
				<tr>
					<td width="20%"><b>Prestasi</b></td>
					<td width="2%"><b>:</b></td>
					<td width="78%"><?php echo $result['prestasi']; ?></td>
				</tr>
				<tr>
					<td colspan="3">&nbsp;</td>
				</tr>
				<tr>
					<td width="20%"><b>Alamat</b></td>
					<td width="2%"><b>:</b></td>
					<td width="78%"><?php echo $result['alamat']; ?></td>
				</tr>
				<tr>
					<td colspan="3">&nbsp;</td>
				</tr>
				<tr>
					<td width="20%"><b>Instagram</b></td>
					<td width="2%"><b>:</b></td>
					<td width="78%"><?php echo $result['ig']; ?></td>
				</tr>
				<tr>
					<td colspan="3">&nbsp;</td>
				</tr>
				<tr>
					<td width="20%"><b>Facebook</b></td>
					<td width="2%"><b>:</b></td>
					<td width="78%"><?php echo $result['fb']; ?></td>
				</tr>
				<tr>
					<td colspan="3">&nbsp;</td>
				</tr>
				<tr>
					<td width="20%"><b>Sosmed</b></td>
					<td width="2%"><b>:</b></td>
					<td width="78%"><?php echo $result['sosmed']; ?></td>
				</tr>
				<tr>
					<td colspan="3">&nbsp;</td>
				</tr>
				<tr>
					<td width="20%"><b>Foto</b></td>
					<td width="2%"><b>:</b></td>
					<td width="78%"><img src="<?php echo $result['foto']; ?>" width="100px"> </td>
				</tr>

			</table>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</div>

</body>

</html>
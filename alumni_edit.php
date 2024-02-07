<?php
include("sess_check.php");

if (isset($_GET['nis'])) {
	$sql = "SELECT alumni.*, tahun.nama_thn FROM alumni INNER JOIN tahun ON alumni.id_thn = tahun.id_thn WHERE alumni.nis=?";
	$stmt = mysqli_prepare($conn, $sql);
	mysqli_stmt_bind_param($stmt, "s", $_GET['nis']);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	$data = mysqli_fetch_assoc($result);
}

$pagedesc = "Data Alumni";
$menuparent = "alumni";
include("layout_top.php");
?>

<script type="text/javascript">
	function checkAlAvailability() {
		$("#loaderIcon").show();
		jQuery.ajax({
			url: "check_alavailability.php",
			data: 'nis=' + $("#nis").val(),
			type: "POST",
			success: function(data) {
				$("#user-availability-status").html(data);
				$("#loaderIcon").hide();
			},
			error: function() {}
		});
	}
</script>

<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Data Alumni</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<?php include("layout_alert.php"); ?>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<form class="form-horizontal" action="alumni_update.php" method="POST" enctype="multipart/form-data">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3>Edit Data</h3>
						</div>
						<div class="panel-body">
							<div class="form-group">
								<label class="control-label col-sm-4">NIS Lama</label>
								<div class="col-sm-4">
									<input type="text" name="nislama" class="form-control" value="<?php echo $data['nis']; ?>" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-4">NIS Baru(Abaikan Jika Tidak Diubah)</label>
								<div class="col-sm-4">
									<input type="number" min="0" class="form-control" name="nis" id="nis" onBlur="checkAlAvailability()" placeholder="NIS Baru">
									<span id="user-availability-status" style="font-size:12px;"></span>
								</div>
							</div>

							<!-- Add other fields for editing -->
							<div class="form-group">
								<label class="control-label col-sm-4">Nama</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="nama" value="<?php echo $data['nama']; ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-4">ID Tahun Angkatan</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="id_thn" value="<?php echo $data['id_thn']; ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-4">Alumni Kelas</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="alumni_kelas" value="<?php echo $data['alumni_kelas']; ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-4">Universitas</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="univer" value="<?php echo $data['univer']; ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-4">Jurusan</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="jurusan" value="<?php echo $data['jurusan']; ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-4">Pekerjaan</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="pekerjaan" value="<?php echo $data['pekerjaan']; ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-4">Alamat Kerja</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="alkerja" value="<?php echo $data['alkerja']; ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-4">Tanggal Lahir</label>
								<div class="col-sm-4">
									<input type="date" class="form-control" name="tgl_lahir" value="<?php echo $data['tgl_lahir']; ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-4">Nomor WA</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="no_wa" value="<?php echo $data['no_wa']; ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-4">Prestasi</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="prestasi" value="<?php echo $data['prestasi']; ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-4">Alamat</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="alamat" value="<?php echo $data['alamat']; ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-4">Instagram</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="ig" value="<?php echo $data['ig']; ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-4">Facebook</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="fb" value="<?php echo $data['fb']; ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-4">Sosmed</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="sosmed" value="<?php echo $data['sosmed']; ?>">
								</div>
							</div>

							<!-- Include other fields like univer, tgl_lahir, etc. -->

							<!-- Tambahkan bagian ini untuk menampilkan gambar -->
							<div class="form-group">
								<label class="control-label col-sm-4">Foto Saat Ini</label>
								<div class="col-sm-4">
									<img src="<?php echo $data['foto']; ?>" width="100px">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-4">Foto</label>
								<div class="col-sm-4">
									<input type="file" name="foto" class="form-control" placeholder="foto">
								</div>
							</div>
						</div>
						<div class="panel-footer">
							<button type="submit" name="perbarui" class="btn btn-warning">Perbarui</button>
							<a href="alumni.php" class="btn btn-default">Batal</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
include("layout_bottom.php");
?>
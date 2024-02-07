<?php
include("sess_check.php");

// deskripsi halaman
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
<!-- top of file -->
<!-- Page Content -->
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Data Alumni</h1>
			</div><!-- /.col-lg-12 -->
		</div><!-- /.row -->
		<div class="row">
			<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<form class="form-horizontal" action="alumni_insert.php" method="multipart/form-data">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3>Tambah Data</h3>
						</div>
						<div class="panel-body">
							<div class="form-group">
								<label class="control-label col-sm-3">ID</label>
								<div class="col-sm-4">
									<input type="number" min="0" class="form-control" name="nis" id="nis" onBlur="checkAlAvailability()" placeholder="ID" required>
									<span id="user-availability-status" style="font-size:12px;"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Nama</label>
								<div class="col-sm-4">
									<input type="text" name="nama" class="form-control" placeholder="Nama" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Tahun Angkatan</label>
								<div class="col-sm-4">
									<select class="form-control" name="id_thn" required>
										<option value="" selected>==== Pilih Tahun Angkatan ====</option>
										<?php
										$mySql = "SELECT * FROM tahun ORDER BY nama_thn ASC";
										$myQry = mysqli_query($conn, $mySql);
										$dataThn = $result['id_thn'];
										while ($id_thn = mysqli_fetch_array($myQry)) {
											if ($id_thn['id_thn'] == $dataThn) {
												$cek = " selected";
											} else {
												$cek = "";
											}
											echo "<option value='$id_thn[id_thn]' $cek>" . $id_thn[nama_thn] . "</option>";
										}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Universitas</label>
								<div class="col-sm-4">
									<input type="text" name="univer" class="form-control" placeholder="Universitas" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Tanggal Lahir</label>
								<div class="col-sm-4">
									<input type="date" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Nomor WA</label>
								<div class="col-sm-4">
									<input type="number" name="no_wa" min="0" class="form-control" placeholder="no_wa" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Pekerjaan</label>
								<div class="col-sm-4">
									<input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Alamat</label>
								<div class="col-sm-4">
									<textarea class="form-control" name="alamat" required></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Alumni Kelas</label>
								<div class="col-sm-4">
									<input type="text" name="alumni_kelas" class="form-control" placeholder="Alumni Kelas" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Prestasi</label>
								<div class="col-sm-4">
									<input type="text" name="prestasi" class="form-control" placeholder="Prestasi" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Jurusan</label>
								<div class="col-sm-4">
									<input type="text" name="jurusan" class="form-control" placeholder="Jurusan" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Alamat Pekerjaan</label>
								<div class="col-sm-4">
									<input type="text" name="alkerja" class="form-control" placeholder="Alamat Pekerjaan" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Instagram</label>
								<div class="col-sm-4">
									<input type="text" name="ig" class="form-control" placeholder="Instagram" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Facebook</label>
								<div class="col-sm-4">
									<input type="text" name="fb" class="form-control" placeholder="Facebook" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Sosmed</label>
								<div class="col-sm-4">
									<input type="text" name="sosmed" class="form-control" placeholder="sosmed" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Foto</label>
								<div class="col-sm-4">
									<input type="file" name="foto" class="form-control" placeholder="foto" required>
								</div>
							</div>
						</div>
						<div class="panel-footer">
							<button type="submit" name="simpan" class="btn btn-success">Simpan</button>
							<a href="alumni.php" class="btn btn-default">Batal</a>
						</div>
					</div><!-- /.panel -->
				</form>
			</div><!-- /.col-lg-12 -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->
<!-- bottom of file -->
<?php
include("layout_bottom.php");
?>
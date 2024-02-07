<?php
include("sess_check.php");

// deskripsi halaman
$pagedesc = "Data Alumni";
include("layout_top.php");
include("dist/function/format_tanggal.php");
?>
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
				<div class="panel panel-default">
					<div class="panel-heading">
						<a href="alumni_tambah.php" class="btn btn-success">Tambah</a>
						<a href="alumni_csv.php" class="btn btn-warning">Upload Template CSV</a>
					</div>
					<div class="panel-body">
						<form method="get" name="laporan" onSubmit="return valid();">
							<div class="form-group">
								<div class="col-sm-4">
									<label>Tahun Angkatan</label>
									<select class="form-control" name="thn" required>
										<option value="" selected>==== Pilih Tahun Angkatan ====</option>
										<?php
										$mySql = "SELECT * FROM tahun ORDER BY nama_thn ASC";
										$myQry = mysqli_query($conn, $mySql);
										$dataThn = $result['id_thn'];
										while ($Thn = mysqli_fetch_array($myQry)) {
											if ($Thn['id_thn'] == $dataThn) {
												$cek = " selected";
											} else {
												$cek = "";
											}
											echo "<option value='$Thn[id_thn]' $cek>" . $Thn[nama_thn] . "</option>";
										}
										?>
									</select>
								</div>
							</div>
							<div class="col-sm-4">
								<label>&nbsp;</label><br />
								<input type="submit" name="submit" value="Lihat" class="btn btn-warning">
							</div>
					</div>
					</form>
				</div>
			</div>
		</div>
		<?php
		if (isset($_GET['submit'])) {
			$no = 0;
			$thn = $_GET['thn'];
			$sql = "SELECT alumni.*, tahun.* FROM alumni, tahun WHERE
										alumni.id_thn=tahun.id_thn AND alumni.id_thn='$thn' ORDER BY alumni.nama ASC";
			$ress = mysqli_query($conn, $sql);
		?>
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-body">

							<table class="table table-striped table-bordered table-hover" id="tabel-data">
								<thead>
									<tr>
										<th width="2%">No</th>
										<th width="7%">NIS</th>
										<th width="10%">Nama</th>
										<th width="10%">Telepon</th>
										<th width="10%">Pekerjaan</th>
										<th width="10%">Angkatan</th>
										<th width="10%">Opsi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i = 1;
									while ($data = mysqli_fetch_array($ress)) {
										echo '<tr>';
										echo '<td class="text-center">' . $i . '</td>';
										echo '<td class="text-nowrap">' . $data['nis'] . '</td>';
										echo '<td class="text-nowrap">' . $data['nama'] . '</td>';
										echo '<td class="text-center">' . $data['no_wa'] . '</td>';
										echo '<td class="text-center">' . $data['pekerjaan'] . '</td>';
										echo '<td class="text-center">' . $data['nama_thn'] . '</td>';
										echo '<td class="text-center">
													<a href="#myModal" data-toggle="modal" data-load-code="' . $data['nis'] . '" data-remote-target="#myModal .modal-body" class="btn btn-primary btn-xs">Detail</a></td>';
										//echo '';

										echo '</tr>';
										$i++;
									}
									?>
								</tbody>
							</table>
							<div>
								<a href="alumni_cetak_thn.php?thn=<?php echo $thn; ?>" target="_blank" class="btn btn-warning">Cetak</a>
							</div>
						<?php
					} else {
						$no = 0;
						$sql = "SELECT alumni.*, tahun.* FROM alumni, tahun WHERE
										alumni.id_thn=tahun.id_thn ORDER BY alumni.nama ASC";
						$ress = mysqli_query($conn, $sql);
						?>
							<div class="row">
								<div class="col-lg-12">
									<div class="panel panel-default">
										<div class="panel-body">

											<table class="table table-striped table-bordered table-hover" id="tabel-data">
												<thead>
													<tr>
														<th width="2%">No</th>
														<th width="7%">NIS</th>
														<th width="10%">Nama</th>
														<th width="10%">Nomer WA</th>
														<th width="10%">Pekerjaan</th>
														<th width="10%">Angkatan</th>
														<th width="10%">Opsi</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$i = 1;
													while ($data = mysqli_fetch_array($ress)) {
														echo '<tr>';
														echo '<td class="text-center">' . $i . '</td>';
														echo '<td class="text-nowrap">' . $data['nis'] . '</td>';
														echo '<td class="text-nowrap">' . $data['nama'] . '</td>';
														echo '<td class="text-center">' . $data['no_wa'] . '</td>';
														echo '<td class="text-center">' . $data['pekerjaan'] . '</td>';
														echo '<td class="text-center">' . $data['nama_thn'] . '</td>';
														echo '<td class="text-center">
												<a href="alumni_edit.php?nis=' . $data['nis'] . '" class="btn btn-warning btn-xs">Edit</a>
												<a href="#myModal" data-toggle="modal" data-load-code="' . $data['nis'] . '" data-remote-target="#myModal .modal-body" class="btn btn-primary btn-xs">Detail</a>
												<a href="alumni_hapus.php?nis=' . $data['nis'] . ' " class="btn btn-danger btn-xs">Hapus</a></td>';
														echo '</tr>';
														$i++;
													}
													?>
												</tbody>
											</table>
											<div>
												<a href="alumni_cetak.php" target="_blank" class="btn btn-warning">Cetak</a>
											</div>
										<?php
									}
										?>

										</div>
										<!-- Large modal -->
										<div class="modal fade bs-example-modal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-body">
														<p>Sedang Memproses…</p>
													</div>
												</div>
											</div>
										</div>
									</div><!-- /.panel -->
								</div><!-- /.col-lg-12 -->
							</div><!-- /.row -->
						</div><!-- /.container-fluid -->
					</div><!-- /#page-wrapper -->
					<!-- bottom of file -->
					<script type="text/javascript">
						$(document).ready(function() {
							$('#tabel-data').DataTable({
								"responsive": true,
								"processing": true,
								"columnDefs": [{
									"orderable": false,
									"targets": [4]
								}]
							});

							$('#tabel-data').parent().addClass("table-responsive");
						});
					</script>
					<script>
						var app = {
							code: '0'
						};

						$('[data-load-code]').on('click', function(e) {
							e.preventDefault();
							var $this = $(this);
							var code = $this.data('load-code');
							if (code) {
								$($this.data('remote-target')).load('alumni_view.php?code=' + code);
								app.code = code;

							}
						});
					</script>
					<?php
					include("layout_bottom.php");
					?>
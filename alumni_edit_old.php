<?php
	include("sess_check.php");
	
	// query database mencari data bendahara
	if(isset($_GET['nis'])) {
		$sql = "SELECT alumni.*, tahun.* FROM alumni, tahun WHERE alumni.id_thn=tahun.id_thn AND alumni.nis='". $_GET['nis'] ."'";
		$ress = mysqli_query($conn, $sql);
		$data = mysqli_fetch_array($ress);
	}
	// echo "<pre>";
	// var_dump($data);exit;
	
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
		data:'nis='+$("#nis").val(),
		type: "POST",
		success:function(data){
			$("#user-availability-status").html(data);
			$("#loaderIcon").hide();
		},
		error:function (){}
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
						<form class="form-horizontal" action="alumni_update.php" method="POST">
							<div class="panel panel-default">
								<div class="panel-heading"><h3>Edit Data</h3></div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-sm-4">NIS Lama</label>
										<div class="col-sm-4">
											<input type="text" name="nislama" class="form-control" value="<?php echo $data['nis'];?>" readonly>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-4">NIS Baru(Abaikan Jika Tidak Diubah)</label>
										<div class="col-sm-4">
											<input type="number" min="0" class="form-control" name="nis" id="nis" onBlur="checkAlAvailability()" placeholder="NIS Baru">
											<span id="user-availability-status" style="font-size:12px;"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-4">Nama</label>
										<div class="col-sm-4">
											<input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo $data['nama'];?>"required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-4">Tahun Angkatan</label>
										<div class="col-sm-4">
											<select class="form-control" name="id_thn" value="<?php echo $data['id_thn'];?>" required>
												<option value="<?php echo $data['nama_thn'] ?>" selected><?php echo $data['nama_thn'] ?></option>
													<?php
													$mySql = "SELECT * FROM tahun ORDER BY nama_thn ASC";
													$myQry = mysqli_query($conn, $mySql);
													$dataThn = $result['id_thn'];
													while ($id_thn = mysqli_fetch_array($myQry)) {
														if ($id_thn['id_thn']== $dataThn) {
														$cek = " selected";
														} else { $cek=""; }
														echo "<option value='$id_thn[id_thn]' $cek>".$id_thn[nama_thn]."</option>";
													}
													?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-4">Universitas</label>
										<div class="col-sm-4">
											<input type="text" name="univer" min="0" class="form-control" placeholder="Universitas" value="<?php echo $data['univer'];?>" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-4">Tanggal Lahir</label>
										<div class="col-sm-4">
											<input type="date" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" value="<?php echo $data['tgl_lahir']?>" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-4">Nomor wa</label>
										<div class="col-sm-4">
											<input type="number" name="no_wa" min="0" class="form-control" placeholder="Nomor WA" value="<?php echo $data['no_wa'];?>" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-4">Pekerjaan</label>
										<div class="col-sm-4">
											<input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan" value="<?php echo $data['pekerjaan'];?>" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-4">Alamat</label>
										<div class="col-sm-4">
											<input type ="text" class="form-control" name="alamat" value="<?php echo $data['alamat'];?>" required></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-4">Alumni Kelas</label>
										<div class="col-sm-4">
											<input type="text" name="alumni_kelas" class="form-control" placeholder="Alumni Kelas" value="<?php echo $data['alumni_kelas'];?>" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-4">Prestasi</label>
										<div class="col-sm-4">
											<input type="text" name="prestasi" class="form-control" placeholder="Prestasi" value="<?php echo $data['prestasi'];?>" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-4">Jurusan</label>
										<div class="col-sm-4">
											<input type="text" name="jurusan" class="form-control" placeholder="Jurusan" value="<?php echo $data['jurusan'];?>" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-4">Alamat Pekerjaan</label>
										<div class="col-sm-4">
											<input type="text" name="alkerja" class="form-control" placeholder="Alamat Pekerjaan" value="<?php echo $data['alkerja'];?>" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-4">Instagram</label>
										<div class="col-sm-4">
											<input type="text" name="ig" class="form-control" placeholder="Instagram" value="<?php echo $data['ig'];?>" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-4">Facebook</label>
										<div class="col-sm-4">
											<input type="text" name="fb" class="form-control" placeholder="Facebook" value="<?php echo $data['fb'];?>" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-4">Sosmed</label>
										<div class="col-sm-4">
											<input type="text" name="sosmed" class="form-control" placeholder="sosmed" value="<?php echo $data['sosmed'];?>" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-4">Foto</label>
										<div class="col-sm-4">
											<input type="text" name="foto" class="form-control" placeholder="foto" value="<?php echo $data['foto'];?>">
										</div>
										<td>
										<td width="20%"><b>Foto</b></td>
										<td width="2%"><b>:</b></td>
										<td width="78%"><img src="foto/<?php echo $result['foto'];?>" width="100px"> </td>
												</td>
									</div>
								</div>
								</div>
								<div class="panel-footer">
									<button type="submit" name="perbarui" class="btn btn-warning">Perbarui</button>
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
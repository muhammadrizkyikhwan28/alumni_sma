<?php
	include("sess_check.php");
	
	// query database mencari data pengguna
	$sql = "SELECT * FROM admin WHERE id_adm ='". $sess_admid ."'";
	$ress = mysqli_query($conn, $sql);
	$data = mysqli_fetch_array($ress);
	
	// deskripsi halaman
	$pagedesc = "Ubah Foto";
	include("layout_top.php");
?>
<!-- top of file -->
		<!-- Page Content -->
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Ubah Foto</h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-body">
									<div class="form-group">
									<center>
									<img src="foto/<?php echo $data['foto_adm'];?>" width="250px">
									</center>
									</div>
								</div>
								<hr/>
							<form class="form-horizontal" action="pengaturan_ubah_update.php" method="POST" enctype="multipart/form-data">
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-sm-3">Ubah Foto</label>
										<div class="col-sm-4">
											<input type="hidden" name="id" class="form-control"  value="<?php echo $data['id_adm'] ?>" required>
											<input type="file" name="foto" class="form-control" accept="image/*" required>
										</div>
									<button type="submit" name="perbarui" class="btn btn-success">Update</button>
									</div>
								</div>
							</div><!-- /.panel -->
						</form>
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
<?php
	include("sess_check.php");
	
	$id = $_SESSION['alumni'];
	$sql = "SELECT alumni.*, tahun.* FROM alumni, tahun WHERE alumni.id_thn=tahun.id_thn AND alumni.nis='". $id ."'";
	$ress = mysqli_query($conn, $sql);
	$data = mysqli_fetch_array($ress);

	if(isset($_GET['submit'])){
		$nis 	 = $_GET['nis'];
		$pekerjaan 	 = $_GET['pekerjaan'];
		$telp 	 = $_GET['telp'];
		$alamat  = $_GET['alamat'];
		$sql = "UPDATE alumni SET
				pekerjaan='". $pekerjaan ."',
				telp='". $telp ."',
				alamat='". $alamat ."'
				WHERE nis='". $nis ."'";
			$ress = mysqli_query($conn, $sql);			
		if($ress){
			echo "<script>alert('Update Profil Berhasil!');</script>";
			header("location: profil.php?act=update&msg=success");			
		}else{
		//	echo("Error description: " . mysqli_error($conn));
			echo "<script>alert('Ops, terjadi kesalahan. Silahkan coba lagi.');</script>";
			header("location: profil.php?act=update&msg=error");			
		}
	}

	// deskripsi halaman
	$pagedesc = "Profil";
	$menuparent = "profil";
	include("layout_top.php");
?>
<!-- top of file -->
		<!-- Page Content -->
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Profil Alumni</h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->

				<div class="row">
					<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<form class="form-horizontal" method="GET" enctype="multipart/form-data">
							<div class="panel panel-default">
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-sm-3">NIS</label>
										<div class="col-sm-4">
											<input type="text" name="nis" class="form-control" placeholder="Nama" value="<?php echo $data['nis'] ?>" readonly>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Nama</label>
										<div class="col-sm-4">
											<input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo $data['nama'] ?>" readonly>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Jenis Kelamin</label>
										<div class="col-sm-4">
											<input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo $data['jns_kelamin'] ?>" readonly>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Tempat Lahir</label>
										<div class="col-sm-4">
											<input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo $data['tmpt_lahir'] ?>" readonly>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Tanggal Lahir</label>
										<div class="col-sm-4">
											<input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo IndonesiaTgl($data['tgl_lahir']) ?>" readonly>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Telepon</label>
										<div class="col-sm-4">
											<input type="number" name="telp" min="0" class="form-control" placeholder="Telepon" value="<?php echo $data['telp'] ?>"required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Pekerjaan</label>
										<div class="col-sm-4">
											<input type="text" name="pekerjaan" class="form-control" placeholder="Nama" value="<?php echo $data['pekerjaan'] ?>" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Alamat</label>
										<div class="col-sm-4">
											<textarea name="alamat" class="form-control" placeholder="Alamat" rows="3" required><?php echo $data['alamat'] ?></textarea>
										</div>
									</div>
								</div>
								<div class="panel-footer">
									<button type="submit" name="submit" class="btn btn-success">Update</button>
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
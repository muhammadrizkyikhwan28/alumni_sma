<?php
	include("sess_check.php");
	
	if(isset($_GET['thn'])) {
		$sql = "SELECT * FROM tahun WHERE id_thn='". $_GET['thn'] ."'";
		$ress = mysqli_query($conn, $sql);
		$data = mysqli_fetch_array($ress);
	}
	
	if(isset($_GET['submit'])){
		$nama	= $_GET['nama'];
		$id	= $_GET['thn'];
		$sql = "UPDATE tahun SET nama_thn='". $nama ."'WHERE id_thn='". $id ."'";
		$ress = mysqli_query($conn, $sql);
		if($ress){
			echo "<script>alert('Update Data Berhasil!');</script>";
			echo "<script type='text/javascript'> document.location = 'tahun.php'; </script>";
		}else{
		//	echo("Error description: " . mysqli_error($conn));
			echo "<script>alert('Ops, terjadi kesalahan. Silahkan coba lagi.');</script>";
			header("location: tahun_edit.php?thn=$id");			
		}
	}

	// deskripsi halaman
	$pagedesc = "Data Tahun";
	$menuparent = "tahun";
	include("layout_top.php");
?>
<!-- top of file -->
		<!-- Page Content -->
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Data Tahun</h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->

				<div class="row">
					<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<form class="form-horizontal" method="GET" enctype="multipart/form-data">
							<div class="panel panel-default">
								<div class="panel-heading"><h3>Edit Data</h3></div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-sm-3">Nama Tahun</label>
										<div class="col-sm-4">
											<input type="text" name="nama" class="form-control" placeholder="Nama Tahun" value="<?php echo $data['nama_thn'] ?>" required>
											<input type="hidden" name="thn" class="form-control" placeholder="ID" value="<?php echo $data['id_thn'] ?>" required>
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
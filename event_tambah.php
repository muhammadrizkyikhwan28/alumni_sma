<?php
	include("sess_check.php");
	
	// deskripsi halaman
	$pagedesc = "Data Event";
	$menuparent = "event";
	include("layout_top.php");
	$now = date('Y-m-d');
	if(isset($_GET['submit'])){
		$nama 	 = $_GET['nama'];
		$tgl 	 = $_GET['tgl'];
		$waktu 	 = $_GET['waktu'];
		$tempat  = $_GET['tempat'];
		$batas 	 = $_GET['batas'];
		$ket 	 = $_GET['keterangan'];
		$id 	 = $sess_admid;
		$stt 	 = "Open";
		$sql	 = "INSERT INTO event(nama_event,tgl_event,tempat_event,waktu_event,batas_daftar,keterangan,status,id_adm)
				   VALUES('$nama','$tgl','$tempat','$waktu','$batas','$ket','$stt','$id')";
		$ress = mysqli_query($conn, $sql);
		if($ress){
			echo "<script>alert('Tambah Data Berhasil!');</script>";
			echo "<script type='text/javascript'> document.location = 'event.php'; </script>";
		}else{
		//	echo("Error description: " . mysqli_error($conn));
			echo "<script>alert('Ops, terjadi kesalahan. Silahkan coba lagi.');</script>";
			echo "<script type='text/javascript'> document.location = 'event_tambah.php'; </script>";
		}
	}
?>
<!-- top of file -->
		<!-- Page Content -->
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Data Event</h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->

				<div class="row">
					<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<form class="form-horizontal" method="GET" enctype="multipart/form-data">
							<div class="panel panel-default">
								<div class="panel-heading"><h3>Tambah Data</h3></div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-sm-3">Nama Event</label>
										<div class="col-sm-4">
											<input type="text" name="nama" class="form-control" placeholder="Nama" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Tanggal</label>
										<div class="col-sm-4">
											<input type="date" name="tgl" class="form-control" placeholder="Tanggal" value="<?php echo $now;?>" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Tempat</label>
										<div class="col-sm-4">
											<input type="text" name="tempat" class="form-control" placeholder="Tempat" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Waktu</label>
										<div class="col-sm-4">
											<input type="text" name="waktu" class="form-control" placeholder="Waktu" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Batas Pendaftaran</label>
										<div class="col-sm-4">
											<input type="date" name="batas" class="form-control" placeholder="Tanggal" value="<?php echo $now;?>" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Keterangan</label>
										<div class="col-sm-4">
											<textarea name="keterangan" class="form-control" placeholder="Keterangan" rows="3" required></textarea>
										</div>
									</div>
								</div>
								<div class="panel-footer">
									<button type="submit" name="submit" class="btn btn-success">Simpan</button>
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
<?php
	include("sess_check.php");
	
	// query database mencari data bendahara
	if(isset($_GET['eve'])) {
		$sql = "SELECT * FROM event WHERE id_event='". $_GET['eve'] ."'";
		$ress = mysqli_query($conn, $sql);
		$data = mysqli_fetch_array($ress);
	}
	
	if(isset($_GET['submit'])){
		$nama 	 = $_GET['nama'];
		$id 	 = $_GET['id'];
		$tgl 	 = $_GET['tgl'];
		$waktu 	 = $_GET['waktu'];
		$tempat  = $_GET['tempat'];
		$batas 	 = $_GET['batas'];
		$ket 	 = $_GET['keterangan'];
		$sql = "UPDATE event SET
				nama_event='". $nama ."',
				tgl_event='". $tgl ."',
				tempat_event='". $tempat ."',
				waktu_event='". $waktu ."',
				batas_daftar='". $batas ."',
				keterangan='". $ket ."'
				WHERE id_event='". $id ."'";
			$ress = mysqli_query($conn, $sql);			
		if($ress){
			echo "<script>alert('Update Data Berhasil!');</script>";
			echo "<script type='text/javascript'> document.location = 'event.php'; </script>";
		}else{
		//	echo("Error description: " . mysqli_error($conn));
			echo "<script>alert('Ops, terjadi kesalahan. Silahkan coba lagi.');</script>";
			echo "<script type='text/javascript'> document.location = 'event.php'; </script>";
		}
	}
	
	// deskripsi halaman
	$pagedesc = "Data Event";
	$menuparent = "event";
	include("layout_top.php");
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
						<form class="form-horizontal" method="GET">
							<div class="panel panel-default">
								<div class="panel-heading"><h3>Edit Data</h3></div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-sm-3">Nama Event</label>
										<div class="col-sm-4">
											<input type="hidden" name="id" class="form-control" placeholder="Nama" value="<?php echo $data['id_event'];?>" required>
											<input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo $data['nama_event'];?>" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Tanggal</label>
										<div class="col-sm-4">
											<input type="date" name="tgl" class="form-control" placeholder="Tanggal" value="<?php echo $data['tgl_event'];?>" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Tempat</label>
										<div class="col-sm-4">
											<input type="text" name="tempat" class="form-control" placeholder="Tempat" value="<?php echo $data['tempat_event'];?>" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Waktu</label>
										<div class="col-sm-4">
											<input type="text" name="waktu" class="form-control" placeholder="Waktu" value="<?php echo $data['waktu_event'];?>" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Batas Pendaftaran</label>
										<div class="col-sm-4">
											<input type="date" name="batas" class="form-control" placeholder="Tanggal" value="<?php echo $data['batas_daftar'];?>" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Keterangan</label>
										<div class="col-sm-4">
											<textarea name="keterangan" class="form-control" placeholder="Keterangan" rows="3" required><?php echo $data['keterangan'];?></textarea>
										</div>
									</div>
								</div>
								<div class="panel-footer">
									<button type="submit" name="submit" class="btn btn-warning">Perbarui</button>
									<a href="event.php" class="btn btn-default">Batal</a>
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
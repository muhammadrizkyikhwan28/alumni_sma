<?php
	include("sess_check.php");
	include("dist/function/format_rupiah.php");

	$nis = $sess_nis;
	$sql = "SELECT event.*, temp_event.* FROM event, temp_event WHERE event.id_event=temp_event.id_event AND temp_event.nis='$nis'";
	$ress = mysqli_query($conn, $sql);
	$ikut = mysqli_num_rows($ress);

	$sqlnew = "SELECT * FROM event WHERE status='Open'";
	$ressnew = mysqli_query($conn, $sqlnew);
	$baru = mysqli_num_rows($ressnew);
	// query database mencari data admin
	// deskripsi halaman
	$pagedesc = "Beranda";
	include("layout_top.php");
?>
<!-- top of file -->
		<!-- Page Content -->
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Beranda</h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
				
				<div class="row">
					<div class="col-lg-6 col-md-6">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-check-circle fa-3x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge"><?php echo $ikut; ?></div>
										<div><h4>Event Diikuti</h4></div>
									</div>
								</div>
							</div>
							<a href="event_diikuti.php">
								<div class="panel-footer">
									<span class="pull-left">Lihat Rincian</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div><!-- /.panel-green -->
					
					<div class="col-lg-6 col-md-6">
						<div class="panel panel-yellow">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-plus-circle fa-3x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge"><?php echo $baru; ?></div>
										<div><h4>Event Baru</h4></div>
									</div>
								</div>
							</div>
							<a href="event_baru.php">
								<div class="panel-footer">
									<span class="pull-left">Lihat Rincian</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div><!-- /.panel-green -->
				</div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /#page-wrapper -->
<!-- bottom of file -->
<?php
	include("layout_bottom.php");
?>
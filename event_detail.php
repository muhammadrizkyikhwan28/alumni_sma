<?php
	include("sess_check.php");

	if(isset($_GET['eve'])) {
		$id = $_GET['eve'];
		$sql = "SELECT * FROM event WHERE id_event='". $_GET['eve'] ."'";
		$ress = mysqli_query($conn, $sql);
		$data = mysqli_fetch_array($ress);
	}
	
	// deskripsi halaman
	$pagedesc = "Data Event";
	$menuparent = "event";
	include("layout_top.php");
	include("dist/function/format_tanggal.php");
	include("dist/function/format_rupiah.php");
?>
<!-- top of file -->
		<!-- Page Content -->
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Data Kehadiran Event</h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<table class="table-borderless">
										<tr>
											<th width="10%">Nama Event</th>
											<th width="85%">: <?php echo $data['nama_event'];?></th>
										</tr>
										<tr>
											<th width="10%">Tanggal</th>
											<th width="85%">: <?php echo IndonesiaTgl($data['tgl_event']);?></th>
										</tr>
										<tr>
											<th width="10%">Waktu</th>
											<th width="85%">: <?php echo $data['waktu_event'];?></th>
										</tr>
										<tr>
											<th width="10%">Tempat</th>
											<th width="85%">: <?php echo $data['tempat_event'];?></th>
										</tr>
										<tr>
											<th width="10%">Status</th>
											<th width="85%">: <?php echo $data['status'];?></th>
										</tr>
								</table>
							</div>
							<div class="panel-body">
								<table class="table table-striped table-bordered table-hover" id="tabel-data">
									<thead>
										<tr>
											<th width="1%">No</th>
											<th width="10%">Nama</th>
											<th width="5%">Angkatan</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$i = 1;
											$sql = "SELECT event.*, temp_event.*, alumni.*, tahun.* FROM event, temp_event, alumni, tahun
													WHERE event.id_event=temp_event.id_event AND temp_event.nis=alumni.nis AND alumni.id_thn=tahun.id_thn
													AND event.id_event='$id' ORDER BY alumni.nama ASC";
											$ress = mysqli_query($conn, $sql);
											while($data = mysqli_fetch_array($ress)) {
												echo '<tr>';
												echo '<td class="text-center">'. $i .'</td>';
												echo '<td class="text-center">'. $data['nama'] .'</td>';
												echo '<td class="text-center">'. $data['nama_thn'] .'</td>';
												echo '</tr>';												
												$i++;
											}
										?>
									</tbody>
								</table>
							<div>
								<a href="event_detail_cetak.php?id=<?php echo $id;?>" target="_blank" class="btn btn-warning">Cetak</a>
							</div>
							</div>
			<!-- Large modal -->
			<div class="modal fade bs-example-modal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-body">
							<p>One fine body…</p>
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
			"columnDefs": [
				{ "orderable": false, "targets": [2] }
			]
		});
		
		$('#tabel-data').parent().addClass("table-responsive");
	});
</script>
	<script>
		var app = {
			code: '0'
		};
		
		$('[data-load-code]').on('click',function(e) {
					e.preventDefault();
					var $this = $(this);
					var code = $this.data('load-code');
					if(code) {
						$($this.data('remote-target')).load('karyawan_detail.php?code='+code);
						app.code = code;
						
					}
		});		
    </script>
<?php
	include("layout_bottom.php");
?>
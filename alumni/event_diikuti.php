<?php
	include("sess_check.php");
	
	// deskripsi halaman
	$pagedesc = "Data Event Diikuti";
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
                        <h1 class="page-header">Data Event Diikuti</h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-body">
								<table class="table table-striped table-bordered table-hover" id="tabel-data">
									<thead>
										<tr>
											<th width="1%">No</th>
											<th width="10%">Nama</th>
											<th width="10%">Tempat</th>
											<th width="10%">Tanggal</th>
											<th width="10%">Waktu</th>
											<th width="10%">Keterangan</th>
											<th width="10%">Opsi</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$i = 1;
											$nis = $sess_nis;
											$stt = "Open";
											$now = date('Y-m-d');
											$sql = "SELECT event.*, temp_event.* FROM event, temp_event 
													WHERE event.id_event=temp_event.id_event AND temp_event.nis='$nis' ORDER BY event.tgl_event DESC";
											$ress = mysqli_query($conn, $sql);
											while($data = mysqli_fetch_array($ress)) {
												$id = $data['id_event'];
												echo '<tr>';
												echo '<td class="text-center">'. $i .'</td>';
												echo '<td class="text-center"><a href="event_detail.php?eve='. $data['id_event'] .'">'.$data['nama_event'].'</a></td>';
												echo '<td class="text-center">'. $data['tempat_event'] .'</td>';
												echo '<td class="text-center">'. IndonesiaTgl($data['tgl_event']) .'</td>';
												echo '<td class="text-center">'. $data['waktu_event'] .'</td>';
												echo '<td class="text-center">'. $data['keterangan'] .'</td>';
												echo '<td class="text-center">';
												$sqlcek = "SELECT * FROM temp_event WHERE nis='$nis' AND id_event='$id'";
												$resscek = mysqli_query($conn, $sqlcek);
												$rows = mysqli_num_rows($resscek);
												if($rows<1){
												?>
													  <a href="event_hadir.php?eve=<?php echo $data['id_event'];?>" onclick="return confirm('Apakah anda yakin akan menghadiri event <?php echo $data['nama_event'];?>?');" class="btn btn-primary btn-xs">Hadiri</a></td>
												<?php
												}else{
													echo "Menghadiri";
												}
													  echo '</td>';
												echo '</tr>';												
												$i++;
											}
										?>
									</tbody>
								</table>
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
				{ "orderable": false, "targets": [5] }
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
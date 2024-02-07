<?php
	include("sess_check.php");
	
	// deskripsi halaman
	$pagedesc = "Data Tahun";
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
                        <h1 class="page-header">Data Tahun</h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<a href="tahun_tambah.php" class="btn btn-success">Tambah</a>
							</div>
							<div class="panel-body">
								<table class="table table-striped table-bordered table-hover" id="tabel-data">
									<thead>
										<tr>
											<th width="1%">No</th>
											<th width="3%">ID</th>
											<th width="10%">Tahun</th>
											<th width="5%">Opsi</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$i = 1;
											
											$sql = "SELECT * FROM tahun ORDER BY nama_thn DESC";
											$ress = mysqli_query($conn, $sql);
											while($data = mysqli_fetch_array($ress)) {
												echo '<tr>';
												echo '<td class="text-center">'. $i .'</td>';
												echo '<td class="text-center">'. $data['id_thn'] .'</td>';
												echo '<td class="text-center">'. $data['nama_thn'] .'</td>';
												echo '<td class="text-center">
													  <a href="tahun_edit.php?thn='. $data['id_thn'] .'" class="btn btn-warning btn-xs">Edit</a>';?>
													  <a href="tahun_hapus.php?thn=<?php echo $data['id_thn'];?>" onclick="return confirm('Apakah anda yakin akan menghapus <?php echo $data['nama_thn'];?>?');" class="btn btn-danger btn-xs">Hapus</a></td>
												<?php
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
				{ "orderable": false, "targets": [2] }
			]
		});
		
		$('#tabel-data').parent().addClass("table-responsive");
	});
</script>
<?php
	include("layout_bottom.php");
?>
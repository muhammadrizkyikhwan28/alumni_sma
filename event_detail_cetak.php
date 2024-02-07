<?php
	include("sess_check.php");

	include("dist/function/format_tanggal.php");
	include("dist/function/format_rupiah.php");
	$id = $_GET['id'];
	$sql = "SELECT event.*, temp_event.*, alumni.*, tahun.* FROM event, temp_event, alumni, tahun
			WHERE event.id_event=temp_event.id_event AND temp_event.nis=alumni.nis AND alumni.id_thn=tahun.id_thn
			AND event.id_event='$id' ORDER BY alumni.nama ASC";
	$ress = mysqli_query($conn, $sql);

	$sqlev = "SELECT * FROM event WHERE id_event='$id'";
	$ressev = mysqli_query($conn, $sqlev);
	$data = mysqli_fetch_array($ressev);

	// deskripsi halaman
	$pagedesc = "Data Kehadiran Event ".$data['nama_event'];
	$pagetitle = str_replace(" ", "_", $pagedesc)
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">

	<title><?php echo $pagetitle ?></title>

	<link href="foto/bm.jpg" rel="icon" type="images/x-icon">


	<!-- Bootstrap Core CSS -->
	<link href="libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="dist/css/offline-font.css" rel="stylesheet">
	<link href="dist/css/custom-report.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="libs/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<!-- jQuery -->
	<script src="libs/jquery/dist/jquery.min.js"></script>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<section id="header-kop">
		<div class="container-fluid">
			<table class="table table-borderless">
				<tbody>
					<tr>
						<td class="text-left" width="20%">
							<img src="foto/bm.jpg" alt="logo-dkm" width="70" />
						</td>
						<td class="text-center" width="60%">
						<b>Data Kehadiran Event</b> <br>
						SMAN 4 BANJARBARU<br>
						<td class="text-right" width="20%">
						</td>
					</tr>
				</tbody>
			</table>
			<hr class="line-top" />
		</div>
	</section>

	<section id="body-of-report">
		<div class="container-fluid">
			<table class="table table-borderless">
				<tbody>
					<tr>
						<td width ="15%"><b>Nama Event</b></td>
						<td><b>: <?php echo $data['nama_event'];?></b></td>
					</tr>
					<tr>
						<td width ="15%"><b>Tempat</b></td>
						<td><b>: <?php echo $data['tempat_event'];?></b></td>
					</tr>
					<tr>
						<td width ="15%"><b>Tanggal</b></td>
						<td><b>: <?php echo IndonesiaTgl($data['tgl_event']);?></b></td>
					</tr>
					<tr>
						<td width ="15%"><b>Waktu</b></td>
						<td><b>: <?php echo $data['waktu_event'];?></b></td>
					</tr>
				</tbody>
			</table>
			<br/>
		</div>
		<div class="container-fluid">
			<table class="table table-striped table-bordered table-hover" id="tabel-data">
				<thead>
					<tr>
						<th width="1%">No</th>
						<th width="10%">Nama</th>
						<th width="10%">Angkatan</th>
						<th width="10%" colspan="2">Tanda Tangan</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$i = 1;
					while($dataku = mysqli_fetch_array($ress)) {
						echo '<tr>';
						echo '<td class="text-center">'. $i .'</td>';
						echo '<td class="text-center">'. $dataku['nama'] .'</td>';
						echo '<td class="text-center">'. $dataku['nama_thn'] .'</td>';
						echo '<td class="text-left">';
						if($i%2==0){
							echo "";
						}else{
							echo $i.".";
						}
						echo '</td>';
						echo '<td class="text-left">';
						if($i%2==0){
							echo $i.".";
						}else{
							echo "";
						}
						echo '</td>';
						
							
						$i++;
					}
				?>
				</tbody>
			</table>
			<br />
		</div><!-- /.container -->
	</section>

	<script type="text/javascript">
		$(document).ready(function() {
			window.print();
		});
	</script>

	<!-- Bootstrap Core JavaScript -->
	<script src="libs/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- jTebilang JavaScript -->
	<script src="libs/jTerbilang/jTerbilang.js"></script>

</body>
</html>
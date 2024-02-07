<?php
	include("sess_check.php");

	include("dist/function/format_tanggal.php");
	include("dist/function/format_rupiah.php");

	$thn = $_GET['thn'];
	$sql = "SELECT alumni.*, tahun.* FROM alumni, tahun
			WHERE alumni.id_thn=tahun.id_thn AND alumni.id_thn='$thn' ORDER BY alumni.nama ASC";
	$ress = mysqli_query($conn, $sql);

	$sqlthn = "SELECT * FROM tahun WHERE id_thn='$thn'";
	$ressthn = mysqli_query($conn, $sqlthn);
	$data = mysqli_fetch_array($ressthn);

	// deskripsi halaman
	$pagedesc = "Data Alumni Tahun Angkatan ".$data['nama_thn'];
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
						<b>Data Alumni Tahun Angkatan <?php echo $data['nama_thn'];?></b> <br>
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
			<h5 class="text-center">Data Alumni Tahun Angkatan <?php echo $data['nama_thn'];?></h5>
			<br />
		<div class="container-fluid">
			<table class="table table-striped table-bordered table-hover" id="tabel-data">
				<thead>
					<tr>
						<th width="1%">No</th>
						<th width="10%">NIS</th>
						<th width="10%">Nama</th>
						<th width="10%">Angkatan</th>
						<th width="10%">Telp</th>
						<th width="10%">Alamat</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$i = 1;
					while($dataku = mysqli_fetch_array($ress)) {
						echo '<tr>';
						echo '<td class="text-cente">'. $i .'</td>';
						echo '<td class="text-left">'. $dataku['nis'] .'</td>';
						echo '<td class="text-left">'. $dataku['nama'] .'</td>';
						echo '<td class="text-left">'. $dataku['nama_thn'] .'</td>';
						echo '<td class="text-left">'. $dataku['telp'] .'</td>';
						echo '<td class="text-left">'. $dataku['alamat'] .'</td>';							
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
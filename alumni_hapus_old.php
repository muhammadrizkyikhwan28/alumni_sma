<?php
include("sess_check.php");
$id = $_GET['nis'];
$sql = "DELETE FROM alumni WHERE nis='" . $id . "'";
$ress = mysqli_query($conn, $sql);
$sqltemp = "DELETE FROM temp_event WHERE nis='" . $id . "'";
$resstemp = mysqli_query($conn, $sqltemp);
header("location: alumni.php?act=delete&msg=success");

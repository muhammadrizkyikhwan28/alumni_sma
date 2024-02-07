<?php
include("sess_check.php");
$id = $_GET['nis'];

// Retrieve file path from the database
$cari = "SELECT foto FROM alumni WHERE nis='" . $id . "'";
$hasil = mysqli_fetch_assoc(mysqli_query($conn, $cari));

// Check if the result is not empty and contains the 'foto' key
if (!empty($hasil['foto'])) {
	$filePath = $hasil['foto'];

	// Attempt to unlink (delete) the file
	if (file_exists($filePath)) {
		if (unlink($filePath)) {
			// If file deletion is successful, proceed with database deletion
			$sql = "DELETE FROM alumni WHERE nis='" . $id . "'";
			$ress = mysqli_query($conn, $sql);

			$sqltemp = "DELETE FROM temp_event WHERE nis='" . $id . "'";
			$resstemp = mysqli_query($conn, $sqltemp);

			// Check if both database deletions were successful
			if ($ress && $resstemp) {
				header("location: alumni.php?act=delete&msg=success");
			} else {
				// Handle the case where there's an error in the database deletion
				header("location: alumni.php?act=delete&msg=database_error");
			}
		} else {
			// Handle the case where file deletion fails
			header("location: alumni.php?act=delete&msg=file_delete_error");
		}
	} else {
		// Handle the case where the file does not exist
		header("location: alumni.php?act=delete&msg=file_not_found");
	}
} else {
	// Handle the case where the database query result is empty
	header("location: alumni.php?act=delete&msg=no_file_in_database");
}

<?php
//error_reporting(0);

$dbhost = "127.0.0.1";
$dbuser = "root";
$dbpass = "";
$dbname = "alumni_smk";

//$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Tidak dapat terhubung ke database: " . mysqli_error());

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn) {
  die("Koneksi gagal: " . mysqli_connect_error());
}

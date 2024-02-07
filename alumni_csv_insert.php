<?php
// include file conn ke database
include("sess_check.php");

// Cek apakah formulir sudah disubmit
if (isset($_POST["submit"])) {
    // Tentukan lokasi folder untuk menyimpan file yang diunggah
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["csv"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Periksa apakah file adalah file CSV
    if ($fileType != "csv") {
        echo "Maaf, hanya file CSV yang diizinkan.";
        $uploadOk = 0;
    }

    // Periksa ukuran file
    if ($_FILES["csv"]["size"] > 500000) {
        echo "Maaf, ukuran file terlalu besar.";
        $uploadOk = 0;
    }

    // Proses unggahan jika semuanya valid
    if ($uploadOk) {
        if (move_uploaded_file($_FILES["csv"]["tmp_name"], $targetFile)) {
            // Baca data CSV
            $csvFile = fopen($targetFile, "r");
            if ($csvFile) {
                // Skip baris pertama (header)
                fgetcsv($csvFile);

                while (($data = fgetcsv($csvFile, 1000, ",")) !== FALSE) {
                    // Lakukan pengolahan data dan masukkan ke dalam tabel
                    $nis = mysqli_real_escape_string($conn, $data[0]);
                    $nama = mysqli_real_escape_string($conn, $data[1]);
                    $id_thn = mysqli_real_escape_string($conn, $data[2]);
                    $univer = mysqli_real_escape_string($conn, $data[3]);
                    $tgl_lahir = mysqli_real_escape_string($conn, $data[4]);
                    $no_wa = mysqli_real_escape_string($conn, $data[5]);
                    $pekerjaan = mysqli_real_escape_string($conn, $data[6]);
                    $alamat = mysqli_real_escape_string($conn, $data[7]);
                    $foto = mysqli_real_escape_string($conn, $data[8]);
                    $alumni_kelas = mysqli_real_escape_string($conn, $data[9]);
                    $prestasi = mysqli_real_escape_string($conn, $data[10]);
                    $jurusan = mysqli_real_escape_string($conn, $data[11]);
                    $alkerja = mysqli_real_escape_string($conn, $data[12]);
                    $ig = mysqli_real_escape_string($conn, $data[13]);
                    $fb = mysqli_real_escape_string($conn, $data[14]);
                    $sosmed = mysqli_real_escape_string($conn, $data[15]);

                    // Query untuk memasukkan data ke dalam tabel
                    $sql = "INSERT INTO alumni (nis, nama, id_thn, univer, tgl_lahir, no_wa, pekerjaan, alamat, foto, alumni_kelas, prestasi, jurusan, alkerja, ig, fb, sosmed) 
                            VALUES ('$nis', '$nama', '$id_thn', '$univer', '$tgl_lahir', '$no_wa', '$pekerjaan', '$alamat', '$foto', '$alumni_kelas', '$prestasi', '$jurusan', '$alkerja', '$ig', '$fb', '$sosmed')";

                    if (mysqli_query($conn, $sql)) {
                        echo "Data berhasil dimasukkan ke dalam database.";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                }
                fclose($csvFile);
                header("location: alumni.php?act=add&msg=success");
                //echo "File " . basename($_FILES["csv"]["name"]) . " berhasil diunggah dan data dimasukkan ke dalam database.";

                // Hapus file sementara
                unlink($targetFile);
            } else {
                // echo "Maaf, gagal membuka file CSV.";
                header("location: alumni_tambah.php?act=add&msg=double");
            }
        } else {
            // echo "Maaf, terjadi kesalahan saat mengunggah file.";
            header("location: alumni_tambah.php?act=add&msg=double");
        }
    }
}

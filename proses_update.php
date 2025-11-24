<?php
include_once "koneksi.php";
session_start();

$nim        = "";
$nama       = "";
$prodi      = "";
$angkatan   = "";
$foto       = "";
$status     = "";
$sukses     = "";
$error      = "";

if (isset($_POST['simpan'])) {

    $nim      = $_POST['nim'];
    $nama     = $_POST['nama'];
    $prodi    = $_POST['prodi'];
    $angkatan = $_POST['angkatan'];
    $status   = $_POST['status'];

    // --- Ambil foto lama untuk fallback jika tidak upload baru ---
    $foto_lama = "";
    if (isset($_POST['nim'])) {
        $sqlFoto = "SELECT foto FROM mahasiswa WHERE nim='$nim'";
        $qFoto   = mysqli_query($koneksi, $sqlFoto);
        $rFoto   = mysqli_fetch_assoc($qFoto);
        $foto_lama = $rFoto['foto'];
    }

    // --- Proses Upload Foto ---
    $foto = $foto_lama; // default = pakai foto lama

    if (!empty($_FILES['foto']['name'])) {
        $namaFile = $_FILES['foto']['name'];
        $tmpFile  = $_FILES['foto']['tmp_name'];

        $folder = "uploads/";
        if (!file_exists($folder)) {
            mkdir($folder, 0777, true);
        }

        $namaBaru = time() . "_" . $namaFile;
        $pathFile = $folder . $namaBaru;

        if (move_uploaded_file($tmpFile, $pathFile)) {
            $foto = $pathFile;
        }
    }

    // --- Validasi ---
    if ($nim && $nama && $prodi && $angkatan && $status) {
        $sql1 = "UPDATE mahasiswa 
                 SET nama='$nama',
                     prodi='$prodi',
                     angkatan='$angkatan',
                     foto='$foto',
                     status='$status'
                 WHERE nim='$nim'";

        $q1 = mysqli_query($koneksi, $sql1);

        if ($q1) {
            $sukses = "Data berhasil diupdate";
            header("Location: index.php?sukses=" . urlencode($sukses));
            exit;
        } else {
            $error = "Data gagal diupdate";
            header("Location: update.php?nim=" . urlencode($nim) . "&error=" . urlencode($error));
            exit;
        }

    } else {
        $error = "Silahkan masukkan semua data";
        header("Location: update.php?nim=" . urlencode($nim) . "&error=" . urlencode($error));
        exit;
    }
}
?>

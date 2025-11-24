<?php
include_once "koneksi.php";
session_start();

$sukses = $_GET['sukses'] ?? "";
$error  = $_GET['error'] ?? "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
    .mx-auto {width:800px}
    .card {margin-top: 10px}
</style>
</head>
<body>
    <div class="mx-auto">
        <!-- untuk memasukkan data -->
        <div class="card">
  <div class="card-header">
    Create Data
  </div>


  <div class="card-body">
    <a href="create.php" class="btn btn-primary mb-3">Tambah Data</a>
    <?php
    if($error){
        ?>
        <div class="alert alert-danger" role="alert">
         <?php echo $error ?>
        </div>
        <?php
    }
    if($sukses){
        ?>
        <div class="alert alert-success" role="alert">
         <?php echo $sukses ?>
        </div>
        <?php
    }
    ?>

<!-- untuk menampilkan data -->
        <div class="card">
  <div class="card-header text-white bg-secondary">
    Data Mahasiswa
  </div>
  <div class="card-body">
    <table class="table">
      <thead>
        <tr>
          
          <th scope="col">NIM</th>
          <th scope="col">Nama</th>
          <th scope="col">Prodi</th>
          <th scope="col">Angkatan</th>
          <th scope="col">Foto</th>
          <th scope="col">Status</th>
          <th scope="col">Aksi</th>
        </tr>
        <tbody>
          <?php 
          $sql2     = "select * from mahasiswa order by nim desc";
          $q2      = mysqli_query($koneksi,$sql2);

          if(!$q2) {
            die("Query error" . mysqli_error($koneksi));
          }

          while($r2 = mysqli_fetch_array($q2)){
            $nim      = $r2['nim'];
            $nama     = $r2['nama'];
            $prodi    = $r2['prodi'];
            $angkatan = $r2['angkatan'];
            $foto     = $r2['foto'];
            $status   = $r2['status'];

            ?>
            <tr>
              <td scope="row"><?php echo $nim?></td>
              <td scope="row"><?php echo $nama?></td>
              <td scope="row"><?php echo $prodi?></td>
              <td scope="row"><?php echo $angkatan?></td>
              <td scope="row">
                <?php if (!empty($foto)):?>
                  <img src="<?php echo $foto ?>" width="50" alt="foto">
                  <?php else: ?>
                    No Image
                    <?php endif; ?>
                </td>
              <td scope="row"><?php echo $status?></td>
              <td scope="row">
                <a href="update.php?nim=<?php echo $nim?>"><button type="button" class="btn btn-warning">Edit</button></a>
                <a href ="delete.php?nim=<?php echo $nim?>" onclick = "return confirm('Apakah anda yakin ingin delete data?')"><button type="button" class="btn btn-danger">Delete</button></a>
                
              </td>
              
            </tr>
            <?php
          }
          ?>
        </tbody>
      </thead>
    </table>
  </div>

</div>
    </div>
</body>
</html>
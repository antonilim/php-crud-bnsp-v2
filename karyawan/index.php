<!doctype html>
<?php
session_start();
include('includes/config.php');
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Universitas</title>
  </head>
  <body>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- JavaScript untuk menampilkan Modal -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <nav class="navbar navbar-expand-lg bg-warning">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Data Karyawan</a>
        </li>  
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<h1 h1 style="text-align:center">Data Karyawan</h1>
<div class="container">
<a href="karyawan_formadd.php" type="button" class="btn btn-primary">Add </a>
<table class="table">
  <thead>
  <tr>
      <th scope="col">NO</th>
      <th scope="col">Kode</th>
      <th scope="col">Nama</th>
      <th scope="col">Tanggal</th>
      <th scope="col">No Telpon</th>
      <th scope="col">Jabatan</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php 
        $nomor = 0;
        $sqlkaryawan = "SELECT * FROM karyawan ORDER BY karyawan.nama ASC";
        $querykaryawan = mysqli_query($koneksidb,$sqlkaryawan);
        while ($result = mysqli_fetch_array($querykaryawan)){
            $nomor++;
            ?>
        <tr>
            <td><?php echo htmlentities($nomor);?></td>
            <td><?php echo htmlentities($result['kode']);?></td>
            <td><?php echo htmlentities($result['nama']);?></td>
            <td><?php echo htmlentities($result['tanggal']);?></td>
            <td><?php echo htmlentities($result['telpon']);?></td>
            <td><?php echo htmlentities($result['jabatan']);?></td>
        <td class='text-left'>
            <a class='btn btn-warning btn-sm' data-bs-toggle='modal' data-bs-target='#konfirmasi_update' data-href="karyawan_formedit.php?id=<?php echo $result['id'];?>"> Update </a>
            <a class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#konfirmasi_hapus' data-href="karyawan_hapus.php?id=<?php echo $result['id'];?>">Delete</a>

        <!-- Modal update -->
            <div class="modal fade" id="konfirmasi_update" tabindex="-1" aria-labelledby="myModalUpdate" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin mengubah data karyawan ini?</p>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-primary btn-sm btn-ya"> Ya</a>
                            <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Tidak</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal delete -->
            <div class="modal fade" id="konfirmasi_hapus" tabindex="-1" aria-labelledby="myModalHapus" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus data karyawan ini?</p>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-primary btn-sm btn-ya"> Ya</a>
                            <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Tidak</button>
                        </div>
                    </div>
                </div>
            </div>
        <!-- JavaScript untuk menampilkan modal -->
        <script>
            $(document).ready(function() {
                $('#konfirmasi_update').on('show.bs.modal', function(e) {
                    $(this).find('.btn-ya').attr('href', $(e.relatedTarget).data('href'));
                });
                $('#konfirmasi_hapus').on('show.bs.modal', function(e) {
                    $(this).find('.btn-ya').attr('href', $(e.relatedTarget).data('href'));
                });
            });
        </script>
        </td>
    </tr>
    <?php } ?>
    </tbody>
    </table>
<div> 
  </body>
</html>
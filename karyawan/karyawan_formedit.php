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
<h1 h1 style="text-align:center">Update Data Karyawan</h1>
<div class="container">
    <form method="post" name="theform" action="karyawan_prosesedit.php" class="form-horizontal" onsubmit="return valid(this);" enctype="multipart/form-data">
    <?php
	    $id=$_GET['id'];
		$sql ="SELECT * FROM karyawan WHERE id='$id'";
		$query = mysqli_query($koneksidb,$sql);
		$result = mysqli_fetch_array($query);
	?>
    <div class="mb-8">
        <div class="col col-lg-4">
            <label for="exampleFormControlInput1" class="form-label">Kode</label>
            <input type="hidden" name="id" class="form-control" value="<?php echo $id;?>" required>
            <input type="text" class="form-control" value="<?php echo htmlentities($result['kode']);?>" name="kode" id="kode" required>
        </div>

        <div class="col col-lg-4">
            <label for="exampleFormControlInput1" class="form-label">Nama</label>
            <input type="text" class="form-control" value="<?php echo htmlentities($result['nama']);?>" name="nama" id="nama" required> 
        </div>

        <div class="col col-lg-4">
            <label for="exampleFormControlInput1" class="form-label">Tanggal</label>
            <input type="date" class="form-control" value="<?php echo htmlentities($result['tanggal']);?>" name="tanggal" id="tanggal" required>
        </div>

        <div class="col col-lg-4">
            <label for="exampleFormControlInput1" class="form-label">No Telpon</label>
            <input type="text" class="form-control" value="<?php echo htmlentities($result['telpon']);?>" name="telpon" id="telpon" required>
        </div>

        <div class="col col-lg-4">
        <label for="exampleFormControlInput1" class="form-label">Jabatan</label>
        <select class="form-select" name="jabatan" id="jabatan" aria-label="Default select example" required>
        <?php
			$jabatan = $result['jabatan'];
            echo "<option value='$jabatan' selected>".$jabatan."</option>";
            echo "<option value='Boss'>Boss</option>";
            echo "<option value='Wakil Boss'>Wakil Boss</option>";
            echo "<option value='Anak Buah'>Anak Buah</option>";
        ?>
        </select>
        </div>
        <br>
        <div class="col col-lg-4">
            <button class="btn btn-primary" type="submit">Simpan</button>
            <a href="index.php" class="btn btn-outline-primary">Batal</a>
        </div>
    </div>
    </form>
    </div>
  </body>


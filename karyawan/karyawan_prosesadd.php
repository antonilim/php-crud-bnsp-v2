<?php
include('includes/config.php');
$kode	= $_POST['kode'];
$nama	= $_POST['nama'];
$tanggal	= $_POST['tanggal'];
$telpon	= $_POST['telpon'];
$jabatan	= $_POST['jabatan'];
$sql 	= "INSERT INTO karyawan (kode,nama,tanggal,telpon,jabatan) VALUES ('$kode','$nama','$tanggal','$telpon','$jabatan')";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	echo "<script type='text/javascript'>
			alert('Berhasil tambah data karyawan.'); 
			document.location = 'index.php'; 
		</script>";

}else {
	echo "<script type='text/javascript'>
			alert('Data belum berhasil di Input, silahkan coba lagi!.');
			document.location = 'karyawan_formadd.php?kode=$kode'; 
		</script>";
}
?>
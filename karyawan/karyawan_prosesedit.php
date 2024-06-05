<?php
include('includes/config.php');
$id		= $_POST['id'];
$kode	= $_POST['kode'];
$nama	= $_POST['nama'];
$tanggal	= $_POST['tanggal'];
$telpon	= $_POST['telpon'];
$jabatan	= $_POST['jabatan'];
$sql 	= "UPDATE mahasiswa SET kode='$kode', nama='$nama', tanggal='$tanggal', telpon='$telpon', jabatan='$jabatan' WHERE id='$id'";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	echo "<script type='text/javascript'>
			alert('Berhasil edit data.'); 
			document.location = 'index.php'; 
		</script>";

}else {
	echo "<script type='text/javascript'>
			alert('Data belum berhasil di Update, silahkan coba lagi!.'); 
			document.location = 'karyawan_formedit.php?kode=$kode'; 
		</script>";

}
?>
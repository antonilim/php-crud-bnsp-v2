<?php
$myHost	= "localhost";
$myUser	= "root";
$myPass	= "";
$myDbs	= "karyawan";
$koneksidb = mysqli_connect( $myHost, $myUser, $myPass, $myDbs);
if (! $koneksidb) {
  echo "Failed Connection !";
}
?>
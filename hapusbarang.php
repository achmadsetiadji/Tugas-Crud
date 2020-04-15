<?php
$kb = $_GET['kode_produk'];
include('lib/koneksi.php');
$kun = $koneksi;

$sql = mysqli_query($kun, "DELETE FROM `data_barang` WHERE `kode_produk`= '$kb'");
if ($sql) {
    header("location: databarang.php");
    echo "Data Berhasil Dihapus";
} else {
    echo "Data Gagal Dihapus";
}
?>;
<?php
include('lib/koneksi.php');
$kun = $koneksi;

$kodeproduk = $_POST['kode_produk'];
$namaproduknew = $_POST['nama_produk'];
$hargaproduknew = $_POST['harga_produk'];
$satuannew = $_POST['satuan'];
$kategorinew = $_POST['kategori'];
$gambarnew = $_POST['gambar'];
$stokawalnew = $_POST['stok'];

$sql = mysqli_query($kun, "UPDATE `data_barang` SET `nama_produk` = '$namaproduknew', `harga_produk` = '$hargaproduknew', `satuan` = '$satuannew', `kategori` = '$kategorinew', `urlgambar` = '$gambarnew', `stok_awal` = '$stokawalnew' WHERE `data_barang`.`kode_produk` = '$kodeproduk';");

if ($sql == true) {
    header("location: databarang.php");
    echo "Data Berhasil Diedit";
} else {
    echo "Data Gagal Diedit";
}
?>;
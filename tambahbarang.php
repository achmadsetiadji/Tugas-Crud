<?php
include('lib/koneksi.php');

$kun = $koneksi;

$kodeproduk = $_POST['kode_produk'];
$namaproduk = $_POST['nama_produk'];
$hargaproduk = $_POST['harga_produk'];
$satuan = $_POST['satuan'];
$kategori = $_POST['kategori'];
$gambar = $_POST['gambar'];
$stokawal = $_POST['stok'];

$sql = mysqli_query($kun, "INSERT INTO `data_barang` (`kode_produk`, `nama_produk`, `harga_produk`, `satuan`, `kategori`, `urlgambar`, `stok_awal`) VALUES ('$kodeproduk', '$namaproduk', '$hargaproduk', '$satuan', '$kategori', '$gambar', '$stokawal');");


if ($sql == true) {
    header("location: databarang.php");
    echo "Data Berhasil Ditambahkan";
} else {
    echo "Data Gagal Ditambahkan";
}
?>;
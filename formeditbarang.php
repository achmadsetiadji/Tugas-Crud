<?php
include('lib/koneksi.php');
$kp = $_GET['kode_produk'];
$kun = $koneksi;

$sql = mysqli_query($kun, "SELECT * FROM data_barang where kode_produk = '$kp' ");

while ($data = mysqli_fetch_array($sql)) {
    $kodeproduk = $data['kode_produk'];
    $namaproduk = $data['nama_produk'];
    $hargaproduk = $data['harga_produk'];
    $satuan = $data['satuan'];
    $kategori = $data['kategori'];
    $gambar = $data['urlgambar'];
    $stokawal = $data['stok_awal'];
}
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Edit Barang</title>
</head>

<body>
    <div class="form mt-3 mb-3 border border-dark pt-3 pr-3 pl-3 pb-3" style="width: 500px; margin-left: 400px">
        <h4 class="text-center">Form Input Master</h4>
        <form action="editbarang.php" method="POST">
            <div class="form-group">
                <label for="exampleFormControlInput1">Kode Produk</label>
                <input type="text" class="form-control form-control-sm" name="kode_produk" readonly  value="<?= $kodeproduk; ?>">
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Nama Produk</label>
                <input type="text" class="form-control form-control-sm" name="nama_produk" value="<?= $namaproduk; ?>">
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Harga Produk</label>
                <input type="text" class="form-control form-control-sm" name="harga_produk" value="<?= $hargaproduk; ?>">
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Satuan</label>
                <select class="form-control form-control-sm" name="satuan" value="<?= $satuan; ?>">
                    <option>Piring</option>
                    <option>Botol</option>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Kategori</label>
                <select class="form-control form-control-sm" name="kategori" value="<?= $kategori; ?>">
                    <option>Makanan</option>
                    <option>Minuman</option>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">URL Gambar</label>
                <input type="text" class="form-control form-control-sm" name="gambar" value="<?= $gambar; ?>">
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Stok Awal</label>
                <input type="text" class="form-control form-control-sm" name="stok" value="<?= $stokawal; ?>">
            </div>

            <button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>

        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>
<?php
include('lib/koneksi.php');

$sql = "SELECT max(kode_produk) as maxKode FROM data_barang";
$hasil = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($hasil);

$nilaikode = substr($data[0], 3);
$kode = (int) $nilaikode;
$kode = $kode + 1;

if ($data) {
    $nilaikode = substr($data[0], 3);
    $kode = (int) $nilaikode;
    $kode = $kode + 1;
    $hasilkode = "MD-" . str_pad($kode, 4, "0", STR_PAD_LEFT);
} else {
    $hasilkode = "MD-0001";
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
    <title>Tambah Barang</title>
</head>

<body>
    <div class="form mt-3 mb-3 border border-dark pt-2 pr-2 pl-2 pb-2" style="width: 500px; margin-left: 450px">
        <h4 class="text-center">Form Input Master dan Stock Data Barang</h4>
        <hr>
        <form action="tambahbarang.php" method="POST">
            <div class="form-group">
                <label for="exampleFormControlInput1">Kode Produk</label>
                <input type="text" class="form-control form-control-sm" name="kode_produk" value="<?php echo $hasilkode; ?>" readonly value="">
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Nama Produk</label>
                <input type="text" class="form-control form-control-sm" name="nama_produk">
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Harga Produk</label>
                <input type="text" class="form-control form-control-sm" name="harga_produk">
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Satuan</label>
                <select class="form-control form-control-sm" name="satuan">
                    <option>Piring</option>
                    <option>Botol</option>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Kategori</label>
                <select class="form-control form-control-sm" name="kategori">
                    <option>Makanan</option>
                    <option>Minuman</option>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">URL Gambar</label>
                <input type="text" class="form-control form-control-sm" name="gambar">
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Stok Awal</label>
                <input type="text" class="form-control form-control-sm" name="stok">
            </div>

            <button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>

        </form>
    </div>

    <?php
    include('lib/koneksi.php');
    $kun = $koneksi;
    $allbarang = mysqli_query($kun, "SELECT * FROM data_barang");
    $no = 1;
    ?>;
    <div style="width: 1000px; margin-left: 180px" class="form mt-4 mb-4 border border-dark pt-4 pr-4 pl-4 pb-4">
        <h3 class="text-center">Data Barang</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="text-center align-middle">No</th>
                    <th scope="col" class="text-center align-middle">Kode Produk</th>
                    <th scope="col" class="text-center align-middle">Nama Produk</th>
                    <th scope="col" class="text-center align-middle">Harga Produk</th>
                    <th scope="col" class="text-center align-middle">Satuan</th>
                    <th scope="col" class="text-center align-middle">Kategori</th>
                    <th scope="col" class="text-center align-middle">Stok</th>
                    <th scope="col" class="text-center align-middle">Gambar</th>
                    <th scope="col" class="text-center align-middle">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($allbarang as $databarang) : ?>
                    <tr>
                        <th scope="row" class="text-center align-middle"><?= $no++; ?></th>
                        <td class="text-center align-middle"><?php echo $databarang['kode_produk'] ?></td>
                        <td class="text-center align-middle"><?php echo $databarang['nama_produk'] ?></td>
                        <td class="text-center align-middle"><?php echo $databarang['harga_produk'] ?></td>
                        <td class="text-center align-middle"><?php echo $databarang['satuan'] ?></td>
                        <td class="text-center align-middle"><?php echo $databarang['kategori'] ?></td>
                        <?php
                        $nilai = $databarang['stok_awal'];
                        $color;
                        if ($nilai < 5) {
                            $color = "style='background-color: #FA8072; color: white'";
                        } else {
                            $color = "style='background-color: white;'";
                        }
                        ?>
                        <td class="text-center align-middle" <?= $color ?>><?php echo $databarang['stok_awal'] ?></td>
                        <td><img src="<?= $databarang['urlgambar'] ?>" width=100></td>
                        <td>
                            <a href="formeditbarang.php?kode_produk=<?= $databarang['kode_produk']; ?>" class="btn btn-sm btn-success" style="margin-top: 35px">edit</a>
                            <a href="hapusbarang.php?kode_produk=<?= $databarang['kode_produk']; ?>" class="btn btn-sm btn-danger" style="margin-top: 35px">delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>
<?php

$DB_HOST = "localhost";
$DB_DATABASE = "inventory_barang";
$DB_USERNAME = "root";
$DB_PASSWORD = "";
$DB_PORT = "3306";
// create connection
$koneksi = new mysqli($DB_HOST, $DB_USERNAME, $DB_PASSWORD,  $DB_DATABASE);
// check connection
if ($koneksi->connect_error) {
    die('Koneksi Gagal :' . $koneksi->connect_error);
}
return $koneksi;

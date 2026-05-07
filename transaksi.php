<?php

require_once 'class/product.php';

$product = new product();

$data = $product->getById($_GET['id']);

if(!isset($_GET['id'])){

    die("ID produk tidak ditemukan");
}
$row = $data->fetch_assoc();

?>

<h2>Transaksi Produk</h2>

<p>
Nama Produk:
<?= $row['nama_produk']; ?>
</p>

<p>
Stok Saat Ini:
<?= $row['stok']; ?>
</p>

<form action="proses_transaksi.php" method="POST">

    <input type="hidden"
           name="id"
           value="<?= $row['id']; ?>">

    Jumlah Transaksi:
    <br>

    <input type="number"
           name="jumlah"
           required>

    <br><br>

    <button type="submit">
        Simpan Transaksi
    </button>

</form>
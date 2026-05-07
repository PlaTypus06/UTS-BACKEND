<?php

require_once 'class/product.php';
$product = new product();
$data = $product->getById($_GET['id']);
$row = $data->fetch_assoc();

?>

<h2>Edit Product</h2>

<form action="update.php" method="POST">

    <input type="hidden"
           name="id"
           value="<?= $row['id']; ?>">

    Nama Produk:
    <br>

    <input type="text"
           name="nama"
           value="<?= $row['nama_produk']; ?>">

    <br><br>

    Kategori:
    <br>

    <select name="kategori">

        <option value="laptop">
            Laptop
        </option>

        <option value="smartphone">
            Smartphone
        </option>

    </select>

    <br><br>

    Harga:
    <br>

    <input type="number"
           name="harga"
           value="<?= $row['harga']; ?>">

    <br><br>

    Stok:
    <br>

    <input type="number"
           name="stok"
           value="<?= $row['stok']; ?>">

    <br><br>

    <button type="submit">
        Update
    </button>

</form>

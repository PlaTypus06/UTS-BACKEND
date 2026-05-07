<?php

require_once 'class/product.php';

$product = new product();

$product->tambah($_POST['nama'], $_POST['kategori'], $_POST['stok'], $_POST['harga']);

header("Location: index.php");

?>
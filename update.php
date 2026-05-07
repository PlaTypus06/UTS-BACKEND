<?php

require_once 'class/product.php';

$product = new product();

$product->update(

    $_POST['id'],
    $_POST['nama'],
    $_POST['kategori'],
    $_POST['stok'],
    $_POST['harga']

);

header("Location: index.php");
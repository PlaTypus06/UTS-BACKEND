<?php

require_once 'class/product.php';

$product = new product();

$product->transaksi(

    $_POST['id'],
    $_POST['jumlah']

);

header("Location: index.php");
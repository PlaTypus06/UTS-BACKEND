<?php

require_once 'class/product.php';

$product = new product();

$product->hapus($_GET['id']);

header("Location: index.php");
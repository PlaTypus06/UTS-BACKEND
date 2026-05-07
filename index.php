


<?php

require_once 'class/product.php';

$product = new product();
$data = $product->tampil();

?>

<h2>Daftar Produk</h2>

<a href="tambah.php">Tambah Produk</a>

<br><br>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    <?php while($row = $data->fetch_assoc()) : ?>

    <tr>
        <td><?= $row['id']; ?></td>

        <td><?= $row['nama_produk']; ?></td>

        <td><?= $row['harga']; ?></td>

        <td><?= $row['stok']; ?></td>


        <td>
        <?php 

        if ($row ['stok'] < 5 ) {
            echo "STOK MENIPIS";
        }else{
            echo "STOK AMAN";
        }
        ?>
        </td>

        <td>
            <a href="edit.php?id=<?= $row['id']; ?>">Edit</a>

            <br>

            <a href="hapus.php?id=<?= $row['id']; ?>"onclick="return confirm('Yakin ingin hapus data?')">Hapus</a>

            <br>

            <a href="transaksi.php?id=<?= $row['id']; ?>">Transaksi</a>
        </td>



    </tr>

    <?php endwhile; ?>
</table>
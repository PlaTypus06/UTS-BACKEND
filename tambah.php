<h2>Tambah Produk</h2>

<form action="proses_tambah.php" method="POST">
    <label for="nama">Nama Produk:</label>
    <input type="text" name="nama" id="nama" required><br><br>

    <label for="kategori">Kategori:</label>
    <select name="kategori" id="kategori" required>
        <option value="laptop">Laptop</option>
        <option value="smartphone">Smartphone</option>
    </select><br><br>

    <label for="harga">Harga:</label>
    <input type="number" name="harga" id="harga" required><br><br>

    <label for="stok">Stok:</label>
    <input type="number" name="stok" id="stok" required><br><br>

    <input type="submit" value="Tambah Produk">
</form>
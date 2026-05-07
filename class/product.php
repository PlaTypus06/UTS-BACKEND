<?php

require_once 'config/koneksi.php';

class product extends database {
    //method tambah
    public function tambah($nama, $kategori, $stok, $harga){

    //validasi stok
    if ($stok < 0) {
        echo "Stok tidak boleh negatif.";
        return;
    }

    $sql = "INSERT INTO product (nama_produk, kategori, stok, harga) VALUES (?, ?, ?, ?)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("ssii", $nama, $kategori, $stok, $harga);

    $stmt->execute();
}

    //menampilkan produk
    public function tampil(){
        $sql = "SELECT * FROM product";
        return $this->conn->query($sql);
    }

    //method transaksi kurangi stok
    public function transaksi($id, $jumlah){
        if ($jumlah < 0) {
            echo "Jumlah transaksi tidak boleh negatif.";
            return;
        }

        //ambil stok saat ini
        $cek = $this->conn->query("SELECT stok FROM product WHERE id='$id'");
    

    $data = $cek -> fetch_assoc();
    $stok = $data['stok'];


    //validasi stok 
    if ($stok - $jumlah < 0) {
        die ("Stok tidak mencukupi untuk transaksi.");
    }

    $stok_baru = $stok - $jumlah;

    //update stok
    $update = "UPDATE product SET stok=? WHERE id=?";

    $stmt = $this->conn->prepare($update);
    $stmt->bind_param("ii", $stok_baru, $id);
    $stmt->execute();

    //simpan transaksi
    $trx = "INSERT INTO transactions (id_produk, jumlah) VALUES (?, ?)";

    $stmt2 = $this->conn->prepare($trx);
    $stmt2->bind_param("ii", $id, $jumlah);

    return $stmt2->execute();

    }

    //menampilkan jika stok menipis
    public function stok_menipis(){
        $sql = "SELECT * FROM product WHERE stok < 5";
        return $this->conn->query($sql);
    }


    public function getById($id){

    $sql = "SELECT * FROM product WHERE id=?";

    $stmt = $this->conn->prepare($sql);

    $stmt->bind_param("i", $id);

    $stmt->execute();

    return $stmt->get_result();
}

//methood update
public function update(
    $id,
    $nama,
    $kategori,
    $stok,
    $harga
){

    if($stok < 0){

        die("Stok tidak boleh negatif");
    }

    $sql = "UPDATE product
            SET nama_produk=?,
                kategori=?,
                stok=?,
                harga=?
            WHERE id=?";

    $stmt = $this->conn->prepare($sql);

    $stmt->bind_param(
        "ssidi",
        $nama,
        $kategori,
        $stok,
        $harga,
        $id
    );

    return $stmt->execute();
}

//method delete
public function hapus($id){

    $sql = "DELETE FROM product WHERE id=?";

    $stmt = $this->conn->prepare($sql);

    $stmt->bind_param("i", $id);

    return $stmt->execute();
}
}
?>
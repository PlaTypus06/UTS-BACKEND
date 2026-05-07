-- DB UTS

CREATE DATABASE inventory;

USE inventory;

CREATE TABLE product (
id INT auto_increment primary key,
nama_produk varchar (100) not null,
kategori enum ('laptop', 'smartphone') not null,
stok int not null,
harga decimal (10, 2) not null
);

create table transactions (
id int auto_increment primary key,
id_produk int,
jumlah int not null,
tanggal timestamp default current_timestamp,

foreign key (id_produk) references product(id)
);



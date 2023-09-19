<?php

//untuk memanggil file c_barang
include_once '../controller/C_barang.php';

//membuat vaariabel yang bertipe data objek dari kelas c_barang
$barang = new C_barang();

if ($_GET['aksi'] == 'tambah'){
    
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $qty = $_POST['qty'];
    $harga = $_POST['harga'];
    $photo = $_POST['photo'];

    //cara memanggil method atau function tambah
    $barang->tambah($id = 0, $nama, $qty, $harga, $photo);

} elseif ($_GET['aksi'] == 'hapus') {
    
    $id = $_GET['id'];

    $barang->delete($id);
}

?>
<?php

//nama kelas harus sama dengan nama file
//class dalam pbo adalah blueprint atau prototype dari sebuah objek

class C_koneksi{
    //ini adalah fungsi atau methood yang kita beri nama conn yang dimana fungsi ini akan terkoneksi ke database kasir_rpl2
    
    public function conn(){
        $conn = mysqli_connect('localhost','root','', 'kasir_rpl2');

        if(!$conn){
           die("koneksi gagal :". mysqli_connect_error());
        }else{
            return $conn;
           //echo "koneksi berhasil";
        }
    }
}

// instansiasi object atau membuat object
// $conn type object
$conn = new C_koneksi();
//cara memanggil fungsi atau method yang ada didalam class
$conn->conn();


?>
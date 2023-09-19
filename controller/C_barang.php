<?php

include_once 'C_koneksi.php';

    class C_barang{
    // variable lokal    
    // public $id;


        public function tambah($id, $nama, $qty, $harga, $photo){
        $conn = new C_koneksi();

            $sql = "INSERT INTO barang VALUES ('$id','$nama','$qty','$harga','$photo')";

            $query = mysqli_query($conn->conn(), $sql);
            
            if ($query) {
                echo "data barang berhasil ditambahkan banggg";
           }else{
               echo "data barang gagal ditambahkan cuyyy";
           }
        }
        public function tampil(){
        $conn = new C_koneksi();

            $sql = "SELECT * FROM barang ORDER BY id DESC";

            $query = mysqli_query($conn->conn(), $sql);

            while ($q = mysqli_fetch_object($query)) {
              
                $hasil[] = $q;
        }

        return $hasil;
    }
    
        public function edit($id){
            // variable global
            $conn = new C_koneksi();

            $sql= "SELECT *FROM barang WHERE id =$id ";

            $query = mysqli_query($conn->conn(), $sql);

            while ($q = mysqli_fetch_object($query)) {
              
                $hasil[] = $q;
        }

        return $hasil;
            
        }
        public function update($id){
          // variable global
            $conn = new C_koneksi();
    
            $sql= "UPDATE barang SET nama_barang = '$nama', qty = '$qty', harga= '$harga'
            , photo = '$photo' WHERE id='$id'";

            if ($query) {
                echo "data berhasil diubah";
            }else{
                echo "data barang gagal diubah";
}
        }
        
        public function delete($id){
            // variable global
         $conn = new C_koneksi();

            $sql = "DELETE FROM barang WHERE id=$id";
            
            mysqli_query($conn->conn(), $sql);

            header("Location:../views/barang.php");
        }
    }     
?>
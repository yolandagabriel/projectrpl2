<?php
session_start();
include_once 'C_koneksi.php';
// buat file di folder controller, nama filenya C_login.php
// didalam file tsb memiliki dua fungsi atau method
//1. register
//2. login 

class C_login{
    //untuk windows, MCOS, ubuntu
    //ini adalah  fungsi dan method untuk memasukan data ke dalam tabel user 
    function register($id,$nama,$email,$pass,$role){
        //instansisasi object atau membuat object dar class C_koneksi
        $conn= new C_koneksi();
       //ini adalah perintah untuk memasukan data kedalam tabel user 
        $sql = "INSERT INTO baru VALUES ('$id','$nama', '$email', '$pass', '$role','')";

        // var_dump($sql);
       //ini code eksekutor 

      $query = mysqli_query($conn->conn(), $sql);

      if ($query) {
          echo "data berhasil ditambahkan";
      }else{
          echo "data gagal ditambahkan";
      }
    }
 
    function login($email=null,$pass=null){
    // ini adalah fungsi dari method login

     //ini membuat sebuah variable yang bertipe data objek dari kelas koneksi
     $conn = new C_koneksi();
    
     //untuk mengecek tombol login sudah ditekan / di klik oleh user
     if (isset($_POST['login'])){
        //perintah untuk mengambil email semua data dari tabel user berdasarkan email yang di inputkan 
        $sql = "SELECT * from baru WHERE email = '$email'";
        
        // eksekutor perintah diatas 
        $query = mysqli_query($conn->conn(), $sql);

        //assoc = array asosiatif -> key / index nya berupa string / huruf
        $data = mysqli_fetch_assoc($query);
  
        //arry biasa -> key / index nya berupa angka, dimulai dari 0 - tak terhingga
       // $data = mysqli_fetch_array($query);

       //mengecek apakah ada data dari hasil $query
        if ($data) {
           // ini menggunakan array biasa
            //password_verify($pass, $data['3'])
            //menggunakan array assosiatif 
            //untuk membandingkan inputan password dari user dengan password dari tabel user
            if (password_verify($pass, $data['pass'])) {

               // untuk role pengguna sebagai admin
               if ($data['role'] =='admin'){
                
                //mebuat pariabel session yang nantinya akan digunakan pada halaman home user / login sebagai user 
                $_SESSION["data"] = $data;
                $_SESSION["role"] = $data["role"];

                //jika login berhasil dan rolenya sebagai admin maka akan berpindah kehalaman home 
                header("Location: ../view/home.php");
                exit;

                // untuk role pengguna sebagai user
               }elseif ($data['role'] =='user'){
                
                $_SESSION["data"] = $data;
                $_SESSION["role"] = $data["role"];
               
                //jika login berhasil dan rolenya sebagai user maka akan berpindah kehalaman home 
                header("Location: ../view/home_user.php");
                exit;
                // untuk role pengguna sebagai user
              

                // untuk role pengguna bukan sebagai admin dan user  
               }else{
                echo"ga bener cuyy";
               }

             //jika kondisi tdk terpenuhi pada baris 57   
            }else{
                echo"ga bener cuyy";
            }
        }


     }
    }
}
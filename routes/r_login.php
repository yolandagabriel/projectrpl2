<?php

include_once '../controller/C_login.php';

$login = new C_login();

    if ($_GET['aksi'] == 'register' ) {

        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        // merubah password sehingga tidak bisa dibaca
        $pass= password_hash($pass, PASSWORD_DEFAULT);
        $role = $_POST['role'];
        
        //memanggil method register
        $login->register($id=0, $nama, $email, $pass, $role);
        
    }elseif ($_GET['aksi'] == 'login') {

        $email = $_POST['email'];
        $pass = $_POST['password'];

        //memanggil method login
        $login->login($email,$pass);
    }

?>
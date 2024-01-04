<?php
if ($_POST) {
    $nama_user = $_POST['nama_user'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $gender = $_POST['gender'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Check if 'id_kelas' key exists in the $_POST array
    $id_kelas = isset($_POST['id_kelas']) ? $_POST['id_kelas'] : null;

    if (empty($nama_user)) {
        echo "<script>alert('nama user tidak boleh kosong');location.href='log-sederhana.php';</script>";
    } elseif (empty($username)) {
        echo "<script>alert('username tidak boleh kosong');location.href='log-sederhana.php';</script>";
    } elseif (empty($password)) {
        echo "<script>alert('password tidak boleh kosong');location.href='log-sederhana.php';</script>";
    } else {
        include "koneksi.php";
        $insert = mysqli_query($koneksi, "INSERT INTO user (nama_user, tanggal_lahir, gender, alamat, username, password, id_kelas) 
        VALUES ('$nama_user', '$tanggal_lahir', '$gender', '$alamat', '$username', '" . md5($password) . "', '$id_kelas')")
        or die(mysqli_error($koneksi));
        
        if ($insert) {
            echo "<script>alert('Sukses menambahkan user');location.href='log-sederhana.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan user');location.href='log-sederhana.php';</script>";
        }
    }
}
?>

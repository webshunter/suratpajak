<?php
session_start();

// Panggil koneksi config.php untuk koneksi database
require_once "../../config/config.php";

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login
if (empty($_SESSION['sias_user_account_name']) && empty($_SESSION['sias_user_account_password'])){
    echo "<meta http-equiv='refresh' content='0; url=../../login-error'>";
}
// jika user sudah login, maka jalankan perintah untuk insert, update, dan delete
else {
    // jika action = insert maka jalankan perintah insert data
    if ($_GET['act']=='insert') {
        if (isset($_POST['simpan'])) {

            // ambil data hasil submit dari form
            $nama = $mysqli->real_escape_string(trim($_POST['nama']));
            $email  = $mysqli->real_escape_string(trim($_POST['email']));
            $pesan = $_POST['pesan'];
            $dates = date('Y-m-d H:i');

            // perintah query untuk mengecek nama buku tamu
            $result = $mysqli->query("SELECT nama FROM buku_tamu WHERE nama='$nama'")
                                      or die('Ada kesalahan pada query tampil data nama: '.$mysqli->error);
            $rows = $result->num_rows;

            // jika nama buku tamu sudah ada
            if ($rows > 0) {
                // tampilkan pesan gagal simpan data
                header("location: ../../buku-tamu-error4-$nama");
            }
            // jika nama buku tamu belum ada
            else {
                // perintah query untuk menyimpan data ke tabel buku tamu
                $insert = $mysqli->query("INSERT INTO buku_tamu(nama, email, pesan, tanggal)
                                          VALUES('$nama','$email','$pesan','$dates')")
                                          or die('Ada kesalahan pada query insert : '.$mysqli->error);

                // cek query
                if ($insert) {
                    // jika berhasil tampilkan pesan berhasil simpan data
                    header("location: ../../buku-tamu-success-add");
                }
            }
        }   
    }
    
    // jika action = update maka jalankan perintah update data
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id'])) {
                // ambil data hasil submit dari form
                $id   = $mysqli->real_escape_string(trim($_POST['id']));
                $nama = $mysqli->real_escape_string(trim($_POST['nama']));
                $email = $mysqli->real_escape_string(trim($_POST['email']));
                $pesan = $_POST['pesan'];
          

                // perintah query untuk mengubah data pada tabel buku tamu
                $update = $mysqli->query("UPDATE buku_tamu SET nama = '$nama',
                                                              email        = '$email',
                                                              pesan  = '$pesan'
                                                        WHERE id   = '$id'")
                                          or die('Ada kesalahan pada query update : '.$mysqli->error);

                // cek query
                if ($update) {
                    // jika berhasil tampilkan pesan berhasil update data
                    header("location: ../../buku-tamu-success-update");
                }
            }
        }
    }      
    
    // jika action = delete maka jalankan perintah delete data
    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // perintah query untuk menampilkan data dari tabel buku tamu
            $result = $mysqli->query("SELECT id, nama FROM buku_tamu WHERE id='$id'")
                                      or die('Ada kesalahan pada query tampil data buku tamu: '.$mysqli->error);
            $data = $result->fetch_assoc();

            $nama = $data['nama'];
            $deleted_user  = $_SESSION['sias_userID'];
            $action        = "Delete";
            $description   = "<b>Delete</b> data pada tabel <b>buku tamu</b>. <br> <b>[ID: </b>".$id."<b>][Nama : </b>".$nama."<b>]";

                // perintah query untuk menghapus data pada tabel buku tamu
                $delete = $mysqli->query("DELETE FROM buku_tamu WHERE id='$id'")
                                          or die('Ada kesalahan pada query delete : '.$mysqli->error);

                // cek hasil query
                if ($delete) {
                    // perintah query untuk menyimpan data ke tabel sys_audit_trail
                    $insert = $mysqli->query("INSERT INTO sys_audit_trail(username,action,description)
                                              VALUES('$deleted_user','$action','$description')")
                                              or die('Ada kesalahan pada query insert : '.$mysqli->error);

                    // cek hasil query
                    if ($insert) {
                        // jika berhasil tampilkan pesan berhasil delete data
                        header("location: buku-tamu-success-delete");
                    }
                }
            
        }
    }    
}       
?>
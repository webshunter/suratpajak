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
            // fungsi untuk membuat id_instansi
            $result = $mysqli->query("SELECT max(id_instansi) as kode FROM instansi")
                                      or die('Ada kesalahan pada query tampil data id_instansi: '.$mysqli->error);
            $data = $result->fetch_assoc();

            $id_instansi   = $data['kode'] + 1;
            // ambil data hasil submit dari form
            $nama_instansi = $mysqli->real_escape_string(trim($_POST['nama_instansi']));
            $alamat        = $mysqli->real_escape_string(trim($_POST['alamat']));

            $created_user  = $_SESSION['sias_userID'];

            // perintah query untuk mengecek nama instansi
            $result = $mysqli->query("SELECT nama_instansi FROM instansi WHERE nama_instansi='$nama_instansi'")
                                      or die('Ada kesalahan pada query tampil data nama instansi: '.$mysqli->error);
            $rows = $result->num_rows;

            // jika nama instansi sudah ada
            if ($rows > 0) {
                // tampilkan pesan gagal simpan data
                header("location: ../../instansi-error1-$nama_instansi");
            }
            // jika nama instansi belum ada
            else {
                // perintah query untuk menyimpan data ke tabel instansi
                $insert = $mysqli->query("INSERT INTO instansi(id_instansi,nama_instansi,alamat,created_user)
                                          VALUES('$id_instansi','$nama_instansi','$alamat','$created_user')")
                                          or die('Ada kesalahan pada query insert : '.$mysqli->error);

                // cek query
                if ($insert) {
                    // jika berhasil tampilkan pesan berhasil simpan data
                    header("location: ../../instansi-success-add");
                }
            }
        }   
    }
    
    // jika action = update maka jalankan perintah update data
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id'])) {
                // ambil data hasil submit dari form
                $id_instansi   = $mysqli->real_escape_string(trim($_POST['id']));
                $nama_instansi = $mysqli->real_escape_string(trim($_POST['nama_instansi']));
                $alamat        = $mysqli->real_escape_string(trim($_POST['alamat']));

                $updated_user  = $_SESSION['sias_userID'];
                $updated_date  = gmdate("Y-m-d H:i:s", time()+60*60*7);

                // perintah query untuk mengubah data pada tabel instansi
                $update = $mysqli->query("UPDATE instansi SET nama_instansi = '$nama_instansi',
                                                              alamat        = '$alamat',
                                                              updated_user  = '$updated_user',
                                                              updated_date  = '$updated_date'
                                                        WHERE id_instansi   = '$id_instansi'")
                                          or die('Ada kesalahan pada query update : '.$mysqli->error);

                // cek query
                if ($update) {
                    // jika berhasil tampilkan pesan berhasil update data
                    header("location: ../../instansi-success-update");
                }
            }
        }
    }      
    
    // jika action = delete maka jalankan perintah delete data
    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id_instansi = $_GET['id'];

            // perintah query untuk menampilkan data dari tabel instansi
            $result = $mysqli->query("SELECT id_instansi, nama_instansi FROM instansi WHERE id_instansi='$id_instansi'")
                                      or die('Ada kesalahan pada query tampil data instansi: '.$mysqli->error);
            $data = $result->fetch_assoc();

            $nama_instansi = $data['nama_instansi'];
            $deleted_user  = $_SESSION['sias_userID'];
            $action        = "Delete";
            $description   = "<b>Delete</b> data instansi pada tabel <b>instansi</b>. <br> <b>[ID Instansi : </b>".$id_instansi."<b>][Nama Instansi : </b>".$nama_instansi."<b>]";

            // perintah query untuk menampilkan data instansi dari tabel surat masuk berdasarkan id_instansi
            $query_surat_masuk = $mysqli->query("SELECT asal_surat FROM surat_masuk WHERE asal_surat='$id_instansi'")
                                                 or die('Ada kesalahan pada query tampil data instansi: '.$mysqli->error);
            $rows_surat_masuk = $query_surat_masuk->num_rows;

            // perintah query untuk menampilkan data instansi dari tabel surat keluar berdasarkan id_instansi
            $query_surat_keluar = $mysqli->query("SELECT tujuan_surat FROM surat_keluar WHERE tujuan_surat='$id_instansi'")
                                                  or die('Ada kesalahan pada query tampil data instansi: '.$mysqli->error);
            $rows_surat_keluar = $query_surat_keluar->num_rows;

            // jika data ada
            if ($rows_surat_masuk > 0 || $rows_surat_keluar > 0) {
                // tampilkan pesan gagal hapus data
                header("location: instansi-error2-$id_instansi");
            }
            // jika data tidak ada
            else {
                // perintah query untuk menghapus data pada tabel instansi
                $delete = $mysqli->query("DELETE FROM instansi WHERE id_instansi='$id_instansi'")
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
                        header("location: instansi-success-delete");
                    }
                }
            }
        }
    }    
}       
?>
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
            $kode_kotakberkas 	= mysqli_real_escape_string($mysqli, trim($_POST['kode_kotakberkas']));
            $kode_lemari  		= mysqli_real_escape_string($mysqli, trim($_POST['kode_lemari']));
            $kode_rak	 		= mysqli_real_escape_string($mysqli, trim($_POST['kode_rak']));
            $keterangan	 		= mysqli_real_escape_string($mysqli, trim($_POST['keterangan']));
            
            $nama_file          = $_FILES['arsip_kotakberkas']['name'];
            $ukuran_file        = $_FILES['arsip_kotakberkas']['size'];
            $tipe_file          = $_FILES['arsip_kotakberkas']['type'];
            $tmp_file           = $_FILES['arsip_kotakberkas']['tmp_name'];
            $arsip              = $kode_kotakberkas."_".$nama_file;
            
            // tentukan extension yang diperbolehkan
            $allowed_extensions = array('pdf','PDF');
            
            // Set path folder tempat menyimpan filenya
            $path               = "../../dokumen/kotakberkas/".$arsip_kotakberkas;
            
            // check extension
            $file               = explode(".", $nama_file);
            $extension          = array_pop($file);
            
            $created_user       = $_SESSION['sias_userID'];
            $updated_user       = $_SESSION['sias_userID'];


            // jika arsip tidak diisi
            if (empty($nama_file)) {
                // perintah query untuk menyimpan data ke tabel surat masuk
                $insert = $mysqli->query("INSERT INTO is_kotakberkas(kode_kotakberkas,kode_lemari,kode_rak,keterangan,created_user,updated_user)
                                          VALUES('$kode_kotakberkas','$kode_lemari','$kode_rak','$keterangan','$created_user','$updated_user')")
                                          or die('Ada kesalahan pada query insert : '.$mysqli->error); 

                // cek query
                if ($insert) {
                    // jika berhasil tampilkan pesan berhasil simpan data
                    header("location: ../../kotakberkas-success-add");
                }   
            }
            // jika arsip diisi
            else {
                // Cek apakah tipe file yang diupload sesuai dengan allowed_extensions
                if(in_array($extension, $allowed_extensions)) {
                    // Jika tipe file yang diupload sesuai dengan allowed_extensions, lakukan :
                    if($ukuran_file <= 5000000) { // Cek apakah ukuran file yang diupload kurang dari sama dengan 5MB
                        // Jika ukuran file kurang dari sama dengan 5MB, lakukan :
                        // Proses upload
                        if(move_uploaded_file($tmp_file, $path)) { // Cek apakah file berhasil diupload atau tidak
                            // Jika file berhasil diupload, Lakukan : 
                            // perintah query untuk menyimpan data ke tabel is kotak berkas
                            $insert = $mysqli->query("INSERT INTO is_kotakberkas(kode_kotakberkas,kode_lemari,kode_rak,keterangan,arsip_kotakberkas,created_user,updated_user)
                                          VALUES('$kode_kotakberkas','$kode_lemari','$kode_rak','$keterangan','arsip_kotakberkas','$created_user','$updated_user')")
                                                      or die('Ada kesalahan pada query insert : '.$mysqli->error); 

                            // cek query
                            if ($insert) {
                                // jika berhasil tampilkan pesan berhasil simpan data
                                header("location: ../../kotakberkas-success-add");
                            }   
                        } else {
                            // Jika file gagal diupload, tampilkan pesan gagal upload
                            header("location: ../../kotakberkas-error1");
                        }
                    } else {
                        // Jika ukuran file lebih dari 1 Mb, tampilkan pesan gagal upload
                        header("location: ../../kotakberkas-error2");
                    }
                } else {
                    // Jika tipe file yang diupload bukan PDF, tampilkan pesan gagal upload
                    header("location: ../../kotakberkas-error3");
                }
            } 
        }   
    }
    
    // jika action = update maka jalankan perintah update data
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['kode_kotakberkas'])) {
                // ambil data hasil submit dari form
                $kode_kotakberkas   = $mysqli->real_escape_string(trim($_POST['kode_kotakberkas']));
                $kode_lemari        = $mysqli->real_escape_string(trim($_POST['kode_lemari']));
                $kode_rak  		    = $mysqli->real_escape_string(trim($_POST['kode_rak']));
                $keterangan         = $mysqli->real_escape_string(trim($_POST['keterangan']));
                
                $nama_file          = $_FILES['arsip_kotakberkas']['name'];
                $ukuran_file        = $_FILES['arsip_kotakberkas']['size'];
                $tipe_file          = $_FILES['arsip_kotakberkas']['type'];
                $tmp_file           = $_FILES['arsip_kotakberkas']['tmp_name'];
                $arsip_kotakberkas  = $kode_kotakberkas."_".$nama_file;
                
                // tentukan extension yang diperbolehkan
                $allowed_extensions = array('pdf','PDF');
                
                // Set path folder tempat menyimpan filenya
                $path               = "../../dokumen/kotakberkas/".$arsip_kotakberkas;
                
                // check extension
                $file               = explode(".", $nama_file);
                $extension          = array_pop($file);
                
                $updated_user       = $_SESSION['sias_userID'];
                $updated_date       = gmdate("Y-m-d H:i:s", time()+60*60*7);

                // jika arsip tidak diisi
                if (empty($nama_file)) {
                    // perintah query untuk mengubah data pada tabel kotak berkas
                    $update = $mysqli->query("UPDATE is_kotakberkas SET kode_kotakberkas    = '$kode_kotakberkas',
                                                                     kode_lemari  	        = '$kode_lemari',
                                                                     kode_rak     		    = '$kode_rak',
                                                                     keterangan    	        = '$keterangan',
                                                                     updated_user   	    = '$updated_user',
                                                                     updated_date       	= '$updated_date'
                                                               WHERE kode_kotakberkas     = '$kode_kotakberkas'")
                                              or die('Ada kesalahan pada query update : '.$mysqli->error);

                    // cek query
                    if ($update) {
                        // jika berhasil tampilkan pesan berhasil update data
                        header("location: ../../kotakberkas-success-update");
                    }
                }
                // jika arsip diisi
                else {
                    // Cek apakah tipe file yang diupload sesuai dengan allowed_extensions
                    if(in_array($extension, $allowed_extensions)) {
                        // Jika tipe file yang diupload sesuai dengan allowed_extensions, lakukan :
                        if($ukuran_file <= 150000000) { // Cek apakah ukuran file yang diupload kurang dari sama dengan 150MB
                            // Jika ukuran file kurang dari sama dengan 150MB, lakukan :
                            // Proses upload
                            if(move_uploaded_file($tmp_file, $path)) { // Cek apakah file berhasil diupload atau tidak
 
 // Jika file berhasil diupload, Lakukan : 
                                // perintah query untuk mengubah data pada tabel kotak berkas
                                $update = $mysqli->query("UPDATE is_kotakberkas SET kode_kotakberkas   = '$kode_kotakberkas',
                                                                                 kode_lemari        = '$kode_lemari',
                                                                                 kode_rak           = '$kode_rak',
                                                                                 keterangan         = '$keterangan',
                                                                                 arsip_kotakberkas  = '$arsip_kotakberkas',
                                                                                 updated_user       = '$updated_user',
                                                                                 updated_date       = '$updated_date'
                                                                           WHERE kode_kotakberkas   = '$kode_kotakberkas'")
                                                          or die('Ada kesalahan pada query update : '.$mysqli->error);

                                // cek query
                                if ($update) {
                                    // jika berhasil tampilkan pesan berhasil update data
                                    header("location: ../../kotakberkas-success-update");
                                }
                            } else {
                                // Jika file gagal diupload, tampilkan pesan gagal upload
                                header("location: ../../kotakberkas-error1");
                            }
                        } else {
                            // Jika ukuran file lebih dari 150 Mb, tampilkan pesan gagal upload
                            header("location: ../../kotakberkas-error2");
                        }
                    } else {
                        // Jika tipe file yang diupload bukan PDF, tampilkan pesan gagal upload
                        header("location: ../../kotakberkas-error3");
                    }
                }
            }
        }
    }      
    
    // jika action = delete maka jalankan perintah delete data
    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id_kotakberkas = $_GET['id'];

            // perintah query untuk menampilkan data dari tabel is_kotakberkas
            $result = $mysqli->query("SELECT a.kode_kotakberkas,a.kode_lemari,a.kode_rak,a.keterangan,a.arsip_kotakberkas,a.created_user,a.created_date,a.updated_user,a.updated_date,b.fullname,b.user_account_name,b.userID
			FROM is_kotakberkas as a INNER JOIN sys_users as b 
			ON a.created_user=b.userID
			WHERE kode_kotakberkas='$_GET[id]'")
                                      or die('Ada kesalahan pada query tampil data surat_masuk: '.$mysqli->error);
            $data = $result->fetch_assoc();

            $kode_kotakberkas			 = $data['kode_kotakberkas'];
            $kode_lemari     			 = $data['kode_lemari'];
            $kode_rak        			 = $data['kode_rak'];
            $keterangan       		   	= $data['keterangan'];
            $arsip_kotakberkas           = $data['arsip_kotakberkas'];
            
            $deleted_user   = $_SESSION['sias_userID'];
            $action         = "Delete";
            $description    = "<b>Delete</b> data Kotak Berkas pada tabel <b>is_kotakberkas</b>. <br> <b>[Kode Kotak Berkas : </b>".$kode_kotakberkas."<b>][Kode Lemari : </b>".$kode_lemari."<b>][Kode Rak : </b>".$kode_rak."<b>][Keterangan : </b>".$keterangan."<b>]";

            // jika arsip ada
            if (!empty($arsip_kotakberkas)) {
                // hapus file edoc dari folder dokumen
                $hapus_file = unlink("../../dokumen/kotakberkas/$arsip_kotakberkas");

                // cek hapus file
                if ($hapus_file) {
                    // perintah query untuk menghapus data pada tabel surat_masuk
                    $delete = $mysqli->query("DELETE FROM is_kotakberkas WHERE kode_kotakberkas='$id_kotakberkas'")
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
                            header("location: kotakberkas-success-delete");
                        }
                    }
                }
            }
            // jika arsip tidak ada
            else {
                // perintah query untuk menghapus data pada tabel surat_masuk
                $delete = $mysqli->query("DELETE FROM is_kotakberkas WHERE kode_kotakberkas='$id_kotakberkas'")
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
                        header("location: kotakberkas-success-delete");
                    }
                }
            }
        }
    }    
}       
?>
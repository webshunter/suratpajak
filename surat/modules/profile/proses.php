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
            // fungsi untuk membuat id_surat_masuk
            $result = $mysqli->query("SELECT max(id) as kode FROM profile")
                                      or die('Ada kesalahan pada query tampil data id: '.$mysqli->error);
            $data = $result->fetch_assoc();

            $idp     = $data['kode'] + 1;
            // ambil data hasil submit dari form
            $npwp  = $mysqli->real_escape_string(trim($_POST['npwp']));
            $kodepp  = $mysqli->real_escape_string(trim($_POST['kode_kpp']));
            $kodec  = $mysqli->real_escape_string(trim($_POST['kode_cabang']));
            $nama = $mysqli->real_escape_string(trim($_POST['nama']));
            $alamat  = $mysqli->real_escape_string(trim($_POST['alamat']));
           $kelurahan  = $mysqli->real_escape_string(trim($_POST['kelurahan']));
            $kota  = $mysqli->real_escape_string(trim($_POST['kota']));
            $telp  = $mysqli->real_escape_string(trim($_POST['nomor_telepon']));
            $klusi  = $mysqli->real_escape_string(trim($_POST['klu_sidjp']));
            $kluf  = $mysqli->real_escape_string(trim($_POST['klu_faktual']));
            $noakta  = $mysqli->real_escape_string(trim($_POST['nomor_akta']));
            $tglakta   = $mysqli->real_escape_string(trim(date('Y-m-d', strtotime($_POST['tgl_akta']))));
            $kendala = $_POST['kendala'];
            $saran = $_POST['saran_masukan'];
            $lain = $_POST['lain_lain'];
            
            $nama_file          = $_FILES['arsip']['name'];
            $ukuran_file        = $_FILES['arsip']['size'];
            $tipe_file          = $_FILES['arsip']['type'];
            $tmp_file           = $_FILES['arsip']['tmp_name'];
            $arsip              = $idp."_".$nama_file;
            
            // tentukan extension yang diperbolehkan
            $allowed_extensions = array('pdf','PDF');
            
            // Set path folder tempat menyimpan filenya
            $path               = "../../dokumen/profile/".$arsip;
            
            // check extension
            $file               = explode(".", $nama_file);
            $extension          = array_pop($file);
            
            $created_user       = $_SESSION['sias_userID'];

            // jika arsip tidak diisi
            if (empty($nama_file)) {
                // perintah query untuk menyimpan data ke tabel surat masuk
                $insert = $mysqli->query("INSERT INTO profile(npwp, kode_kpp, kode_cabang, nama, alamat, kelurahan, kota, nomor_telepon, klu_sidjp, klu_faktual, nomor_akta, tgl_akta, kendala, saran_masukan, lain_lain)
                                          VALUES('$npwp','$kodepp','$kodec','$nama','$alamat','$kelurahan','$kota','$telp','$klusi','$kluf','$noakta','$tglakta','$kendala','$saran','$lain')")
                                          or die('Ada kesalahan pada query insert : '.$mysqli->error); 

                // cek query
                if ($insert) {
                    // jika berhasil tampilkan pesan berhasil simpan data
                    header("location: ../../profile-success-add");
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
                            // perintah query untuk menyimpan data ke tabel surat masuk
                            $insert = $mysqli->query("INSERT INTO profile(npwp, kode_kpp, kode_cabang, nama, alamat, kelurahan, kota, nomor_telepon, klu_sidjp, klu_faktual, nomor_akta, tgl_akta, kendala, saran_masukan, lain_lain, arsip)
                                          VALUES('$npwp','$kodepp','$kodec','$nama','$alamat','$kelurahan','$kota','$telp','$klusi','$kluf','$noakta','$tglakta','$kendala','$saran','$lain','$arsip')")
                                                      or die('Ada kesalahan pada query insert : '.$mysqli->error); 

                            // cek query
                            if ($insert) {
                                // jika berhasil tampilkan pesan berhasil simpan data
                                header("location: ../../profile-success-add");
                            }   
                        } else {
                            // Jika file gagal diupload, tampilkan pesan gagal upload
                            header("location: ../../profile-error1");
                        }
                    } else {
                        // Jika ukuran file lebih dari 1 Mb, tampilkan pesan gagal upload
                        header("location: ../../profile-error2");
                    }
                } else {
                    // Jika tipe file yang diupload bukan PDF, tampilkan pesan gagal upload
                    header("location: ../../profile-error3");
                }
            } 
        }   
    }
    
    // jika action = update maka jalankan perintah update data
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id'])) {
                // ambil data hasil submit dari form
                $id     = $mysqli->real_escape_string(trim($_POST['id']));
            $npwp  = $mysqli->real_escape_string(trim($_POST['npwp']));
            $kodepp  = $mysqli->real_escape_string(trim($_POST['kode_kpp']));
            $kodec  = $mysqli->real_escape_string(trim($_POST['kode_cabang']));
            $nama = $mysqli->real_escape_string(trim($_POST['nama']));
            $alamat  = $mysqli->real_escape_string(trim($_POST['alamat']));
           $kelurahan  = $mysqli->real_escape_string(trim($_POST['kelurahan']));
            $kota  = $mysqli->real_escape_string(trim($_POST['kota']));
            $telp  = $mysqli->real_escape_string(trim($_POST['nomor_telepon']));
            $klusi  = $mysqli->real_escape_string(trim($_POST['klu_sidjp']));
            $kluf  = $mysqli->real_escape_string(trim($_POST['klu_faktual']));
            $noakta  = $mysqli->real_escape_string(trim($_POST['nomor_akta']));
            $tglakta   = $mysqli->real_escape_string(trim(date('Y-m-d', strtotime($_POST['tgl_akta']))));
            $kendala = $_POST['kendala'];
            $saran = $_POST['saran_masukan'];
            $lain = $_POST['lain_lain'];
                
                $nama_file          = $_FILES['arsip']['name'];
                $ukuran_file        = $_FILES['arsip']['size'];
                $tipe_file          = $_FILES['arsip']['type'];
                $tmp_file           = $_FILES['arsip']['tmp_name'];
                $arsip              = $id."_".$nama_file;
                
                // tentukan extension yang diperbolehkan
                $allowed_extensions = array('pdf','PDF');
                
                // Set path folder tempat menyimpan filenya
                $path               = "../../dokumen/profile/".$arsip;
                
                // check extension
                $file               = explode(".", $nama_file);
                $extension          = array_pop($file);
                
                $updated_user       = $_SESSION['sias_userID'];
                $updated_date       = gmdate("Y-m-d H:i:s", time()+60*60*7);

                // jika arsip tidak diisi
                if (empty($nama_file)) {
                    // perintah query untuk mengubah data pada tabel surat_masuk
                    $update = $mysqli->query("UPDATE profile SET npwp   = '$npwp',
                                                                     kode_kpp         = '$kodepp',
                                                                     kode_cabang        = '$kodec',
                                                                     nama      = '$nama',
                                                                     alamat        = '$alamat',
                                                                     kelurahan            = '$kelurahan',
                                                                     kota         = '$kota',
                                                                     nomor_telepon       = '$telp',
                                                                     klu_sidjp = '$klusi',
                                                                     klu_faktual = '$kluf',
                                                                     nomor_aktaperubahan = '$noakta',
                                                                     tgl_aktaperubahan       = '$updated_date',
                                                                     kendala = '$kendala',
                                                                     saran_masukan = '$saran',
                                                                     lain_lain = '$lain'
                                                               WHERE id     = '$id'")
                                              or die('Ada kesalahan pada query update : '.$mysqli->error);

                    // cek query
                    if ($update) {
                        // jika berhasil tampilkan pesan berhasil update data
                        header("location: ../../profile-success-update");
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
                                // perintah query untuk mengubah data pada tabel surat_masuk
                                $update = $mysqli->query("UPDATE profile SET npwp   = '$npwp',
                                                                     kode_kpp         = '$kodepp',
                                                                     kode_cabang        = '$kodec',
                                                                     nama      = '$nama',
                                                                     alamat        = '$alamat',
                                                                     kelurahan            = '$kelurahan',
                                                                     kota         = '$kota',
                                                                     nomor_telepon       = '$telp',
                                                                     klu_sidjp = '$klusi',
                                                                     klu_faktual = '$kluf',
                                                                     nomor_aktaperubahan = '$noakta',
                                                                     tgl_aktaperubahan       = '$updated_date',
                                                                     kendala = '$kendala',
                                                                     saran_masukan = '$saran',
                                                                     lain_lain = '$lain',
                                                                     arsip = '$arsip'
                                                               WHERE id = '$id'")
                                                          or die('Ada kesalahan pada query update : '.$mysqli->error);

                                // cek query
                                if ($update) {
                                    // jika berhasil tampilkan pesan berhasil update data
                                    header("location: ../../profile-success-update");
                                }
                            } else {
                                // Jika file gagal diupload, tampilkan pesan gagal upload
                                header("location: ../../profile-error1");
                            }
                        } else {
                            // Jika ukuran file lebih dari 1 Mb, tampilkan pesan gagal upload
                            header("location: ../../profile-error2");
                        }
                    } else {
                        // Jika tipe file yang diupload bukan PDF, tampilkan pesan gagal upload
                        header("location: ../../profile-error3");
                    }
                }
            }
        }
    }      
    
    // jika action = delete maka jalankan perintah delete data
    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $idp = $_GET['id'];

            // perintah query untuk menampilkan data dari tabel surat_masuk
            $result = $mysqli->query("SELECT * FROM profile WHERE id='$idp'")
                                      or die('Ada kesalahan pada query tampil data profile: '.$mysqli->error);
            $data = $result->fetch_assoc();

            $idp = $data['id'];
            $nama     = $data['nama'];
            $arsip          = $data['arsip'];
            
            $deleted_user   = $_SESSION['sias_userID'];
            $action         = "Delete";
            $description    = "<b>Delete</b> data pada tabel <b>Profile</b>. <br> <b>[ID : </b>".$idp."<b>][Nama : </b>".$nama."]";

            // jika arsip ada
            if (!empty($arsip)) {
                // hapus file edoc dari folder dokumen
                $hapus_file = unlink("../../dokumen/profile/$arsip");

                // cek hapus file
                if ($hapus_file) {
                    // perintah query untuk menghapus data pada tabel surat_masuk
                    $delete = $mysqli->query("DELETE FROM profile WHERE id='$idp'")
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
                            header("location: profile-success-delete");
                        }
                    }
                }
            }
            // jika arsip tidak ada
            else {
                // perintah query untuk menghapus data pada tabel profile
                $delete = $mysqli->query("DELETE FROM profile WHERE id='$idp'")
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
                        header("location: profile-success-delete");
                    }
                }
            }
        }
    }    
}       
?>
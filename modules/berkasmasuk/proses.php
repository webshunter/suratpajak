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

    if ($_GET['act'] == 'delete') {
        $kode_transaksi = $_GET['idnya'];
        $delete = $mysqli->query("  DELETE FROM is_berkasmasuk WHERE kode_transaksi = '$kode_transaksi' ");
        if ($delete) {
            echo "<script>
                location.href = '../../berkasmasuk';
            </script>";
        }
    }

    if ($_GET['act'] == 'deletefile') {
        
        $namafile = $_POST['datanama'];
        $kode = $_POST['kode'];
        $datano = $_POST['nomor'];
        $directory = "../../dokumen/kotakberkas/";
        $arsip_berkas = $mysqli->query("  SELECT * FROM is_kotakberkas WHERE kode_kotakberkas = '$kode' ");
        $berkasRender = mysqli_fetch_assoc($arsip_berkas);
        $simpan_berkas_dalam_array = json_decode($berkasRender["arsip_kotakberkas"]);
        unset($simpan_berkas_dalam_array[$datano]);

        $simpan_array_berkas = array();
        foreach ($simpan_berkas_dalam_array as $key => $value) {
            $simpan_array_berkas[] = $value;

        }

        $simpan_array_berkas = json_encode($simpan_array_berkas);

        var_dump($simpan_array_berkas);


        $update_datafile = $mysqli->query("
            UPDATE is_kotakberkas SET arsip_kotakberkas = '$simpan_array_berkas' WHERE kode_kotakberkas = '$kode'
        ");

        if ($update_datafile) {
            
            unlink($directory.$namafile);
            echo "sudah dihapus";

        }

    }



    if ($_GET['act'] == 'update') {


        // htmlspecialcharts berfungsi untuk keamanan data, guna mencega karakter khusus yang berkibat fatal terhadap system.

        $kode_transaksi       = htmlspecialchars($_POST['kode_transaksi']);
        $kode_kotakberkas     = htmlspecialchars($_POST['kode_kotakberkas']);
        $kode_map             = htmlspecialchars($_POST['kode_map']);
        $npwp                 = htmlspecialchars($_POST['npwp']);
        $kode_kpp             = htmlspecialchars($_POST['kode_kpp']);
        $kode_cabang          = htmlspecialchars($_POST['kode_cabang']);
        $jenis_dokumen        = htmlspecialchars($_POST['jenis_dokumen']);
        $nomor_dokumen        = htmlspecialchars($_POST['nomor_dokumen']);
        $tanggal_dokumen      = htmlspecialchars(date('Y-m-d', strtotime($_POST['tanggal_dokumen'])));
        $keterangan           = htmlspecialchars($_POST['keterangan']);
        $update_usr           = $_SESSION['sias_userID'];
        $tgl_update           = date("Y-m-d H:i:s");

        

        $simpan_update_data = $mysqli->query("

                    UPDATE is_berkasmasuk SET
                    kode_kotakberkas = '$kode_kotakberkas',
                    kode_map = '$kode_map',
                    npwp = '$npwp',
                    kode_kpp = '$kode_kpp',
                    kode_cabang = '$kode_cabang',
                    jenis_dokumen = '$jenis_dokumen',
                    nomor_dokumen = '$nomor_dokumen',
                    tanggal_dokumen = '$tanggal_dokumen',
                    keterangan = '$keterangan',
                    updated_user = '$update_usr',
                    updated_date = '$tgl_update'

                    WHERE kode_transaksi ='$kode_transaksi'

                ");

        // if ($simpan_update_data) {
        //     echo "disimpan";
        // }
        
        // dapatkan post dari form untuk file
        $file = $_FILES["arsip"];
        
        // dapatkan nama file
        $file["nama"] = $file["name"];
        
        // dapatkan file
        $file["tmp_file"] = $file["tmp_name"];
        
        // deskrisi direktori tujuan penyimpanan
        $directory = "../../dokumen/kotakberkas/";


        move_uploaded_file($file["tmp_file"], $directory.$file["nama"]);
            
        $namafile = $file['nama'];

        // cek data arsip berkas dan dapatkan arsip berkas

        $arsip_berkas = $mysqli->query("  SELECT * FROM is_kotakberkas WHERE kode_kotakberkas = '$kode_kotakberkas' ");

        $berkasRender = mysqli_fetch_object($arsip_berkas);

            if ($berkasRender->arsip_kotakberkas != "") {
                    $simpan_berkas_dalam_array = json_decode($berkasRender->arsip_kotakberkas);
            }else{
                    $simpan_berkas_dalam_array = array();
            }

            // tambahkan data ke array
            if ($namafile != "") {
                    $simpan_berkas_dalam_array[] = $namafile;
            }

            $simpan_array_berkas = json_encode($simpan_berkas_dalam_array);


        $update_datafile = $mysqli->query("
                UPDATE is_kotakberkas SET arsip_kotakberkas = '$simpan_array_berkas' WHERE kode_kotakberkas = '$kode_kotakberkas'
            ");
            
        if ($update_datafile) {
            echo "<script>location.href = '../../berkasmasuk-update-".$kode_transaksi."'</script>";
        }

    }








    // jika action = insert maka jalankan perintah insert data
    if ($_GET['act']=='insert') {
        if (isset($_POST['simpan'])) {
 
            // ambil data hasil submit dari form
            $kode_transaksi       = $mysqli->real_escape_string(trim($_POST['kode_transaksi']));
            $kode_kotakberkas     = $mysqli->real_escape_string(trim($_POST['kode_kotakberkas']));
            $kode_map             = $mysqli->real_escape_string(trim($_POST['kode_map']));
            $npwp                 = $mysqli->real_escape_string(trim($_POST['npwp']));
            $kode_kpp             = $mysqli->real_escape_string(trim($_POST['kode_kpp']));
            $kode_cabang          = $mysqli->real_escape_string(trim($_POST['kode_cabang']));
            $jenis_dokumen        = $mysqli->real_escape_string(trim($_POST['jenis_dokumen']));
            $nomor_dokumen        = $mysqli->real_escape_string(trim($_POST['nomor_dokumen']));
            $tanggal_dokumen      = $mysqli->real_escape_string(trim(date('Y-m-d', strtotime($_POST['tanggal_dokumen']))));
            $keterangan           = $mysqli->real_escape_string(trim($_POST['keterangan']));

            $nama_file          = $_FILES['arsip_berkasmasuk']['name'];
            $ukuran_file        = $_FILES['arsip_berkasmasuk']['size'];
            $tipe_file          = $_FILES['arsip_berkasmasuk']['type'];
            $tmp_file           = $_FILES['arsip_berkasmasuk']['tmp_name'];
            $arsip_berkasmasuk  = $kode_transaksi."_".$nama_file;
            
            // tentukan extension yang diperbolehkan
            $allowed_extensions = array('pdf','PDF');
            
            // Set path folder tempat menyimpan filenya
            $path               = "../../dokumen/berkasmasuk/".$arsip_berkasmasuk;
            
            // check extension
            $file               = explode(".", $nama_file);
            $extension          = array_pop($file);
            
            $created_user       = $_SESSION['sias_userID'];

            // jika arsip tidak diisi
            if (empty($nama_file)) {
                // perintah query untuk menyimpan data ke tabel surat masuk
                $insert = $mysqli->query("INSERT INTO is_berkasmasuk(kode_transaksi,kode_kotakberkas,kode_map,npwp,kode_kpp,kode_cabang,jenis_dokumen,nomor_dokumen,tanggal_dokumen,keterangan,created_user)
                                          VALUES('$kode_transaksi','$kode_kotakberkas','$kode_map','$npwp','$kode_kpp','$kode_cabang','$jenis_dokumen','$nomor_dokumen','$tanggal_dokumen','$keterangan','$created_user')")
                                          or die('Ada kesalahan pada query insert : '.$mysqli->error); 

                // cek query
                if ($insert) {
                    // jika berhasil tampilkan pesan berhasil simpan data
                    header("location: ../../berkasmasuk-success-add");
                }   
            }
            // jika arsip diisi
            else {
                // Cek apakah tipe file yang diupload sesuai dengan allowed_extensions
                if(in_array($extension, $allowed_extensions)) {
                    // Jika tipe file yang diupload sesuai dengan allowed_extensions, lakukan :
                    if($ukuran_file <= 50000000) { // Cek apakah ukuran file yang diupload kurang dari sama dengan 5MB
                        // Jika ukuran file kurang dari sama dengan 5MB, lakukan :
                        // Proses upload
                        if(move_uploaded_file($tmp_file, $path)) { // Cek apakah file berhasil diupload atau tidak
                            // Jika file berhasil diupload, Lakukan : 
                            // perintah query untuk menyimpan data ke tabel surat masuk
                            $insert = $mysqli->query("INSERT INTO is_berkasmasuk(kode_transaksi,kode_kotakberkas,kode_map,npwp,kode_kpp,kode_cabang,jenis_dokumen,nomor_dokumen,tanggal_dokumen,keterangan,arsip_berkasmasuk,created_user)
                                                      VALUES('$kode_transaksi','$kode_kotakberkas','$kode_map','$npwp','$kode_kpp','$kode_cabang','$jenis_dokumen','$nomor_dokumen','$tanggal_dokumen','$keterangan','$arsip_berkasmasuk','$created_user')")
                                                      or die('Ada kesalahan pada query insert : '.$mysqli->error); 

                            // cek query
                            if ($insert) {
                                // jika berhasil tampilkan pesan berhasil simpan data
                                header("location: ../../berkasmasuk-success-add");
                            }   
                        } else {
                            // Jika file gagal diupload, tampilkan pesan gagal upload
                            header("location: ../../berkasmasuk-error1");
                        }
                    } else {
                        // Jika ukuran file lebih dari 1 Mb, tampilkan pesan gagal upload
                        header("location: ../../berkasmasuk-error2");
                    }
                } else {
                    // Jika tipe file yang diupload bukan PDF, tampilkan pesan gagal upload
                    header("location: ../../berkasmasuk-error3");
                }
            } 
        }   
    }
    
    // jika action = update maka jalankan perintah update data
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id'])) {
                // ambil data hasil submit dari form
                $id_surat_masuk     = $mysqli->real_escape_string(trim($_POST['id']));
                $tanggal_diterima   = $mysqli->real_escape_string(trim(date('Y-m-d', strtotime($_POST['tanggal_diterima']))));
                $asal_surat         = $mysqli->real_escape_string(trim($_POST['asal_surat']));
                $nomor_surat        = $mysqli->real_escape_string(trim($_POST['nomor_surat']));
                $tanggal_surat      = $mysqli->real_escape_string(trim(date('Y-m-d', strtotime($_POST['tanggal_surat']))));
                $sifat_surat        = $mysqli->real_escape_string(trim($_POST['sifat_surat']));
                $perihal            = $mysqli->real_escape_string(trim($_POST['perihal']));
                $keterangan         = $mysqli->real_escape_string(trim($_POST['keterangan']));
                
                $nama_file          = $_FILES['arsip']['name'];
                $ukuran_file        = $_FILES['arsip']['size'];
                $tipe_file          = $_FILES['arsip']['type'];
                $tmp_file           = $_FILES['arsip']['tmp_name'];
                $arsip              = $id_surat_masuk."_".$nama_file;
                
                // tentukan extension yang diperbolehkan
                $allowed_extensions = array('pdf','PDF');
                
                // Set path folder tempat menyimpan filenya
                $path               = "../../dokumen/berkasmasuk/".$arsip;
                
                // check extension
                $file               = explode(".", $nama_file);
                $extension          = array_pop($file);
                
                $updated_user       = $_SESSION['sias_userID'];
                $updated_date       = gmdate("Y-m-d H:i:s", time()+60*60*7);

                // jika arsip tidak diisi
                if (empty($nama_file)) {
                    // perintah query untuk mengubah data pada tabel surat_masuk
                    $update = $mysqli->query("UPDATE surat_masuk SET tanggal_diterima   = '$tanggal_diterima',
                                                                     asal_surat         = '$asal_surat',
                                                                     nomor_surat        = '$nomor_surat',
                                                                     tanggal_surat      = '$tanggal_surat',
                                                                     sifat_surat        = '$sifat_surat',
                                                                     perihal            = '$perihal',
                                                                     keterangan         = '$keterangan',
                                                                     updated_user       = '$updated_user',
                                                                     updated_date       = '$updated_date'
                                                               WHERE id_surat_masuk     = '$id_surat_masuk'")
                                              or die('Ada kesalahan pada query update : '.$mysqli->error);

                    // cek query
                    if ($update) {
                        // jika berhasil tampilkan pesan berhasil update data
                        header("location: ../../surat-masuk-success-update");
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
                                $update = $mysqli->query("UPDATE surat_masuk SET tanggal_diterima   = '$tanggal_diterima',
                                                                                 asal_surat         = '$asal_surat',
                                                                                 nomor_surat        = '$nomor_surat',
                                                                                 tanggal_surat      = '$tanggal_surat',
                                                                                 sifat_surat        = '$sifat_surat',
                                                                                 perihal            = '$perihal',
                                                                                 keterangan         = '$keterangan',
                                                                                 arsip              = '$arsip',
                                                                                 updated_user       = '$updated_user',
                                                                                 updated_date       = '$updated_date'
                                                                           WHERE id_surat_masuk     = '$id_surat_masuk'")
                                                          or die('Ada kesalahan pada query update : '.$mysqli->error);

                                // cek query
                                if ($update) {
                                    // jika berhasil tampilkan pesan berhasil update data
                                    header("location: ../../surat-masuk-success-update");
                                }
                            } else {
                                // Jika file gagal diupload, tampilkan pesan gagal upload
                                header("location: ../../surat-masuk-error1");
                            }
                        } else {
                            // Jika ukuran file lebih dari 1 Mb, tampilkan pesan gagal upload
                            header("location: ../../surat-masuk-error2");
                        }
                    } else {
                        // Jika tipe file yang diupload bukan PDF, tampilkan pesan gagal upload
                        header("location: ../../surat-masuk-error3");
                    }
                }
            }
        }
    }      
    
    // jika action = delete maka jalankan perintah delete data
    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id_surat_masuk = $_GET['id'];

            // perintah query untuk menampilkan data dari tabel surat_masuk
            $result = $mysqli->query("SELECT a.id_surat_masuk,a.asal_surat,a.nomor_surat,a.tanggal_surat,a.arsip,b.nama_instansi 
                                      FROM surat_masuk as a INNER JOIN instansi as b ON a.asal_surat=b.id_instansi WHERE a.id_surat_masuk='$id_surat_masuk'")
                                      or die('Ada kesalahan pada query tampil data surat_masuk: '.$mysqli->error);
            $data = $result->fetch_assoc();

            $id_surat_masuk = $data['id_surat_masuk'];
            $asal_surat     = $data['nama_instansi'];
            $nomor_surat    = $data['nomor_surat'];
            $tanggal_surat  = $data['tanggal_surat'];
            $arsip          = $data['arsip'];
            
            $deleted_user   = $_SESSION['sias_userID'];
            $action         = "Delete";
            $description    = "<b>Delete</b> data surat masuk pada tabel <b>surat masuk</b>. <br> <b>[ID Surat Masuk : </b>".$id_surat_masuk."<b>][Asal Surat : </b>".$asal_surat."<b>][Nomor Surat : </b>".$nomor_surat."<b>][Tanggal Surat : </b>".$tanggal_surat."<b>]";

            // jika arsip ada
            if (!empty($arsip)) {
                // hapus file edoc dari folder dokumen
                $hapus_file = unlink("../../dokumen/surat-masuk/$arsip");

                // cek hapus file
                if ($hapus_file) {
                    // perintah query untuk menghapus data pada tabel surat_masuk
                    $delete = $mysqli->query("DELETE FROM surat_masuk WHERE id_surat_masuk='$id_surat_masuk'")
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
                            header("location: surat-masuk-success-delete");
                        }
                    }
                }
            }
            // jika arsip tidak ada
            else {
                // perintah query untuk menghapus data pada tabel surat_masuk
                $delete = $mysqli->query("DELETE FROM surat_masuk WHERE id_surat_masuk='$id_surat_masuk'")
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
                        header("location: surat-masuk-success-delete");
                    }
                }
            }
        }
    }    
}       
?>
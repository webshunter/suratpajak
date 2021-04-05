<?php  
// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login
if (empty($_SESSION['sias_user_account_name']) && empty($_SESSION['sias_user_account_password'])){
    echo "<meta http-equiv='refresh' content='0; url=../../login-error'>";
}
// jika user sudah login
else { ?>    
    
    <div class="content-body">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-xs-12">
                <div class="alert alert-info alert-dismissible fade in mb-2" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong><i style="margin-right:7px" class="icon-info"></i></strong> Selamat datang <strong><?php echo $_SESSION['sias_fullname']; ?></strong>.
                    Anda login sebagai <strong><?php echo $_SESSION['sias_user_permissions']; ?></strong>.
                </div>
            </div>
        </div>
    
    <?php  
    if ($_SESSION['sias_user_permissions']=='Administrator') { ?>
        <div class="row">
            <div class="col-md-6 col-lg-3 col-xs-12">
                <div style="margin-bottom:0.5rem;" class="card">
                    <div class="card-body">
                        <div class="card-block">
                            <div class="media">
                                <div class="media-body text-xs-left">
                                <?php  
                                // fungsi query untuk menampilkan jumlah data instansi
                                $result = $mysqli->query("SELECT count(id_instansi) as jumlah FROM instansi")
                                                          or die('Ada kesalahan pada query tampil jumlah data instansi: '.$mysqli->error);
                                $data = $result->fetch_assoc();
                                $jumlah_instansi = $data['jumlah'];
                                ?>
                                    <h3 class="cyan"><?php echo number_format($jumlah_instansi); ?></h3>
                                    <span>Instansi Terkait</span>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="icon-home2 cyan font-large-2 float-xs-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 col-xs-12">
                <div style="margin-bottom:0.5rem;" class="card">
                    <div class="card-body">
                        <div class="card-block">
                            <div class="media">
                                <div class="media-body text-xs-left">
                                <?php  
                                // fungsi query untuk menampilkan jumlah data user
                                $result = $mysqli->query("SELECT count(userID) as jumlah FROM sys_users")
                                                          or die('Ada kesalahan pada query tampil jumlah data user: '.$mysqli->error);
                                $data = $result->fetch_assoc();
                                $jumlah_user = $data['jumlah'];
                                ?>
                                    <h3 class="deep-orange"><?php echo number_format($jumlah_user); ?></h3>
                                    <span>Pengguna Aplikasi</span>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="icon-user1 deep-orange font-large-2 float-xs-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 col-xs-12">
                <div style="margin-bottom:0.5rem;" class="card">
                    <div class="card-body">
                        <div class="card-block">
                            <div class="media">
                                <div class="media-body text-xs-left">
                                <?php  
                                // fungsi query untuk menampilkan tanggal terakhir backup database
                                $result = $mysqli->query("SELECT dbID, created_date FROM sys_database ORDER BY dbID DESC LIMIT 1")
                                                          or die('Ada kesalahan pada query tampil data backup database: '.$mysqli->error);
                                $rows  = $result->num_rows;

                                if ($rows > 0) {
                                    $data = $result->fetch_assoc();

                                    $tgl  = substr($data['created_date'],0,10);
                                    $exp  = explode('-',$tgl);
                                    $date = $exp[2]."-".$exp[1]."-".$exp[0];
                                    echo "<h3 class='teal'>$date</h3>";
                                } else {
                                    echo "<h3 class='teal'>-</h3>";
                                }
                                ?>
                                    <span>Backup Database</span>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="icon-database teal font-large-2 float-xs-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 col-xs-12">
                <div style="margin-bottom:0.5rem;" class="card">
                    <div class="card-body">
                        <div class="card-block">
                            <div class="media">
                                <div class="media-body text-xs-left">
                                    <h3 class="pink">1.0.0</h3>
                                    <span>Versi Aplikasi</span>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="icon-leaf2 pink font-large-2 float-xs-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>
    <?php
    }
    ?>

        <div class="row">
            <div class="col-md-6 col-lg-3 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-block">
                            <div class="media">
                                <div class="media-body text-xs-left">
                                <?php  
                                $tahun = date("Y");
                                // fungsi query untuk menampilkan jumlah seluruh kotak berkas
                                $result = $mysqli->query("SELECT count(kode_kotakberkas) as jumlah FROM is_kotakberkas")
                                                          or die('Ada kesalahan pada query tampil data seluruh surat masuk: '.$mysqli->error);
                                $data = $result->fetch_assoc();
                                $seluruh_masuk = $data['jumlah'];
                                ?>
                                    <h3 class="deep-orange"><?php echo number_format($seluruh_masuk); ?></h3>
                                    <span><strong>Kotak Berkas</strong> <br> Seluruhnya</span>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="icon-file-text2 deep-orange font-large-2 float-xs-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-block">
                            <div class="media">
                                <div class="media-body text-xs-left">
                                <?php  
                                // fungsi query untuk menampilkan jumlah inputan kotak berkas per tahun berjalan
                                $result = $mysqli->query("SELECT count(kode_kotakberkas) as jumlah FROM is_kotakberkas WHERE LEFT(created_date,4)='$tahun'")
                                                          or die('Ada kesalahan pada query tampil data jumlah kotak berkas tahun ini: '.$mysqli->error);
                                $data = $result->fetch_assoc();
                                $jumlah_masuk = $data['jumlah'];
                                ?>
                                    <h3 class="cyan"><?php echo number_format($jumlah_masuk); ?></h3>
                                    <span><strong>Kotak Berkas</strong> <br> Direkam tahun <?php echo $tahun; ?></span>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="icon-file-text2 cyan font-large-2 float-xs-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-block">
                            <div class="media">
                                <div class="media-body text-xs-left">
                                <?php  
                                // fungsi query untuk menampilkan jumlah seluruh surat keluar
                                $result = $mysqli->query("SELECT count(id_surat_keluar) as jumlah FROM surat_keluar")
                                                          or die('Ada kesalahan pada query tampil data seluruh surat keluar: '.$mysqli->error);
                                $data = $result->fetch_assoc();
                                $seluruh_keluar = $data['jumlah'];
                                ?>
                                    <h3 class="pink"><?php echo number_format($seluruh_keluar); ?></h3>
                                    <span><strong>Surat Keluar</strong> <br> Seluruh</span>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="icon-file-text2 pink font-large-2 float-xs-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-block">
                            <div class="media">
                                <div class="media-body text-xs-left">
                                <?php  
                                // fungsi query untuk menampilkan jumlah surat keluar per tahun berjalan
                                $result = $mysqli->query("SELECT count(id_surat_keluar) as jumlah FROM surat_keluar WHERE LEFT(tanggal_register,4)='$tahun'")
                                                          or die('Ada kesalahan pada query tampil data jumlah surat keluar: '.$mysqli->error);
                                $data = $result->fetch_assoc();
                                $jumlah_keluar = $data['jumlah'];
                                ?>
                                    <h3 class="teal"><?php echo number_format($jumlah_keluar); ?></h3>
                                    <span><strong>Surat Keluar</strong> <br> Tahun <?php echo $tahun; ?></span>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="icon-file-text2 teal font-large-2 float-xs-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-6 col-lg-6 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <div style="padding-bottom:5px" class="card-block">
                            <h4 class="card-title center"><i class="icon-files-empty"></i> Jumlah Surat Hari Ini</h4>
                        </div>
                        <div id="load_surat_hari"></div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div style="padding-bottom:5px" class="card-block">
                            <h4 class="card-title center"><i class="icon-files-empty"></i> Jumlah Surat Bulan Ini</h4>
                        </div>
                        <div id="load_surat_bulan"></div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-6 col-lg-6 col-xs-12">
                <div class="card border-grey border-lighten-3 m-0">
                     <div class="no-border">
                        <div class="card-title text-xs-center">
                            <div class="p-1">
                                <img src="assets/images/logo-instansi/<?php echo $logo; ?>" alt="logo" class="rounded-circle img-fluid center-block mb-1" width="17%">
                                <h4><?php echo strtoupper($nama_instansi); ?></h4>
                            </div>
                        </div>
                    </div>
                   
                    <div style="margin-top:-30px;" class="card-header no-border">
                        <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3"><span>Profil Instansi</span></h6>
                    </div>
                    <div style="margin-top:-10px;" class="card-body">
                        <div class="card-block-login">
                            <table class="profil-instansi">
                                <tr>
                                    <td width="25" valign="top"><i class="icon-location22"></i></td>
                                    <td valign="top"></i> <?php echo $alamat; ?></td>
                                </tr>
                                <tr>
                                    <td width="25" valign="middle"><i class="icon-phone"></i></td>
                                    <td valign="middle"></i> <?php echo $telepon; ?></td>
                                </tr>
                                <tr>
                                    <td width="25" valign="middle"><i class="icon-print"></i></td>
                                    <td valign="middle"></i> <?php echo $fax; ?></td>
                                </tr>
                                <tr>
                                    <td width="25" valign="middle"><i class="icon-envelop"></i></td>
                                    <td valign="middle"></i> <?php echo $email; ?></td>
                                </tr>
                                <tr>
                                    <td width="25" valign="middle"><i class="icon-earth2"></i></td>
                                    <td valign="middle"></i> <?php echo $website; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- auto refresh jumlah antrian pengunjung -->
    <script type="text/javascript">
    $(document).ready(function() {
        $('#load_surat_hari').load('modules/beranda/getSuratHari.php');
        $('#load_surat_bulan').load('modules/beranda/getSuratBulan.php');
        
        var auto_refresh = setInterval(
        function () {
           $('#load_surat_hari').load('modules/beranda/getSuratHari.php').fadeIn("slow");
           $('#load_surat_bulan').load('modules/beranda/getSuratBulan.php').fadeIn("slow");
        }, 10000); // refresh setiap 10000 milliseconds
    } );
    </script>
<?php  
}
?>
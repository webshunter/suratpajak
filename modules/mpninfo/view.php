<?php  
// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login
if (empty($_SESSION['sias_user_account_name']) && empty($_SESSION['sias_user_account_password'])){
    echo "<meta http-equiv='refresh' content='0; url=../../login-error'>";
}
// jika user sudah login
else { ?>    
    
    <!-- Membuat satu kotak pemberitahuan diatas -->
    <div class="content-body">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-xs-12">
                <div class="alert alert-info alert-dismissible fade in mb-2" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong><i style="margin-right:7px" class="icon-info"></i></strong> Dashboard MPN Info versi Penagihan 652 </strong>.
                    Data yang ditampilkan merupakan data realtime dari server MPN Info KPP Malang Utara</strong>.
                </div>
            </div>
        </div>
    
    <?php  
    if ($_SESSION['sias_user_permissions']=='Administrator') { ?>


<!-- Membuat bootstrap card yang berisi jumlah bayar STP tahun ini   -->
        <div class="row">
            <div class="col-md-6 col-lg-3 col-xs-12">
                <div style="margin-bottom:0.5rem;" class="card">
                    <div class="card-body">
                        <div class="card-block">
                            <div class="media">
                                <div class="media-body text-xs-left">
                                <?php  
                                // fungsi untuk menentukan tahun ini
                                $tahunini = date('Y'); 

                                // fungsi query untuk menghitung data bayar STP tahun berjalan.
                                $stp300 = $mysqli2->query("SELECT sum(nominal) as jumlah FROM mpn WHERE YEAR(datebayar)=YEAR(CURDATE()) AND kdbayar BETWEEN 300 AND 305")
                                                          or die('Ada kesalahan pada query tampil jumlah data mpninfo bos : '.$mysqli2->error);
                                $data = $stp300->fetch_assoc();
                                $mpninfo = $data['jumlah'];
                                ?>
                                    <h4 class="cyan"><?php echo number_format($mpninfo); ?></h4>
                                    <span>Jumlah bayar rupiah STP tahun <?php echo ($tahunini);?></span>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="icon-pacman cyan font-large-2 float-xs-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


<!-- Membuat bootstrap card yang berisi jumlah bayar SKPKB  tahun ini   -->

            <div class="col-md-6 col-lg-3 col-xs-12">
                <div style="margin-bottom:0.5rem;" class="card">
                    <div class="card-body">
                        <div class="card-block">
                            <div class="media">
                                <div class="media-body text-xs-left">
                               <?php  
                                // fungsi untuk menentukan tahun ini
                                $tahunini = date('Y'); 
                                // fungsi query untuk menghitung data bayar kode 310 tahun berjalan
                                $skpkb310 = $mysqli2->query("SELECT sum(nominal) as jumlah FROM mpn WHERE YEAR(datebayar)=YEAR(CURDATE()) AND kdbayar=310")
                                                          or die('Ada kesalahan pada query tampil jumlah data mpninfo bos : '.$mysqli2->error);
                                $data = $skpkb310->fetch_assoc();
                                $mpninfo = $data['jumlah'];
                                ?>
                                    <h4 class="cyan"><?php echo number_format($mpninfo); ?></h4>
                                    <span>Jumlah bayar rupiah SKPKB tahun <?php echo ($tahunini);?></span>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="icon-user1 deep-orange font-large-2 float-xs-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



<!-- Membuat bootstrap card yang berisi jumlah bayar Pbk  tahun ini   -->

            <div class="col-md-6 col-lg-3 col-xs-12">
                <div style="margin-bottom:0.5rem;" class="card">
                    <div class="card-body">
                        <div class="card-block">
                            <div class="media">
                                <div class="media-body text-xs-left">

                               <?php  
                                // fungsi untuk menentukan tahun ini
                                $tahunini = date('Y'); 
                                // fungsi query untuk menghitung data bayar pbk tahun ini saja
                                $pbk = $mysqli2->query("SELECT sum(nominal) as jumlah FROM pbk WHERE YEAR(tanggaldoc)=YEAR(CURDATE()) AND kdbayar2 BETWEEN 300 AND 310")
                                                          or die('Ada kesalahan pada query tampil jumlah data mpninfo bos : '.$mysqli2->error);
                                $data = $pbk->fetch_assoc();
                                $mpninfo = $data['jumlah'];
                                ?>

                                <h4 class="teal"><?php echo number_format($mpninfo); ?></h4>

                                    <span>Jumlah bayar Pbk tahun <?php echo ($tahunini);?></span>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="icon-cart4 teal font-large-2 float-xs-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


<!-- Membuat bootstrap card yang berisi rekap jumlah bayar STP, SKPKB, Pbk   -->

            <div class="col-md-6 col-lg-3 col-xs-12">
                <div style="margin-bottom:0.5rem;" class="card">
                    <div class="card-body">
                        <div class="card-block">
                            <div class="media">
                                <div class="media-body text-xs-left">                            
                                              
                                
                               <?php  
                               
                                // fungsi untuk menentukan tahun ini
                                $tahunini = date('Y'); 

                                // fungsi query untuk menghitung data bayar STP dan SKPKB tahun berjalan.
                                $stp300 = $mysqli2->query("SELECT sum(nominal) as jumlah FROM mpn WHERE YEAR(datebayar)=YEAR(CURDATE()) AND kdbayar BETWEEN 300 AND 310")
                                                          or die('Ada kesalahan pada query tampil jumlah data mpninfo bos : '.$mysqli2->error);
                                $data = $stp300->fetch_assoc();
                                $mpninfo = $data['jumlah'];

                          
                                // fungsi query untuk menghitung data bayar pbk tahun berjalan
                                $pbk = $mysqli2->query("SELECT sum(nominal) as jumlah FROM pbk WHERE YEAR(tanggaldoc)=YEAR(CURDATE()) AND kdbayar2 BETWEEN 300 AND 310")
                                                          or die('Ada kesalahan pada query tampil jumlah data mpninfo bos : '.$mysqli2->error);
                                $data = $pbk->fetch_assoc();
                                $jumlahpbk = $data['jumlah'];

                                // fungsi untuk menghitung jumlah STP, SKPKB dan Pbk tahun berjalan
                                $totalsemua = $jumlahpbk + $mpninfo;
                                ?>

                                <h4 class="pink"><?php echo number_format(($totalsemua)); ?></h4>

                                    <span>Jumlah pembayaran STP+SKPKB+Pbk <?php echo ($tahunini);?></span>
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


    <?php
                                // fungsi query untuk menghitung data bayar STP dan SKPKB tahun berjalan.
                                    $stp300 = $mysqli2->query("SELECT  
    
                                    IFNULL( nama, 'SUB TOTAL' ) AS nama,
             
                                    SUM( IF( MONTH(datebayar) = 1, nominal, 0) ) AS jan,
                                    SUM( IF( MONTH(datebayar) = 2, nominal, 0) ) AS feb,
                                    SUM( IF( MONTH(datebayar) = 3, nominal, 0) ) AS mar,
                                    SUM( IF( MONTH(datebayar) = 4, nominal, 0) ) AS apr,
                                    SUM( IF( MONTH(datebayar) = 5, nominal, 0) ) AS mei,
                                    SUM( IF( MONTH(datebayar) = 6, nominal, 0) ) AS jun,
                                    SUM( IF( MONTH(datebayar) = 7, nominal, 0) ) AS jul,
                                    SUM( IF( MONTH(datebayar) = 8, nominal, 0) ) AS aug,
                                    SUM( IF( MONTH(datebayar) = 9, nominal, 0) ) AS sep,
                                    SUM( IF( MONTH(datebayar) = 10, nominal, 0) ) AS okt,
                                    SUM( IF( MONTH(datebayar) = 11, nominal, 0) ) AS nop,
                                    SUM( IF( MONTH(datebayar) = 12, nominal, 0) ) AS des,

                                    SUM(nominal) AS jumlah

                                    FROM mpn
                                    WHERE (tahunbayar = 2019 AND kdbayar BETWEEN 300 AND 310)

                                    GROUP BY nama
                                    ORDER BY jumlah DESC LIMIT 30;")
                                                   
                                    or die('Ada kesalahan pada query tampil data bosss : '.$mysqli2->error);
                                    $data = $stp300->fetch_assoc();
                                    $mpninfo = $data['jumlah'];
                                    ?>



<!-- Table head options with primary background start -->
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Pembayaran MPN Penagihan</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                        <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                        <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                    </ul>
                </div>
            </div>
            

            
            <div class="card-body collapse in">
                <div class="card-block card-dashboard">
                    <p>Pembayaran SKP-STP, realtime dari aplikasi MPN Info</p>
                </div>
                <div class="table-responsive">
                    <table class="table table-stripped table hover table-sm table-bordered">
                        <thead class="bg-blue">
                            <tr>
                                <th>#</th>
                                <th>Jan</th>
                                <th>Feb</th>
                                <th>Mar</th>
                                <th>Apr</th>
                                <th>Mei</th>
                                <th>Jun</th>
                                <th>Jul</th>
                                <th>Aug</th>
                                <th>Sep</th>
                                <th>Oct</th>
                                <th>Nov</th>
                                <th>Dec</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="bg-teal bg-lighten-4">
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Username</th>
                                    <th>Pets</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>dragon</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>    
                </div>
            </div>
        </div>
    </div>
</div>


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
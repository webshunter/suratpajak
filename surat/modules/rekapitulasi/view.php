<?php 
// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login
if (empty($_SESSION['sias_user_account_name']) && empty($_SESSION['sias_user_account_password'])){
    echo "<meta http-equiv='refresh' content='0; url=../../login-error'>";
}
// jika user sudah login
else { ?>
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h3 class="content-header-title"><i class="icon-files-empty"></i> Rekapitulasi Data Surat </h3>
        </div>

        <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="beranda"><i style="margin-right:7px" class="icon-home3"></i> Beranda</a></li>
                    <li class="breadcrumb-item active">Rekapitulasi</li>
                </ol>
            </div>
        </div>
    </div>
    
    <?php  
    if (empty($_POST['tahun'])) { ?>
        <div class="content-body"><!-- Basic form layout section start -->
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body collapse in">
                                <div style="padding-bottom:0" class="card-block">
                                    <form class="form" action="rekapitulasi" method="POST">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div style="margin-bottom:5px" class="form-group">
                                                        <label>Tahun <span class="wajib-isi">*</span></label>
                                                        <select class="form-control" name="tahun" autocomplete="off" required>
                                                            <option value=""></option>
                                                            <?php
                                                            // sql statement untuk menampilkan data dari tabel tahun
                                                            $query_tahun = $mysqli->query("SELECT LEFT(tanggal_diterima,4) as tahun FROM surat_masuk 
                                                                                           GROUP BY tahun ORDER BY tahun DESC")
                                                                                           or die('Ada kesalahan pada query tampil data tahun: '.$mysqli->error);
                                                            // tampilkan data
                                                            while ($data_tahun = $query_tahun->fetch_assoc()) {
                                                              echo"<option value=\"$data_tahun[tahun]\"> $data_tahun[tahun] </option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-actions">
                                            <input type="submit" class="btn btn-info mr-1" name="tampil" value="Tampilkan">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    <?php
    } elseif (!empty($_POST['tahun'])) { 
        $result_jan_masuk = $mysqli->query("SELECT count(id_surat_masuk) as jumlah FROM surat_masuk 
                                            WHERE LEFT(tanggal_diterima,4)='$_POST[tahun]' AND MID(tanggal_diterima,6,2)='01'")
                                            or die('Ada kesalahan pada query tampil data jumlah surat masuk januari: '.$mysqli->error);
        $data_jan_masuk = $result_jan_masuk->fetch_assoc();

        $result_jan_keluar = $mysqli->query("SELECT count(id_surat_keluar) as jumlah FROM surat_keluar 
                                             WHERE LEFT(tanggal_register,4)='$_POST[tahun]' AND MID(tanggal_register,6,2)='01'")
                                             or die('Ada kesalahan pada query tampil data jumlah surat keluar januari: '.$mysqli->error);
        $data_jan_keluar = $result_jan_keluar->fetch_assoc();
        //=============================================================================================================================================

        $result_feb_masuk = $mysqli->query("SELECT count(id_surat_masuk) as jumlah FROM surat_masuk 
                                            WHERE LEFT(tanggal_diterima,4)='$_POST[tahun]' AND MID(tanggal_diterima,6,2)='02'")
                                            or die('Ada kesalahan pada query tampil data jumlah surat masuk februari: '.$mysqli->error);
        $data_feb_masuk = $result_feb_masuk->fetch_assoc();

        $result_feb_keluar = $mysqli->query("SELECT count(id_surat_keluar) as jumlah FROM surat_keluar 
                                             WHERE LEFT(tanggal_register,4)='$_POST[tahun]' AND MID(tanggal_register,6,2)='02'")
                                             or die('Ada kesalahan pada query tampil data jumlah surat keluar februari: '.$mysqli->error);
        $data_feb_keluar = $result_feb_keluar->fetch_assoc();
        //=============================================================================================================================================

        $result_mar_masuk = $mysqli->query("SELECT count(id_surat_masuk) as jumlah FROM surat_masuk 
                                            WHERE LEFT(tanggal_diterima,4)='$_POST[tahun]' AND MID(tanggal_diterima,6,2)='03'")
                                            or die('Ada kesalahan pada query tampil data jumlah surat masuk maret: '.$mysqli->error);
        $data_mar_masuk = $result_mar_masuk->fetch_assoc();

        $result_mar_keluar = $mysqli->query("SELECT count(id_surat_keluar) as jumlah FROM surat_keluar 
                                             WHERE LEFT(tanggal_register,4)='$_POST[tahun]' AND MID(tanggal_register,6,2)='03'")
                                             or die('Ada kesalahan pada query tampil data jumlah surat keluar maret: '.$mysqli->error);
        $data_mar_keluar = $result_mar_keluar->fetch_assoc();
        //=============================================================================================================================================

        $result_apr_masuk = $mysqli->query("SELECT count(id_surat_masuk) as jumlah FROM surat_masuk 
                                            WHERE LEFT(tanggal_diterima,4)='$_POST[tahun]' AND MID(tanggal_diterima,6,2)='04'")
                                            or die('Ada kesalahan pada query tampil data jumlah surat masuk april: '.$mysqli->error);
        $data_apr_masuk = $result_apr_masuk->fetch_assoc();

        $result_apr_keluar = $mysqli->query("SELECT count(id_surat_keluar) as jumlah FROM surat_keluar 
                                             WHERE LEFT(tanggal_register,4)='$_POST[tahun]' AND MID(tanggal_register,6,2)='04'")
                                             or die('Ada kesalahan pada query tampil data jumlah surat keluar april: '.$mysqli->error);
        $data_apr_keluar = $result_apr_keluar->fetch_assoc();
        //=============================================================================================================================================

        $result_mei_masuk = $mysqli->query("SELECT count(id_surat_masuk) as jumlah FROM surat_masuk 
                                            WHERE LEFT(tanggal_diterima,4)='$_POST[tahun]' AND MID(tanggal_diterima,6,2)='05'")
                                            or die('Ada kesalahan pada query tampil data jumlah surat masuk mei: '.$mysqli->error);
        $data_mei_masuk = $result_mei_masuk->fetch_assoc();

        $result_mei_keluar = $mysqli->query("SELECT count(id_surat_keluar) as jumlah FROM surat_keluar 
                                             WHERE LEFT(tanggal_register,4)='$_POST[tahun]' AND MID(tanggal_register,6,2)='05'")
                                             or die('Ada kesalahan pada query tampil data jumlah surat keluar mei: '.$mysqli->error);
        $data_mei_keluar = $result_mei_keluar->fetch_assoc();
        //=============================================================================================================================================

        $result_jun_masuk = $mysqli->query("SELECT count(id_surat_masuk) as jumlah FROM surat_masuk 
                                            WHERE LEFT(tanggal_diterima,4)='$_POST[tahun]' AND MID(tanggal_diterima,6,2)='06'")
                                            or die('Ada kesalahan pada query tampil data jumlah surat masuk juni: '.$mysqli->error);
        $data_jun_masuk = $result_jun_masuk->fetch_assoc();

        $result_jun_keluar = $mysqli->query("SELECT count(id_surat_keluar) as jumlah FROM surat_keluar 
                                             WHERE LEFT(tanggal_register,4)='$_POST[tahun]' AND MID(tanggal_register,6,2)='06'")
                                             or die('Ada kesalahan pada query tampil data jumlah surat keluar juni: '.$mysqli->error);
        $data_jun_keluar = $result_jun_keluar->fetch_assoc();
        //=============================================================================================================================================

        $result_jul_masuk = $mysqli->query("SELECT count(id_surat_masuk) as jumlah FROM surat_masuk 
                                            WHERE LEFT(tanggal_diterima,4)='$_POST[tahun]' AND MID(tanggal_diterima,6,2)='07'")
                                            or die('Ada kesalahan pada query tampil data jumlah surat masuk juli: '.$mysqli->error);
        $data_jul_masuk = $result_jul_masuk->fetch_assoc();

        $result_jul_keluar = $mysqli->query("SELECT count(id_surat_keluar) as jumlah FROM surat_keluar 
                                             WHERE LEFT(tanggal_register,4)='$_POST[tahun]' AND MID(tanggal_register,6,2)='07'")
                                             or die('Ada kesalahan pada query tampil data jumlah surat keluar juli: '.$mysqli->error);
        $data_jul_keluar = $result_jul_keluar->fetch_assoc();
        //=============================================================================================================================================

        $result_ags_masuk = $mysqli->query("SELECT count(id_surat_masuk) as jumlah FROM surat_masuk 
                                            WHERE LEFT(tanggal_diterima,4)='$_POST[tahun]' AND MID(tanggal_diterima,6,2)='08'")
                                            or die('Ada kesalahan pada query tampil data jumlah surat masuk agustus: '.$mysqli->error);
        $data_ags_masuk = $result_ags_masuk->fetch_assoc();

        $result_ags_keluar = $mysqli->query("SELECT count(id_surat_keluar) as jumlah FROM surat_keluar 
                                             WHERE LEFT(tanggal_register,4)='$_POST[tahun]' AND MID(tanggal_register,6,2)='08'")
                                             or die('Ada kesalahan pada query tampil data jumlah surat keluar agustus: '.$mysqli->error);
        $data_ags_keluar = $result_ags_keluar->fetch_assoc();
        //=============================================================================================================================================
        
        $result_sep_masuk = $mysqli->query("SELECT count(id_surat_masuk) as jumlah FROM surat_masuk 
                                            WHERE LEFT(tanggal_diterima,4)='$_POST[tahun]' AND MID(tanggal_diterima,6,2)='09'")
                                            or die('Ada kesalahan pada query tampil data jumlah surat masuk september: '.$mysqli->error);
        $data_sep_masuk = $result_sep_masuk->fetch_assoc();

        $result_sep_keluar = $mysqli->query("SELECT count(id_surat_keluar) as jumlah FROM surat_keluar 
                                             WHERE LEFT(tanggal_register,4)='$_POST[tahun]' AND MID(tanggal_register,6,2)='09'")
                                             or die('Ada kesalahan pada query tampil data jumlah surat keluar september: '.$mysqli->error);
        $data_sep_keluar = $result_sep_keluar->fetch_assoc();
        //=============================================================================================================================================
        
        $result_okt_masuk = $mysqli->query("SELECT count(id_surat_masuk) as jumlah FROM surat_masuk 
                                            WHERE LEFT(tanggal_diterima,4)='$_POST[tahun]' AND MID(tanggal_diterima,6,2)='10'")
                                            or die('Ada kesalahan pada query tampil data jumlah surat masuk oktober: '.$mysqli->error);
        $data_okt_masuk = $result_okt_masuk->fetch_assoc();

        $result_okt_keluar = $mysqli->query("SELECT count(id_surat_keluar) as jumlah FROM surat_keluar 
                                             WHERE LEFT(tanggal_register,4)='$_POST[tahun]' AND MID(tanggal_register,6,2)='10'")
                                             or die('Ada kesalahan pada query tampil data jumlah surat keluar oktober: '.$mysqli->error);
        $data_okt_keluar = $result_okt_keluar->fetch_assoc();
        //=============================================================================================================================================
        
        $result_nov_masuk = $mysqli->query("SELECT count(id_surat_masuk) as jumlah FROM surat_masuk 
                                            WHERE LEFT(tanggal_diterima,4)='$_POST[tahun]' AND MID(tanggal_diterima,6,2)='11'")
                                            or die('Ada kesalahan pada query tampil data jumlah surat masuk november: '.$mysqli->error);
        $data_nov_masuk = $result_nov_masuk->fetch_assoc();

        $result_nov_keluar = $mysqli->query("SELECT count(id_surat_keluar) as jumlah FROM surat_keluar 
                                             WHERE LEFT(tanggal_register,4)='$_POST[tahun]' AND MID(tanggal_register,6,2)='11'")
                                             or die('Ada kesalahan pada query tampil data jumlah surat keluar november: '.$mysqli->error);
        $data_nov_keluar = $result_nov_keluar->fetch_assoc();
        //=============================================================================================================================================
        
        $result_des_masuk = $mysqli->query("SELECT count(id_surat_masuk) as jumlah FROM surat_masuk 
                                            WHERE LEFT(tanggal_diterima,4)='$_POST[tahun]' AND MID(tanggal_diterima,6,2)='12'")
                                            or die('Ada kesalahan pada query tampil data jumlah surat masuk desember: '.$mysqli->error);
        $data_des_masuk = $result_des_masuk->fetch_assoc();

        $result_des_keluar = $mysqli->query("SELECT count(id_surat_keluar) as jumlah FROM surat_keluar 
                                             WHERE LEFT(tanggal_register,4)='$_POST[tahun]' AND MID(tanggal_register,6,2)='12'")
                                             or die('Ada kesalahan pada query tampil data jumlah surat keluar desember: '.$mysqli->error);
        $data_des_keluar = $result_des_keluar->fetch_assoc();
    ?>
        <div class="content-body"><!-- Basic form layout section start -->
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body collapse in">
                                <div style="padding-bottom:0" class="card-block">
                                    <form class="form" action="rekapitulasi" method="POST">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div style="margin-bottom:5px" class="form-group">
                                                        <label>Tahun <span class="wajib-isi">*</span></label>
                                                        <select class="form-control" name="tahun" autocomplete="off" required>
                                                            <option value="<?php echo $_POST['tahun']; ?>"><?php echo $_POST['tahun']; ?></option>
                                                            <?php
                                                            // sql statement untuk menampilkan data dari tabel tahun
                                                            $query_tahun = $mysqli->query("SELECT LEFT(tanggal_diterima,4) as tahun FROM surat_masuk 
                                                                                           GROUP BY tahun ORDER BY tahun DESC")
                                                                                           or die('Ada kesalahan pada query tampil data tahun: '.$mysqli->error);
                                                            // tampilkan data
                                                            while ($data_tahun = $query_tahun->fetch_assoc()) {
                                                              echo"<option value=\"$data_tahun[tahun]\"> $data_tahun[tahun] </option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-actions">
                                            <input type="submit" class="btn btn-info mr-1" name="tampil" value="Tampilkan">
                                            <a href="rekapitulasi-cetak-<?php echo $_POST['tahun']; ?>" target="_blank" class="btn btn-info mr-1"><i style="margin-right:5px" class="icon-print"></i> Cetak</a>
                                            <a href="rekapitulasi-export-<?php echo $_POST['tahun']; ?>" target="_blank" class="btn btn-info"><i style="margin-right:5px" class="icon-file-excel"></i> Export</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div class="content-body"><!-- Basic Tables start -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="card">
                        <div class="card-header">
                            <a><i style="margin-right:5px" class="icon-info"></i> Rekapitulasi Data Surat Tahun <?php echo $_POST['tahun']; ?></a>
                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                                    <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body collapse in">
                            <div class="card-block card-dashboard">
                                <table class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Bulan</th>
                                            <th>Surat Masuk</th>
                                            <th>Surat Keluar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td width="50" class="center">1</td>
                                            <td width="200">Januari</td>
                                            <td width="150" class="center"><?php echo $data_jan_masuk['jumlah']; ?></td>
                                            <td width="150" class="center"><?php echo $data_jan_keluar['jumlah']; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="50" class="center">2</td>
                                            <td width="200">Februari</td>
                                            <td width="150" class="center"><?php echo $data_feb_masuk['jumlah']; ?></td>
                                            <td width="150" class="center"><?php echo $data_feb_keluar['jumlah']; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="50" class="center">3</td>
                                            <td width="200">Maret</td>
                                            <td width="150" class="center"><?php echo $data_mar_masuk['jumlah']; ?></td>
                                            <td width="150" class="center"><?php echo $data_mar_keluar['jumlah']; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="50" class="center">4</td>
                                            <td width="200">April</td>
                                            <td width="150" class="center"><?php echo $data_apr_masuk['jumlah']; ?></td>
                                            <td width="150" class="center"><?php echo $data_apr_keluar['jumlah']; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="50" class="center">5</td>
                                            <td width="200">Mei</td>
                                            <td width="150" class="center"><?php echo $data_mei_masuk['jumlah']; ?></td>
                                            <td width="150" class="center"><?php echo $data_mei_keluar['jumlah']; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="50" class="center">6</td>
                                            <td width="200">Juni</td>
                                            <td width="150" class="center"><?php echo $data_jun_masuk['jumlah']; ?></td>
                                            <td width="150" class="center"><?php echo $data_jun_keluar['jumlah']; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="50" class="center">7</td>
                                            <td width="200">Juli</td>
                                            <td width="150" class="center"><?php echo $data_jul_masuk['jumlah']; ?></td>
                                            <td width="150" class="center"><?php echo $data_jul_keluar['jumlah']; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="50" class="center">8</td>
                                            <td width="200">Agustus</td>
                                            <td width="150" class="center"><?php echo $data_ags_masuk['jumlah']; ?></td>
                                            <td width="150" class="center"><?php echo $data_ags_keluar['jumlah']; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="50" class="center">9</td>
                                            <td width="200">September</td>
                                            <td width="150" class="center"><?php echo $data_sep_masuk['jumlah']; ?></td>
                                            <td width="150" class="center"><?php echo $data_sep_keluar['jumlah']; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="50" class="center">10</td>
                                            <td width="200">Oktober</td>
                                            <td width="150" class="center"><?php echo $data_okt_masuk['jumlah']; ?></td>
                                            <td width="150" class="center"><?php echo $data_okt_keluar['jumlah']; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="50" class="center">11</td>
                                            <td width="200">November</td>
                                            <td width="150" class="center"><?php echo $data_nov_masuk['jumlah']; ?></td>
                                            <td width="150" class="center"><?php echo $data_nov_keluar['jumlah']; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="50" class="center">12</td>
                                            <td width="200">Desember</td>
                                            <td width="150" class="center"><?php echo $data_des_masuk['jumlah']; ?></td>
                                            <td width="150" class="center"><?php echo $data_des_keluar['jumlah']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Basic Tables end -->
        </div>
    <?php
    } 
}
?>
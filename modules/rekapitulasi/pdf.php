<?php
session_start();
ob_start();

// Panggil koneksi config.php untuk koneksi database
require_once "../../config/config.php";
// panggil fungsi untuk format tanggal
include "../../config/fungsi_tanggal.php";

$hari_ini = date("d-m-Y");
// ambil data hasil submit dari form
$tahun = $_GET['id'];

$configID = "1";
// fungsi query untuk menampilkan data dari tabel sys_config
$result_config = $mysqli->query("SELECT nama_instansi, alamat, telepon, fax, logo FROM sys_config WHERE configID='$configID'")
                          or die('Ada kesalahan pada query tampil data config: '.$mysqli->error);
$data_config = $result_config->fetch_assoc();
//===============================================================================================================================================

$result_jan_masuk = $mysqli->query("SELECT count(id_surat_masuk) as jumlah FROM surat_masuk 
                                    WHERE LEFT(tanggal_diterima,4)='$tahun' AND MID(tanggal_diterima,6,2)='01'")
                                    or die('Ada kesalahan pada query tampil data jumlah surat masuk januari: '.$mysqli->error);
$data_jan_masuk = $result_jan_masuk->fetch_assoc();

$result_jan_keluar = $mysqli->query("SELECT count(id_surat_keluar) as jumlah FROM surat_keluar 
                                     WHERE LEFT(tanggal_register,4)='$tahun' AND MID(tanggal_register,6,2)='01'")
                                     or die('Ada kesalahan pada query tampil data jumlah surat keluar januari: '.$mysqli->error);
$data_jan_keluar = $result_jan_keluar->fetch_assoc();
//=============================================================================================================================================

$result_feb_masuk = $mysqli->query("SELECT count(id_surat_masuk) as jumlah FROM surat_masuk 
                                    WHERE LEFT(tanggal_diterima,4)='$tahun' AND MID(tanggal_diterima,6,2)='02'")
                                    or die('Ada kesalahan pada query tampil data jumlah surat masuk februari: '.$mysqli->error);
$data_feb_masuk = $result_feb_masuk->fetch_assoc();

$result_feb_keluar = $mysqli->query("SELECT count(id_surat_keluar) as jumlah FROM surat_keluar 
                                     WHERE LEFT(tanggal_register,4)='$tahun' AND MID(tanggal_register,6,2)='02'")
                                     or die('Ada kesalahan pada query tampil data jumlah surat keluar februari: '.$mysqli->error);
$data_feb_keluar = $result_feb_keluar->fetch_assoc();
//=============================================================================================================================================

$result_mar_masuk = $mysqli->query("SELECT count(id_surat_masuk) as jumlah FROM surat_masuk 
                                    WHERE LEFT(tanggal_diterima,4)='$tahun' AND MID(tanggal_diterima,6,2)='03'")
                                    or die('Ada kesalahan pada query tampil data jumlah surat masuk maret: '.$mysqli->error);
$data_mar_masuk = $result_mar_masuk->fetch_assoc();

$result_mar_keluar = $mysqli->query("SELECT count(id_surat_keluar) as jumlah FROM surat_keluar 
                                     WHERE LEFT(tanggal_register,4)='$tahun' AND MID(tanggal_register,6,2)='03'")
                                     or die('Ada kesalahan pada query tampil data jumlah surat keluar maret: '.$mysqli->error);
$data_mar_keluar = $result_mar_keluar->fetch_assoc();
//=============================================================================================================================================

$result_apr_masuk = $mysqli->query("SELECT count(id_surat_masuk) as jumlah FROM surat_masuk 
                                    WHERE LEFT(tanggal_diterima,4)='$tahun' AND MID(tanggal_diterima,6,2)='04'")
                                    or die('Ada kesalahan pada query tampil data jumlah surat masuk april: '.$mysqli->error);
$data_apr_masuk = $result_apr_masuk->fetch_assoc();

$result_apr_keluar = $mysqli->query("SELECT count(id_surat_keluar) as jumlah FROM surat_keluar 
                                     WHERE LEFT(tanggal_register,4)='$tahun' AND MID(tanggal_register,6,2)='04'")
                                     or die('Ada kesalahan pada query tampil data jumlah surat keluar april: '.$mysqli->error);
$data_apr_keluar = $result_apr_keluar->fetch_assoc();
//=============================================================================================================================================

$result_mei_masuk = $mysqli->query("SELECT count(id_surat_masuk) as jumlah FROM surat_masuk 
                                    WHERE LEFT(tanggal_diterima,4)='$tahun' AND MID(tanggal_diterima,6,2)='05'")
                                    or die('Ada kesalahan pada query tampil data jumlah surat masuk mei: '.$mysqli->error);
$data_mei_masuk = $result_mei_masuk->fetch_assoc();

$result_mei_keluar = $mysqli->query("SELECT count(id_surat_keluar) as jumlah FROM surat_keluar 
                                     WHERE LEFT(tanggal_register,4)='$tahun' AND MID(tanggal_register,6,2)='05'")
                                     or die('Ada kesalahan pada query tampil data jumlah surat keluar mei: '.$mysqli->error);
$data_mei_keluar = $result_mei_keluar->fetch_assoc();
//=============================================================================================================================================

$result_jun_masuk = $mysqli->query("SELECT count(id_surat_masuk) as jumlah FROM surat_masuk 
                                    WHERE LEFT(tanggal_diterima,4)='$tahun' AND MID(tanggal_diterima,6,2)='06'")
                                    or die('Ada kesalahan pada query tampil data jumlah surat masuk juni: '.$mysqli->error);
$data_jun_masuk = $result_jun_masuk->fetch_assoc();

$result_jun_keluar = $mysqli->query("SELECT count(id_surat_keluar) as jumlah FROM surat_keluar 
                                     WHERE LEFT(tanggal_register,4)='$tahun' AND MID(tanggal_register,6,2)='06'")
                                     or die('Ada kesalahan pada query tampil data jumlah surat keluar juni: '.$mysqli->error);
$data_jun_keluar = $result_jun_keluar->fetch_assoc();
//=============================================================================================================================================

$result_jul_masuk = $mysqli->query("SELECT count(id_surat_masuk) as jumlah FROM surat_masuk 
                                    WHERE LEFT(tanggal_diterima,4)='$tahun' AND MID(tanggal_diterima,6,2)='07'")
                                    or die('Ada kesalahan pada query tampil data jumlah surat masuk juli: '.$mysqli->error);
$data_jul_masuk = $result_jul_masuk->fetch_assoc();

$result_jul_keluar = $mysqli->query("SELECT count(id_surat_keluar) as jumlah FROM surat_keluar 
                                     WHERE LEFT(tanggal_register,4)='$tahun' AND MID(tanggal_register,6,2)='07'")
                                     or die('Ada kesalahan pada query tampil data jumlah surat keluar juli: '.$mysqli->error);
$data_jul_keluar = $result_jul_keluar->fetch_assoc();
//=============================================================================================================================================

$result_ags_masuk = $mysqli->query("SELECT count(id_surat_masuk) as jumlah FROM surat_masuk 
                                    WHERE LEFT(tanggal_diterima,4)='$tahun' AND MID(tanggal_diterima,6,2)='08'")
                                    or die('Ada kesalahan pada query tampil data jumlah surat masuk agustus: '.$mysqli->error);
$data_ags_masuk = $result_ags_masuk->fetch_assoc();

$result_ags_keluar = $mysqli->query("SELECT count(id_surat_keluar) as jumlah FROM surat_keluar 
                                     WHERE LEFT(tanggal_register,4)='$tahun' AND MID(tanggal_register,6,2)='08'")
                                     or die('Ada kesalahan pada query tampil data jumlah surat keluar agustus: '.$mysqli->error);
$data_ags_keluar = $result_ags_keluar->fetch_assoc();
//=============================================================================================================================================

$result_sep_masuk = $mysqli->query("SELECT count(id_surat_masuk) as jumlah FROM surat_masuk 
                                    WHERE LEFT(tanggal_diterima,4)='$tahun' AND MID(tanggal_diterima,6,2)='09'")
                                    or die('Ada kesalahan pada query tampil data jumlah surat masuk september: '.$mysqli->error);
$data_sep_masuk = $result_sep_masuk->fetch_assoc();

$result_sep_keluar = $mysqli->query("SELECT count(id_surat_keluar) as jumlah FROM surat_keluar 
                                     WHERE LEFT(tanggal_register,4)='$tahun' AND MID(tanggal_register,6,2)='09'")
                                     or die('Ada kesalahan pada query tampil data jumlah surat keluar september: '.$mysqli->error);
$data_sep_keluar = $result_sep_keluar->fetch_assoc();
//=============================================================================================================================================

$result_okt_masuk = $mysqli->query("SELECT count(id_surat_masuk) as jumlah FROM surat_masuk 
                                    WHERE LEFT(tanggal_diterima,4)='$tahun' AND MID(tanggal_diterima,6,2)='10'")
                                    or die('Ada kesalahan pada query tampil data jumlah surat masuk oktober: '.$mysqli->error);
$data_okt_masuk = $result_okt_masuk->fetch_assoc();

$result_okt_keluar = $mysqli->query("SELECT count(id_surat_keluar) as jumlah FROM surat_keluar 
                                     WHERE LEFT(tanggal_register,4)='$tahun' AND MID(tanggal_register,6,2)='10'")
                                     or die('Ada kesalahan pada query tampil data jumlah surat keluar oktober: '.$mysqli->error);
$data_okt_keluar = $result_okt_keluar->fetch_assoc();
//=============================================================================================================================================

$result_nov_masuk = $mysqli->query("SELECT count(id_surat_masuk) as jumlah FROM surat_masuk 
                                    WHERE LEFT(tanggal_diterima,4)='$tahun' AND MID(tanggal_diterima,6,2)='11'")
                                    or die('Ada kesalahan pada query tampil data jumlah surat masuk november: '.$mysqli->error);
$data_nov_masuk = $result_nov_masuk->fetch_assoc();

$result_nov_keluar = $mysqli->query("SELECT count(id_surat_keluar) as jumlah FROM surat_keluar 
                                     WHERE LEFT(tanggal_register,4)='$tahun' AND MID(tanggal_register,6,2)='11'")
                                     or die('Ada kesalahan pada query tampil data jumlah surat keluar november: '.$mysqli->error);
$data_nov_keluar = $result_nov_keluar->fetch_assoc();
//=============================================================================================================================================

$result_des_masuk = $mysqli->query("SELECT count(id_surat_masuk) as jumlah FROM surat_masuk 
                                    WHERE LEFT(tanggal_diterima,4)='$tahun' AND MID(tanggal_diterima,6,2)='12'")
                                    or die('Ada kesalahan pada query tampil data jumlah surat masuk desember: '.$mysqli->error);
$data_des_masuk = $result_des_masuk->fetch_assoc();

$result_des_keluar = $mysqli->query("SELECT count(id_surat_keluar) as jumlah FROM surat_keluar 
                                     WHERE LEFT(tanggal_register,4)='$tahun' AND MID(tanggal_register,6,2)='12'")
                                     or die('Ada kesalahan pada query tampil data jumlah surat keluar desember: '.$mysqli->error);
$data_des_keluar = $result_des_keluar->fetch_assoc();
?>
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Laporan Surat Perintah</title>
        <link rel="stylesheet" type="text/css" href="../../assets/css/rekap.css" />
    </head>
    <body>
        <div id="title">
            PEMERINTAH KOTA BANDAR LAMPUNG
        </div>
        <div id="title">
            DINAS PENDIDIKAN
        </div>
        <div id="title-bapas">
            <?php echo strtoupper($data_config['nama_instansi']); ?>
        </div>
        <div id="title-alamat">
            <?php echo $data_config['alamat']; ?> 
        </div>
        <div id="title-tanggal">
            Telp. <?php echo $data_config['telepon']; ?>, Fax. <?php echo $data_config['fax']; ?>
        </div>
        <div style="margin-top:-100px;margin-bottom:5px;margin-left:40px">
            <img src="../../assets/images/logo-instansi/LOGO_KOTA_BANDAR_LAMPUNG.png" alt="Logo" width="85">
        </div>
        <hr><br>
        <div id="title">
            REKAPITULASI DATA SURAT TAHUN <?php echo $tahun; ?>
        </div>
        <br>
        <!-- <div id="isi"> -->
            <table width="100%" border="0.3" cellpadding="0" cellspacing="0">
                <thead style="background:#e8ecee">
                    <tr class="tr-title">
                        <th height="25" align="center" valign="middle">NO.</th>
                        <th height="25" align="center" valign="middle">BULAN</th>
                        <th height="25" align="center" valign="middle">SURAT MASUK</th>
                        <th height="25" align="center" valign="middle">SURAT KELUAR</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td width="50" height="17" align="center" valign="middle">1</td>
                        <td style="padding-left:10px;" width="259" height="17" valign="middle">JANUARI</td>
                        <td width="185" height="17" align="center" valign="middle"><?php echo $data_jan_masuk['jumlah']; ?></td>
                        <td width="185" height="17" align="center" valign="middle"><?php echo $data_jan_keluar['jumlah']; ?></td>
                    </tr>
                    <tr>
                        <td width="50" height="17" align="center" valign="middle">2</td>
                        <td style="padding-left:10px;" width="259" height="17" valign="middle">FEBRUARI</td>
                        <td width="185" height="17" align="center" valign="middle"><?php echo $data_feb_masuk['jumlah']; ?></td>
                        <td width="185" height="17" align="center" valign="middle"><?php echo $data_feb_keluar['jumlah']; ?></td>
                    </tr>
                    <tr>
                        <td width="50" height="17" align="center" valign="middle">3</td>
                        <td style="padding-left:10px;" width="259" height="17" valign="middle">MARET</td>
                        <td width="185" height="17" align="center" valign="middle"><?php echo $data_mar_masuk['jumlah']; ?></td>
                        <td width="185" height="17" align="center" valign="middle"><?php echo $data_mar_keluar['jumlah']; ?></td>
                    </tr>
                    <tr>
                        <td width="50" height="17" align="center" valign="middle">4</td>
                        <td style="padding-left:10px;" width="259" height="17" valign="middle">APRIL</td>
                        <td width="185" height="17" align="center" valign="middle"><?php echo $data_apr_masuk['jumlah']; ?></td>
                        <td width="185" height="17" align="center" valign="middle"><?php echo $data_apr_keluar['jumlah']; ?></td>
                    </tr>
                    <tr>
                        <td width="50" height="17" align="center" valign="middle">5</td>
                        <td style="padding-left:10px;" width="259" height="17" valign="middle">MEI</td>
                        <td width="185" height="17" align="center" valign="middle"><?php echo $data_mei_masuk['jumlah']; ?></td>
                        <td width="185" height="17" align="center" valign="middle"><?php echo $data_mei_keluar['jumlah']; ?></td>
                    </tr>
                    <tr>
                        <td width="50" height="17" align="center" valign="middle">6</td>
                        <td style="padding-left:10px;" width="259" height="17" valign="middle">JUNI</td>
                        <td width="185" height="17" align="center" valign="middle"><?php echo $data_jun_masuk['jumlah']; ?></td>
                        <td width="185" height="17" align="center" valign="middle"><?php echo $data_jun_keluar['jumlah']; ?></td>
                    </tr>
                    <tr>
                        <td width="50" height="17" align="center" valign="middle">7</td>
                        <td style="padding-left:10px;" width="259" height="17" valign="middle">JULI</td>
                        <td width="185" height="17" align="center" valign="middle"><?php echo $data_jul_masuk['jumlah']; ?></td>
                        <td width="185" height="17" align="center" valign="middle"><?php echo $data_jul_keluar['jumlah']; ?></td>
                    </tr>
                    <tr>
                        <td width="50" height="17" align="center" valign="middle">8</td>
                        <td style="padding-left:10px;" width="259" height="17" valign="middle">AGUSTUS</td>
                        <td width="185" height="17" align="center" valign="middle"><?php echo $data_ags_masuk['jumlah']; ?></td>
                        <td width="185" height="17" align="center" valign="middle"><?php echo $data_ags_keluar['jumlah']; ?></td>
                    </tr>
                    <tr>
                        <td width="50" height="17" align="center" valign="middle">9</td>
                        <td style="padding-left:10px;" width="259" height="17" valign="middle">SEPTEMBER</td>
                        <td width="185" height="17" align="center" valign="middle"><?php echo $data_sep_masuk['jumlah']; ?></td>
                        <td width="185" height="17" align="center" valign="middle"><?php echo $data_sep_keluar['jumlah']; ?></td>
                    </tr>
                    <tr>
                        <td width="50" height="17" align="center" valign="middle">10</td>
                        <td style="padding-left:10px;" width="259" height="17" valign="middle">OKTOBER</td>
                        <td width="185" height="17" align="center" valign="middle"><?php echo $data_okt_masuk['jumlah']; ?></td>
                        <td width="185" height="17" align="center" valign="middle"><?php echo $data_okt_keluar['jumlah']; ?></td>
                    </tr>
                    <tr>
                        <td width="50" height="17" align="center" valign="middle">11</td>
                        <td style="padding-left:10px;" width="259" height="17" valign="middle">NOVEMBER</td>
                        <td width="185" height="17" align="center" valign="middle"><?php echo $data_nov_masuk['jumlah']; ?></td>
                        <td width="185" height="17" align="center" valign="middle"><?php echo $data_nov_keluar['jumlah']; ?></td>
                    </tr>
                    <tr>
                        <td width="50" height="17" align="center" valign="middle">12</td>
                        <td style="padding-left:10px;" width="259" height="17" valign="middle">DESEMBER</td>
                        <td width="185" height="17" align="center" valign="middle"><?php echo $data_des_masuk['jumlah']; ?></td>
                        <td width="185" height="17" align="center" valign="middle"><?php echo $data_des_keluar['jumlah']; ?></td>
                    </tr>
                </tbody>
            </table>

            <div id="footer-tanggal">
                Jakarta, <?php echo tgl_eng_to_ind("$hari_ini"); ?>
            </div>

            <div id="footer-jabatan">
                Kepala Bagian Umum
            </div>
            <div id="footer-pegawai-nama">
                Danang Kesuma, S.Kom.
            </div>
        <!-- </div> -->
    </body>
</html><!-- Akhir halaman HTML yang akan di konvert -->
<?php
//ubah untuk menentukan nama file pdf yang dihasilkan nantinya
$filename="Rekapitulasi Data Surat Tahun ".$tahun.".pdf";
//==========================================================================================================
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.($content).'</page>';
// panggil library html2pdf
require_once('../../assets/html2pdf_v4.03/html2pdf.class.php');
try
{
    $html2pdf = new HTML2PDF('P','A4','en', false, 'ISO-8859-15',array(10, 10, 10, 10));
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    $html2pdf->Output($filename);
}
catch(HTML2PDF_exception $e) { echo $e; }
?>
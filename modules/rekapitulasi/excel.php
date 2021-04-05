<?php 

session_start();
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

header("Content-Type: application/force-download");
header("Cache-Control: no-cache, must-revalidate");
header("content-disposition: attachment;filename=Rekapitulasi_Data_Surat_Tahun_".$tahun.".xls");
?>

<!-- Buat Table saat di Export Ke Excel -->
<center>
	<h3>PEMERINTAH KOTA BANDAR LAMPUNG <br>
	DINAS PENDIDIKAN <br>
	<?php echo strtoupper($data_config['nama_instansi']); ?> <br>
	<?php echo $data_config['alamat']; ?> <br>
	Telp. <?php echo $data_config['telepon']; ?>, Fax. <?php echo $data_config['fax']; ?> <br>
	</h3>
	<h3>
	REKAPITULASI DATA SURAT TAHUN <?php echo $tahun; ?>
</center>
<br>
<table border='1'>
	<h3>
		<thead>
			<tr>
				<td align="center" valign="top"><strong>No.</strong></td>
				<td align="center" valign="top" colspan="3"><strong>BULAN</strong></td>
				<td align="center" valign="top"><strong>SURAT MASUK</strong></td>
				<td align="center" valign="top"><strong>SURAT KELUAR</strong></td>
			</tr>
		</thead>
	</h3>

	<tbody>
        <tr>
            <td align="center" valign="top">1</td>
            <td valign="top" colspan="3">JANUARI</td>
            <td align="center" valign="top"><?php echo $data_jan_masuk['jumlah']; ?></td>
            <td align="center" valign="top"><?php echo $data_jan_keluar['jumlah']; ?></td>
        </tr>
        <tr>
            <td align="center" valign="top">2</td>
            <td valign="top" colspan="3">FEBRUARI</td>
            <td align="center" valign="top"><?php echo $data_feb_masuk['jumlah']; ?></td>
            <td align="center" valign="top"><?php echo $data_feb_keluar['jumlah']; ?></td>
        </tr>
        <tr>
            <td align="center" valign="top">3</td>
            <td valign="top" colspan="3">MARET</td>
            <td align="center" valign="top"><?php echo $data_mar_masuk['jumlah']; ?></td>
            <td align="center" valign="top"><?php echo $data_mar_keluar['jumlah']; ?></td>
        </tr>
        <tr>
            <td align="center" valign="top">4</td>
            <td valign="top" colspan="3">APRIL</td>
            <td align="center" valign="top"><?php echo $data_apr_masuk['jumlah']; ?></td>
            <td align="center" valign="top"><?php echo $data_apr_keluar['jumlah']; ?></td>
        </tr>
        <tr>
            <td align="center" valign="top">5</td>
            <td valign="top" colspan="3">MEI</td>
            <td align="center" valign="top"><?php echo $data_mei_masuk['jumlah']; ?></td>
            <td align="center" valign="top"><?php echo $data_mei_keluar['jumlah']; ?></td>
        </tr>
        <tr>
            <td align="center" valign="top">6</td>
            <td valign="top" colspan="3">JUNI</td>
            <td align="center" valign="top"><?php echo $data_jun_masuk['jumlah']; ?></td>
            <td align="center" valign="top"><?php echo $data_jun_keluar['jumlah']; ?></td>
        </tr>
        <tr>
            <td align="center" valign="top">7</td>
            <td valign="top" colspan="3">JULI</td>
            <td align="center" valign="top"><?php echo $data_jul_masuk['jumlah']; ?></td>
            <td align="center" valign="top"><?php echo $data_jul_keluar['jumlah']; ?></td>
        </tr>
        <tr>
            <td align="center" valign="top">8</td>
            <td valign="top" colspan="3">AGUSTUS</td>
            <td align="center" valign="top"><?php echo $data_ags_masuk['jumlah']; ?></td>
            <td align="center" valign="top"><?php echo $data_ags_keluar['jumlah']; ?></td>
        </tr>
        <tr>
            <td align="center" valign="top">9</td>
            <td valign="top" colspan="3">SEPTEMBER</td>
            <td align="center" valign="top"><?php echo $data_sep_masuk['jumlah']; ?></td>
            <td align="center" valign="top"><?php echo $data_sep_keluar['jumlah']; ?></td>
        </tr>
        <tr>
            <td align="center" valign="top">10</td>
            <td valign="top" colspan="3">OKTOBER</td>
            <td align="center" valign="top"><?php echo $data_okt_masuk['jumlah']; ?></td>
            <td align="center" valign="top"><?php echo $data_okt_keluar['jumlah']; ?></td>
        </tr>
        <tr>
            <td align="center" valign="top">11</td>
            <td valign="top" colspan="3">NOVEMBER</td>
            <td align="center" valign="top"><?php echo $data_nov_masuk['jumlah']; ?></td>
            <td align="center" valign="top"><?php echo $data_nov_keluar['jumlah']; ?></td>
        </tr>
        <tr>
            <td align="center" valign="top">12</td>
            <td valign="top" colspan="3">DESEMBER</td>
            <td align="center" valign="top"><?php echo $data_des_masuk['jumlah']; ?></td>
            <td align="center" valign="top"><?php echo $data_des_keluar['jumlah']; ?></td>
        </tr>
    </tbody>
</table>
<br><br>
<table>
	<tr>
		<td align="center" valign="top"></td>
		<td align="center" valign="top"></td>
		<td align="center" valign="top"></td>
		<td align="center" valign="top"></td>
		<td align="center" valign="top"></td>
		<td align="center" valign="top">Jakarta, <?php echo tgl_eng_to_ind("$hari_ini"); ?></td>
	</tr>
	<tr>
		<td align="center" valign="top"></td>
		<td align="center" valign="top"></td>
		<td align="center" valign="top"></td>
		<td align="center" valign="top"></td>
		<td align="center" valign="top"></td>
		<td align="center" valign="top">Kepala Bagian Umum</td>
	</tr>
	<tr>
		<td></td>
	</tr>
	<tr>
		<td></td>
	</tr>
	<tr>
		<td></td>
	</tr>
	<tr>
		<td align="center" valign="top"></td>
		<td align="center" valign="top"></td>
		<td align="center" valign="top"></td>
		<td align="center" valign="top"></td>
		<td align="center" valign="top"></td>
		<td align="center" valign="top"><strong>Danang Kesuma, S.Kom.</strong></td>
	</tr>
</table>

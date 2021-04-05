<?php
session_start();
ob_start();

// Panggil koneksi config.php untuk koneksi database
require_once "../../config/config.php";
// panggil fungsi untuk format tanggal
include "../../config/fungsi_tanggal.php";

$hari_ini = date("d-m-Y");
// ambil data hasil submit dari form

$configID = "1";
// fungsi query untuk menampilkan data dari tabel sys_config
$result_config = $mysqli->query("SELECT nama_instansi, alamat, telepon, fax, email, website, logo FROM sys_config WHERE configID='$configID'")
                          or die('Ada kesalahan pada query tampil data config: '.$mysqli->error);
$data_config = $result_config->fetch_assoc();

$id_surat_keluar = $_GET['id'];
// fungsi query untuk menampilkan data dari tabel surat_keluar
$result = $mysqli->query("SELECT a.id_surat_keluar,a.tujuan_surat,a.nomor_surat,b.id_instansi,b.nama_instansi,b.alamat
                          FROM surat_keluar as a INNER JOIN instansi as b ON a.tujuan_surat=b.id_instansi WHERE a.id_surat_keluar='$id_surat_keluar'") 
                          or die('Ada kesalahan pada query tampil data surat_keluar : '.$mysqli->error);
$data = $result->fetch_assoc();
?>
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Amplop Surat</title>
        <link rel="stylesheet" type="text/css" href="../../assets/css/amplop.css" />
    </head>
    <body style="font-size:11pt">
        <table width="100%" cellpadding="0" cellspacing="0">
            <tr>
                <td style="border-bottom:1px solid #000;" width="105" valign="middle" rowspan="5"><img src="../../assets/images/logo-instansi/<?php echo $data_config['logo']; ?>" alt="Logo" width="90"></td>
                <td style="border-bottom:1px solid #000;font-size:12.5px;" align="center" valign="middle">
                    <span>PEMERINTAH KOTA BANDAR LAMPUNG</span> <br>
                    <span>DINAS PENDIDIKAN</span> <br>
                    <span style="margin-top:2px;font-weight:bold;font-size:17px;"><?php echo $data_config['nama_instansi']; ?></span>
                </td>
            </tr>
            <tr>
                <td align="center" valign="top"></td>
            </tr>
            <tr>
                <td style="font-size:7pt;" align="center" valign="middle">
                    <span><?php echo $data_config['alamat']; ?></span> <br>
                    <span>Telp. <?php echo $data_config['telepon']; ?>, Fax. <?php echo $data_config['fax']; ?></span> <br>
                    <span>Email :  <?php echo $data_config['email']; ?></span> <br>
                    <span>Website : <?php echo $data_config['website']; ?></span>
                </td>
            </tr>
            <tr>
                <td align="center" valign="top"></td>
            </tr>
            <tr>
                <td style="border-bottom:1px solid #000" align="center" valign="top"></td>
            </tr>
        </table>

        <div style="margin-top:15px">
            NOMOR : <?php echo $data['nomor_surat']; ?>
        </div>
        <br><br><br>
        <table width="100%" cellpadding="0" cellspacing="0">
            <tr>
                <td width="420" height="15" valign="top"></td>
                <td width="60" height="15" valign="top">Kepada :</td>
            </tr>
        </table>
        <table width="100%" cellpadding="0" cellspacing="0">
            <tr>
                <td width="420" height="15" valign="top"></td>
                <td width="30" height="15" valign="top">Yth.</td>
                <td width="320" height="15" valign="top">Kepala <?php echo $data['nama_instansi']; ?></td>
            </tr>
            <tr>
                <td width="420" height="15" valign="top"></td>
                <td width="30" height="15" valign="top"></td>
                <td width="320" height="15" valign="top"><?php echo $data['alamat']; ?></td>
            </tr>
        </table>
        <br>

    </body>
</html><!-- Akhir halaman HTML yang akan di konvert -->
<?php
//ubah untuk menentukan nama file pdf yang dihasilkan nantinya
$filename="Laporan Surat Keluar Tanggal ".date('d-m-Y', strtotime($_POST['tgl_awal'])).".pdf";
//==========================================================================================================
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.($content).'</page>';
// panggil library html2pdf
require_once('../../assets/html2pdf_v4.03/html2pdf.class.php');
try
{
    $html2pdf = new HTML2PDF('P','Folio','en', false, 'ISO-8859-15',array(10, 53, 10, 10));
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    $html2pdf->Output($filename);
}
catch(HTML2PDF_exception $e) { echo $e; }
?>
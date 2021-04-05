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
$result_config = $mysqli->query("SELECT nama_instansi, alamat, telepon, fax, logo FROM sys_config WHERE configID='$configID'")
                          or die('Ada kesalahan pada query tampil data config: '.$mysqli->error);
$data_config = $result_config->fetch_assoc();

$id = $_GET['id'];
// fungsi query untuk menampilkan data dari tabel surat_masuk
$result = $mysqli->query("SELECT * FROM profile WHERE id='$id'") 
                          or die('Ada kesalahan pada query tampil data detail : '.$mysqli->error);
$data = $result->fetch_assoc();
?>
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Disposisi Profile</title>
        <link rel="stylesheet" type="text/css" href="../../assets/css/disposisi.css" />
    </head>
    <body style="font-size: 11pt;">
        <table style="border:1px solid #000" width="100%" cellpadding="0" cellspacing="0">
            <tr id="title">
                <td width="708.15" height="100"><?php echo strtoupper($data_config['nama_instansi']); ?> <br> <span style="margin-top:7px">LEMBAR DISPOSISI</span></td>
            </tr>
        </table>

        <div id="isi">
            <table style="border-right:1px solid #000;border-left:1px solid #000;border-bottom:1px solid #000" width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td style="padding-left:15px;" width="140" height="30" valign="middle">NPWP</td>
                    <td width="10" height="30" valign="middle">:</td>
                    <td style="border-right:1px solid #000;" width="170" height="30" valign="middle"><?php echo $data['npwp']; ?></td>
                    <td style="padding-left:15px;" width="150" height="30" valign="middle">Kode KPP/Cabang</td>
                    <td width="10" height="30" valign="middle">:</td>
                    <td width="150" height="30" valign="middle"><?php echo $data['kode_kpp']; ?> / <?php echo $data['kode_cabang']; ?></td>
                </tr>
            </table>
            <table style="border-right:1px solid #000;border-left:1px solid #000;border-bottom:1px solid #000" width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td style="padding-left:15px;" width="140" height="30" valign="middle">KLU SIDJP</td>
                    <td width="10" height="30" valign="middle">:</td>
                    <td style="border-right:1px solid #000;" width="170" height="30" valign="middle"><?php echo $data['klu_sidjp']; ?></td>
                    <td style="padding-left:15px;" width="150" height="30" valign="middle">KLU FAKTUAL</td>
                    <td width="10" height="30" valign="middle">:</td>
                    <td width="150" height="30" valign="middle"><?php echo $data['klu_faktual']; ?></td>
                </tr>
            </table>
            <table style="border-right:1px solid #000;border-left:1px solid #000;border-bottom:1px solid #000" width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td style="padding-left:15px;" width="150" height="15" valign="top"></td>
                    <td width="10" height="15" valign="top"></td>
                    <td width="484" height="15" valign="top"></td>
                </tr>
                <tr>
                    <td style="padding-left:15px;" width="150" height="20" valign="top">Nama</td>
                    <td width="10" height="20" valign="top">:</td>
                    <td width="484" height="20" valign="top"><?php echo $data['nama']; ?></td>
                </tr>
                <tr>
                    <td style="padding-left:15px;" width="150" height="20" valign="top">Tanggal Akta</td>
                    <td width="10" height="20" valign="top">:</td>
                    <td width="484" height="20" valign="top"><?php echo tgl_eng_to_ind(date('d-m-Y', strtotime($data['tgl_akta']))); ?></td>
                </tr>
                <tr>
                    <td style="padding-left:15px;" width="150" height="20" valign="top">Alamat</td>
                    <td width="10" height="20" valign="top">:</td>
                    <td width="484" height="20" valign="top"><?php echo $data['alamat']; ?></td>
                </tr>
                <tr>
                    <td style="padding-left:15px;" width="150" height="20" valign="top">Kendala</td>
                    <td width="10" height="20" valign="top">:</td>
                    <td style="padding-right:15px;" width="484" height="20" valign="top"><?php echo $data['kendala']; ?></td>
                </tr>
                <tr>
                    <td style="padding-left:15px;" width="150" height="20" valign="top">Saran</td>
                    <td width="10" height="20" valign="top">:</td>
                    <td style="padding-right:15px;" width="484" height="20" valign="top"><?php echo $data['saran_masukan']; ?></td>
                </tr>
                <tr>
                    <td style="padding-left:15px;" width="150" height="20" valign="top">Lain lain</td>
                    <td width="10" height="20" valign="top">:</td>
                    <td style="padding-right:15px;" width="484" height="20" valign="top"><?php echo $data['lain_lain']; ?></td>
                </tr>
                <tr>
                    <td style="padding-left:15px;" width="150" height="15" valign="top"></td>
                    <td width="10" height="15" valign="top"></td>
                    <td width="484" height="15" valign="top"></td>
                </tr>
            </table>
            <table style="border-right:1px solid #000;border-left:1px solid #000;border-bottom:1px solid #000" width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td style="border-right:1px solid #000;border-bottom:1px solid #000;" width="351" height="30" align="center" valign="middle">INSTRUKSI / INFORMASI</td>
                    <td style="border-bottom:1px solid #000;" width="351" height="30" align="center" valign="middle">DITERUSKAN KEPADA</td>
                </tr>
                <tr>
                    <td style="border-right:1px solid #000;" width="351" height="200" valign="middle"></td>
                    <td width="351" height="200" valign="middle"></td>
                </tr>
            </table>
        </div>
    </body>
</html><!-- Akhir halaman HTML yang akan di konvert -->
<?php
//ubah untuk menentukan nama file pdf yang dihasilkan nantinya
$filename="Disposisi Profile.pdf";
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
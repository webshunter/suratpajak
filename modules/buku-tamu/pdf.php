<?php
if (isset($_POST['cetak'])) {
    session_start();
    ob_start();

    // Panggil koneksi config.php untuk koneksi database
    require_once "../../config/config.php";
    // panggil fungsi untuk format tanggal
    include "../../config/fungsi_tanggal.php";

    $hari_ini = date("d-m-Y");
    // ambil data hasil submit dari form
    $tgl_awal  = date('Y-m-d', strtotime($_POST['tgl_awal']));
    $tgl_akhir = date('Y-m-d', strtotime($_POST['tgl_akhir']));

    $configID = "1";
    // fungsi query untuk menampilkan data dari tabel sys_config
    $result_config = $mysqli->query("SELECT nama_instansi, alamat, telepon, fax, logo FROM sys_config WHERE configID='$configID'")
                                     or die('Ada kesalahan pada query tampil data config: '.$mysqli->error);
    $data_config = $result_config->fetch_assoc();
    ?>
    <html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
            <title>Laporan Buku Tamu</title>
            <link rel="stylesheet" type="text/css" href="../../assets/css/laporan.css" />
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
            <div style="margin-top:-100px;margin-left:270px;margin-bottom:5px">
                <img src="../../assets/images/logo-instansi/LOGO_KOTA_BANDAR_LAMPUNG.png" alt="Logo" width="80">
            </div>
            <hr><br>
            <div id="title">
                LAPORAN BUKU TAMU
            </div>
            <?php  
            if ($tgl_awal == $tgl_akhir) { ?>
                <div id="title-tanggal">
                    Tanggal <?php echo tgl_eng_to_ind(date('d-m-Y', strtotime($_POST['tgl_awal']))); ?>
                </div>
            <?php
            } else { ?>
                <div id="title-tanggal">
                    Tanggal <?php echo tgl_eng_to_ind(date('d-m-Y', strtotime($_POST['tgl_awal']))); ?> s.d. <?php echo tgl_eng_to_ind(date('d-m-Y', strtotime($_POST['tgl_akhir']))); ?>
                </div>
            <?php
            }
            ?>
            <br>
            <!-- <div id="isi"> -->
                <table width="100%" border="0.3" cellpadding="0" cellspacing="0">
                    <thead style="background:#e8ecee">
                        <tr class="tr-title">
                            <th height="25" align="center" valign="middle">NO.</th>
                            <th height="25" align="center" valign="middle">NAMA</th>
                            <th height="25" align="center" valign="middle">EMAIL</th>
                            <th height="25" align="center" valign="middle">PESAN</th>
                            <th height="25" align="center" valign="middle">TANGGAL</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php  
                    $no = 1;
                    // fungsi query untuk menampilkan data dari tabel buku_tamu
                    $result = $mysqli->query("SELECT * FROM buku_tamu
                                              WHERE tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY id ASC") 
                                              or die('Ada kesalahan pada query tampil data buku_tamu : '.$mysqli->error);
                    $rows = $result->num_rows;
                    // jika data ada, tampilkan data
                    if ($rows > 0) {
                        while ($data = $result->fetch_assoc()) { ?>
                            <tr>
                                <td width="50" height="17" align="center" valign="middle"><?php echo $no; ?></td>
                                <td width="150" height="17" align="center" valign="middle"><?php echo $data["nama"]; ?></td>
                                <td width="150" height="17" align="center" valign="middle"><?php echo $data['email']; ?></td>
                                <td style="padding-left:7px;padding-right:5px;" width="500" height="17" valign="middle"><?php echo $data['pesan']; ?></td>
                                <td width="205" height="17" align="center" valign="middle"><?php echo $data["tanggal"]; ?></td>
                            </tr>
                         <?php
                            $no++;
                        } 
                    } else { ?>
                        <tr>
                            <td width="50" height="17" align="center" valign="middle">-</td>
                            <td width="115" height="17" align="center" valign="middle">-</td>
                            <td width="130" height="17" align="center" valign="middle">-</td>
                            <td width="240" height="17" align="center" valign="middle">-</td>
                            <td width="205" height="17" align="center" valign="middle">-</td>
                        </tr>
                    <?php
                    } ?>
                    </tbody>
                </table>

                <div id="footer-tanggal">
                    Bandar Lampung, <?php echo tgl_eng_to_ind("$hari_ini"); ?>
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
    if ($tgl_awal == $tgl_akhir) { 
        //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
        $filename="Laporan Buku Tamu Tanggal ".date('d-m-Y', strtotime($_POST['tgl_awal'])).".pdf";
    } else {
        $filename="Laporan Buku Tamu Tanggal ".date('d-m-Y', strtotime($_POST['tgl_awal']))." sd ".date('d-m-Y', strtotime($_POST['tgl_akhir'])).".pdf";
    }
    //==========================================================================================================
    $content = ob_get_clean();
    $content = '<page style="font-family: freeserif">'.($content).'</page>';
    // panggil library html2pdf
    require_once('../../assets/html2pdf_v4.03/html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('L','Folio','en', false, 'ISO-8859-15',array(10, 10, 10, 10));
        $html2pdf->setDefaultFont('Arial');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output($filename);
    }
    catch(HTML2PDF_exception $e) { echo $e; }
}
?>
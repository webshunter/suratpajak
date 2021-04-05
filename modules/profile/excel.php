<?php 
if (isset($_POST['export'])) {
	session_start();
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

	header("Content-Type: application/force-download");
	header("Cache-Control: no-cache, must-revalidate");
	if ($tgl_awal == $tgl_akhir) { 
		header("content-disposition: attachment;filename=Laporan_Profile_Tanggal_".date('d-m-Y', strtotime($_POST['tgl_awal'])).".xls");
    } else {
		header("content-disposition: attachment;filename=Laporan_Profile_Tanggal_".date('d-m-Y', strtotime($_POST['tgl_awal']))."_sd_".date('d-m-Y', strtotime($_POST['tgl_akhir'])).".xls");
    }
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
		LAPORAN PROFILE <br>
		<?php  
		if ($tgl_awal == $tgl_akhir) { ?>
	       Tanggal <?php echo tgl_eng_to_ind(date('d-m-Y', strtotime($_POST['tgl_awal']))); ?>
	    <?php
	    } else { ?>
	        Tanggal <?php echo tgl_eng_to_ind(date('d-m-Y', strtotime($_POST['tgl_awal']))); ?> s.d. <?php echo tgl_eng_to_ind(date('d-m-Y', strtotime($_POST['tgl_akhir']))); ?></h3>
	    <?php
	    }
	    ?>
	</center>
	<br>
	<table border='1'>
		<h3>
			<thead>
				<tr>
					<td align="center" valign="top"><strong>No.</strong></td>
                    <th align="center" valign="top">NPWP</th>
					<td align="center" valign="top"><strong>KODE KPP / CABANG</strong></td>
					<td align="center" valign="top"><strong>NAMA</strong></td>
					<td align="center" valign="top"><strong>KENDALA</strong></td>
					<td align="center" valign="top"><strong>SARAN</strong></td>
					<td align="center" valign="top"><strong>LAIN LAIN</strong></td>
				</tr>
			</thead>
		</h3>

		<tbody>
		<?php  
        $no = 1;
        // fungsi query untuk menampilkan data dari tabel surat_masuk
        $result = $mysqli->query("SELECT * FROM profile WHERE tgl_akta BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY id ASC") 
                                  or die('Ada kesalahan pada query tampil data profile : '.$mysqli->error);
        $rows = $result->num_rows;

        // jika data ada, tampilkan data
        if ($rows > 0) {
            while ($data = $result->fetch_assoc()) { ?>
				<tr>
				    <td align="center" valign="top"><?php echo $no; ?></td>
                    <td align="center" valign="top"><?php echo $data['npwp']; ?></td>
                    <td align="center" valign="top"><?php echo $data['kode_kpp']; ?> / <?php echo $data['kode_cabang']; ?></td>
                    <td valign="top"><?php echo $data['nama']; ?></td>
                    <td align="center" valign="top"><?php echo $data["kendala"]; ?></td>
                    <td align="center" valign="top"><?php echo $data['saran_masukan']; ?></td>
                    <td valign="top"><?php echo $data['lain_lain']; ?></td>
				</tr>
			<?php
				$no++;
			}
		} else { ?>
			<tr>
			    <td align="center" valign="top">-</td>
                <td align="center" valign="top">-</td>
                <td align="center" valign="top">-</td>
                <td align="center" valign="top">-</td>
                <td align="center" valign="top">-</td>
                <td align="center" valign="top">-</td>
                <td align="center" valign="top">-</td>
			</tr>
		<?php
		}
		?>
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
			<td align="center" valign="top"></td>
			<td align="center" valign="top">Bandar Lampung, <?php echo tgl_eng_to_ind("$hari_ini"); ?></td>
		</tr>
		<tr>
			<td align="center" valign="top"></td>
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
			<td align="center" valign="top"></td>
			<td align="center" valign="top"><strong>Danang Kesuma, S.Kom.</strong></td>
		</tr>
	</table>
<?php  
}
?>
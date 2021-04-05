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
		header("content-disposition: attachment;filename=Laporan_Surat_Keluar_Tanggal_".date('d-m-Y', strtotime($_POST['tgl_awal'])).".xls");
    } else {
		header("content-disposition: attachment;filename=Laporan_Surat_Keluar_Tanggal_".date('d-m-Y', strtotime($_POST['tgl_awal']))."_sd_".date('d-m-Y', strtotime($_POST['tgl_akhir'])).".xls");
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
		LAPORAN SURAT KELUAR <br>
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
                    <th align="center" valign="top">NOMOR AGENDA</th>
					<td align="center" valign="top"><strong>TANGGAL REGISTER</strong></td>
					<td align="center" valign="top"><strong>TUJUAN SURAT</strong></td>
					<td align="center" valign="top"><strong>NOMOR SURAT</strong></td>
					<td align="center" valign="top"><strong>TANGGAL SURAT</strong></td>
					<td align="center" valign="top"><strong>PERIHAL</strong></td>
				</tr>
			</thead>
		</h3>

		<tbody>
		<?php  
        $no = 1;
        // fungsi query untuk menampilkan data dari tabel surat_keluar
        $result = $mysqli->query("SELECT a.id_surat_keluar,a.nomor_agenda,a.tanggal_register,a.tujuan_surat,a.nomor_surat,a.tanggal_surat,a.perihal,a.keterangan,b.id_instansi,b.nama_instansi
                                  FROM surat_keluar as a INNER JOIN instansi as b ON a.tujuan_surat=b.id_instansi
                                  WHERE a.tanggal_register BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY a.id_surat_keluar ASC") 
                                  or die('Ada kesalahan pada query tampil data surat_keluar : '.$mysqli->error);
        $rows = $result->num_rows;

        // jika data ada, tampilkan data
        if ($rows > 0) {
            while ($data = $result->fetch_assoc()) { ?>
				<tr>
				    <td align="center" valign="top"><?php echo $no; ?></td>
				    <td align="center" valign="top"><?php echo $data['nomor_agenda']; ?></td>
                    <td align="center" valign="top"><?php echo date('d-m-Y', strtotime($data['tanggal_register'])); ?></td>
                    <td valign="top"><?php echo $data['nama_instansi']; ?></td>
                    <td align="center" valign="top"><?php echo $data["nomor_surat"]; ?></td>
                    <td align="center" valign="top"><?php echo date('d-m-Y', strtotime($data['tanggal_surat'])); ?></td>
                    <td valign="top"><?php echo $data['perihal']; ?>, <?php echo $data['keterangan']; ?></td>
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
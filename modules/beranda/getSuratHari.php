<?php  
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )) { ?>
    <ul class="list-group list-group-flush">
        <?php  
        // panggil file config.php untuk koneksi ke database
        require_once "../../config/config.php";

        $hari_ini = date("Y-m-d");
        // fungsi query untuk menampilkan jumlah surat masuk per hari
        $result = $mysqli->query("SELECT count(id_surat_masuk) as jumlah FROM surat_masuk WHERE tanggal_diterima='$hari_ini'")
                                  or die('Ada kesalahan pada query tampil data jumlah surat masuk: '.$mysqli->error);
        $data = $result->fetch_assoc();
        $jumlah_masuk = $data['jumlah'];
        ?>
        <li style="padding:.75rem 3rem;" class="list-group-item">
            <span class="tag tag-default tag-pill bg-primary float-xs-right"><?php echo number_format($jumlah_masuk); ?></span><i style="margin-right:5px" class="icon-angle-right"></i> Surat Masuk
        </li>

        <?php  
        // fungsi query untuk menampilkan jumlah surat keluar per tahun berjalan
        $result = $mysqli->query("SELECT count(id_surat_keluar) as jumlah FROM surat_keluar WHERE tanggal_register='$hari_ini'")
                                        or die('Ada kesalahan pada query tampil data jumlah surat keluar: '.$mysqli->error);
        $data = $result->fetch_assoc();
        $jumlah_keluar = $data['jumlah'];
        ?>
        <li style="padding:.75rem 3rem;" class="list-group-item">
            <span class="tag tag-default tag-pill bg-info float-xs-right"><?php echo number_format($jumlah_keluar); ?></span><i style="margin-right:5px" class="icon-angle-right"></i> Surat Keluar
        </li>
    </ul>
<?php  
} else {
    echo '<script>window.location="../../error-404.html"</script>';
}
?>
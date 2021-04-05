<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )) {

$table = <<<EOT
(   
    SELECT a.kode_transaksi,a.kode_kotakberkas,a.kode_map,a.npwp,a.kode_kpp,a.kode_cabang,a.jenis_dokumen,a.nomor_dokumen,a.tanggal_dokumen,a.keterangan
    FROM is_berkasmasuk as a INNER JOIN is_kotakberkas as b 
    ON a.kode_kotakberkas=b.kode_kotakberkas 
    ORDER BY kode_kotakberkas
) temp
EOT;

    // Table's primary key
    $primaryKey = 'kode_transaksi';

    $columns = array(
        array( 'db' => 'kode_transaksi', 'dt' => 1 ),
        array( 'db' => 'kode_kotakberkas', 'dt' => 2 ),
        array( 'db' => 'kode_map', 'dt' => 3 ),
        array( 'db' => 'npwp', 'dt' => 4 ),
        array( 'db' => 'jenis_dokumen', 'dt' => 5 ),
        array(
            'db' => 'tanggal_dokumen',
            'dt' => 6,
            'formatter' => function( $d, $row ) {
                return date('d-m-Y', strtotime($d));
            }
        ),
        array( 'db' => 'nomor_dokumen', 'dt' => 7 ),
        array( 'db' => 'keterangan', 'dt' => 8 ),

    );

    // SQL server connection information
    require_once "../../config/database.php";
    // ssp class
    require '../../assets/vendors/js/datatables/ssp.class.php';

    echo json_encode(
        SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
    );
} else {
    echo '<script>window.location="../../error-404.html"</script>';
}
?>
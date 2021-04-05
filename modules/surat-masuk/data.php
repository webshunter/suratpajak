<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )) {

$table = <<<EOT
(   
    SELECT a.id_surat_masuk,a.nomor_agenda,a.tanggal_diterima,a.asal_surat,a.nomor_surat,a.tanggal_surat,a.perihal,a.keterangan,b.id_instansi,b.nama_instansi
    FROM surat_masuk as a INNER JOIN instansi as b ON a.asal_surat=b.id_instansi
) temp
EOT;

    // Table's primary key
    $primaryKey = 'id_surat_masuk';

    $columns = array(
        array( 'db' => 'id_surat_masuk', 'dt' => 1 ),
        array( 'db' => 'nomor_agenda', 'dt' => 2 ),
        array(
            'db' => 'tanggal_diterima',
            'dt' => 3,
            'formatter' => function( $d, $row ) {
                return date('d-m-Y', strtotime($d));
            }
        ),
        array( 'db' => 'nama_instansi', 'dt' => 4 ),
        array( 'db' => 'nomor_surat', 'dt' => 5 ),
        array(
            'db' => 'tanggal_surat',
            'dt' => 6,
            'formatter' => function( $d, $row ) {
                return date('d-m-Y', strtotime($d));
            }
        ),
        array( 'db' => 'perihal', 'dt' => 7 ),
        array( 'db' => 'keterangan', 'dt' => 8 ),
        array( 'db' => 'id_surat_masuk', 'dt' => 9 )
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
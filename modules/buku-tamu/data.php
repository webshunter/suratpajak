<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )) {

    // nama table
    $table = 'buku_tamu';
    // Table's primary key
    $primaryKey = 'id';

    $columns = array(
        array( 'db' => 'id', 'dt' => 0 ),
        array( 'db' => 'nama', 'dt' => 1 ),
        array( 'db' => 'email', 'dt' => 2 ),
        array( 'db' => 'pesan', 'dt' => 3 ),
        array( 'db' => 'tanggal', 'dt' => 4,
        'formatter' => function( $d, $row ) {
                return date('d-m-Y', strtotime($d));
            })
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
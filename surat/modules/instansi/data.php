<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )) {

    // nama table
    $table = 'instansi';
    // Table's primary key
    $primaryKey = 'id_instansi';

    $columns = array(
        array( 'db' => 'nama_instansi', 'dt' => 1 ),
        array( 'db' => 'alamat', 'dt' => 2 ),
        array( 'db' => 'id_instansi', 'dt' => 3 )
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
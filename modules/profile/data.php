<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )) {

    // nama table
    $table = 'profile';
    // Table's primary key
    $primaryKey = 'id';

    $columns = array(
        array( 'db' => 'id', 'dt' => 0 ),
        array( 'db' => 'npwp', 'dt' => 1 ),
        array( 'db' => 'kode_kpp', 'dt' => 2 ),
        array( 'db' => 'kode_cabang', 'dt' => 3 ),
        array( 'db' => 'nama', 'dt' => 4),
        array( 'db' => 'alamat', 'dt' => 5),
        array( 'db' => 'kota', 'dt' => 6),
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
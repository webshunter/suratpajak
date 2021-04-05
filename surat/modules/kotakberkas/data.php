<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )) {

$table = <<<EOT
(   
    SELECT kode_kotakberkas,kode_lemari,kode_rak,keterangan 
	FROM is_kotakberkas ORDER BY kode_kotakberkas
) temp
EOT;

    // Table's primary key
    $primaryKey = 'kode_kotakberkas';

    $columns = array(
        array( 'db' => 'kode_kotakberkas', 'dt' => 1 ),
        array( 'db' => 'kode_lemari', 'dt' => 2 ),
        array( 'db' => 'kode_rak', 'dt' => 3 ),
        array( 'db' => 'keterangan', 'dt' => 4 )
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
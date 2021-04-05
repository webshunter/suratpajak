<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )) {
    // nama table
    // $table = 'sys_audit_trail';
$table = <<<EOT
(   
    SELECT a.ID, a.datetime, a.username, a.action, a.description, b.userID, b.user_account_name
    FROM sys_audit_trail as a INNER JOIN sys_users as b ON a.username=b.userID
) temp
EOT;

    // Table's primary key
    $primaryKey = 'ID';

    $columns = array(
        array(
            'db' => 'datetime',
            'dt' => 1,
            'formatter' => function( $d, $row ) {
                return date('d-m-Y H:i:s', strtotime($d));
            }
        ),
        array( 'db' => 'user_account_name', 'dt' => 2 ),
        array( 'db' => 'action', 'dt' => 3 ),
        array( 'db' => 'description', 'dt' => 4 )
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
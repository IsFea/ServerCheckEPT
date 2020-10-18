<?php
include "../private/php/DbConnecter.php";
$request = $_REQUEST;
$sql = "insert into Ticket values
    (   
        {$request['objectId']}
        ,{$request['priority']}
        ,{$request['userId']}
        ,'{$request['description']}'
        ,null
        ,{$request['lat']}
        ,{$request['lon']}
    )";
$q = sqlsrv_query($conn, $sql);
if (!$q){
    echo 'Error: '. PHP_EOL;
    echo '  SQL->' . PHP_EOL . $sql. PHP_EOL;
    var_dump(sqlsrv_errors());
    die();
}
echo 'Fine';
?>
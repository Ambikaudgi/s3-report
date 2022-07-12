<?php
ini_set('max_execution_time', 0);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('memory_limit', '-1');
error_reporting(1);

include_once './db_connect.php';
$db = new db();
$con = $db->connect();

if($con) {
// echo 'Connect';
} else {
    echo 'Not Connect';
    exit();
}

while(mysqli_more_results($con)){mysqli_next_result($con);}
$sql="SELECT * FROM S3Report-Auto";
$result=$db->select($sql);
foreach($result as $line) {
    print_r($line);
    // $EmployeeName = $line['EmployeeName'];
    // $EmployeeID = $line['EmployeeID'];

    // while(mysqli_more_results($econ)){mysqli_next_result($econ);}
    // echo '<br>'.$sql="CALL SP_InserUpdate_Agent('$EmployeeID','$EmployeeName')";
    // $result=$edb->query($sql);
}



?>
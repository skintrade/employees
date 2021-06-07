<?php
$title = 'Employee data page';
function queryTime()
{
    $link = $_GET['emp'];
    // get DB fann_get_total_connections
    require_once './utilities/dbconn.php';
    require './employeesQueries/unique.php';
    require './templates/modules/empPage.php';
}
include('./templates/singleTemplate.php');
?>

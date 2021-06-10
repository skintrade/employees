<?php
$title = 'Employee data page';

include ('./employeesQueries/mstrvars.php');

include ('./errorhandler.php');
include ('./employeesQueries/classes.php');

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

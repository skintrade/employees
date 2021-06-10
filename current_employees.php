<?php

$title = 'Current Employee Listings';

include ('./employeesQueries/mstrvars.php');

include ('./errorhandler.php');
include ('./employeesQueries/classes.php');

function queryTime()
{
    // get DB fann_get_total_connections
    require './utilities/dbconn.php';
    require './employeesQueries/current.php';
}

include('./templates/sortTemplate.php');
?>

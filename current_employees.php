<?php

$title = 'Current Employee Listings';
function queryTime()
{
    // get DB fann_get_total_connections
    require './utilities/dbconn.php';
    require './employeesQueries/current.php';
    //require 'listMain.php';
}


include('./templates/sortTemplate.php');
?>

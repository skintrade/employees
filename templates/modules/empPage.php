<?php

// SET VARIABLES THE UNIQUE DATA SET
while ($myrow = $resultx->fetch_array(MYSQLI_ASSOC))
{
    // MAIN VARIABLES FOR EMPLOYEE RENDERER
    $semp_no = $myrow['emp_no'];
    $sfullname = $myrow['first_name'] . ' ' . $myrow['last_name'];
    $sgender = $myrow['gender'];
    $stitle = $myrow['title'];
    $sdept = $myrow['dept_name'];
    $shired = setTimeUK($myrow['hire_date']);
    $stitlefrom = setTimeUK($myrow['t_from']);
    $ssalary = $myrow['salary'];
    $smanager = $myrow['mgr_emp_no'];
    $smanfullname = $myrow['mgr_first'] . ' ' . $myrow['mgr_last'];
    $smansince = setTimeUK($myrow['mgr_from']);
}
$resultx->close();
$conn->close();

// FIX THE DATE FORMAT
function setTimeUK($tvar){
    $currDate = $tvar;
    $changeDate = date("d-m-Y", strtotime($currDate));
    return $changeDate;
}

include('./templates/modules/simplelisting.php');

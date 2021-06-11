<?php

require './utilities/dbconn.php';
include ('./employeesQueries/mstrvars.php');

if (isset($varTag)) {
    if (in_array($varTag, $varTags)) {
        //echo 'ok';
        $varTag = $varTag;
    } else {
        //echo 'not ok';
        $varTag = '';
    }
}
else {
    $varTag = '';
}

if (isset($_GET['t'])) {
    $varToBechecked = 't';
    $getValue = $_GET['t'];
    $tvarcheck = new checkThoseVars();
    $tvarcheck->varCheckerInput($conn2,$_GET['t'],$varToBechecked);
    $tsetfilter = $tvarcheck->varCheckerOutput($varToBechecked,$getValue,'filter');
    $tisset = $tvarcheck->varCheckerOutput($varToBechecked,$getValue,'sortby');
} else {
    $tsetfilter = "and title.title is not null";
}
if (isset($_GET['d'])) {
    $varToBechecked = 'd';
    $getValue = $_GET['d'];
    $dvarcheck = new checkThoseVars();
    $dvarcheck->varCheckerInput($conn2,$_GET['d'],$varToBechecked);
    $dsetfilter = $dvarcheck->varCheckerOutput($varToBechecked,$getValue,'filter');
    $disset = $dvarcheck->varCheckerOutput($varToBechecked,$getValue,'sortby');
} else {
    $dsetfilter = "and depts.ds_dept_no is not null\n";
}
if (isset($_GET['firstname'])) {
    $varToBechecked = 'fn';
    $getValue = $_GET['firstname'];
    $fnvarcheck = new checkThoseVars();
    $fnvarcheck->varCheckerInput($conn2,$_GET['firstname'],$varToBechecked);
    $fnsetfilter = $fnvarcheck->varCheckerOutput($varToBechecked,$getValue,'filter');
    $fnisset = $fnvarcheck->varCheckerOutput($varToBechecked,$getValue,'sortby');
} else {
    $fnsetfilter = "\n";
}
if (isset($_GET['lastname'])) {
    $varToBechecked = 'ln';
    $getValue = $_GET['lastname'];
    $lnvarcheck = new checkThoseVars();
    $lnvarcheck->varCheckerInput($conn2,$_GET['lastname'],$varToBechecked);
    $lnsetfilter = $lnvarcheck->varCheckerOutput($varToBechecked,$getValue,'filter');
    $lnisset = $lnvarcheck->varCheckerOutput($varToBechecked,$getValue,'sortby');
} else {
    $lnsetfilter = "\n";
}
if (isset($_GET['empno'])) {
    //echo 'ENEN';
    $varToBechecked = 'en';
    $getValue = $_GET['empno'];
    $getValue = preg_replace('/\D/','', $getValue);
    $envarcheck = new checkThoseVars();
    $envarcheck->varCheckerInput($conn2,$_GET['empno'],$varToBechecked);
    $nosetfilter = $envarcheck->varCheckerOutput($varToBechecked,$getValue,'filter');
    $enisset = $envarcheck->varCheckerOutput($varToBechecked,$getValue,'sortby');
} else {
    $nosetfilter = "\n";
}

if (isset($_GET['sortby'])) {
    $varTag = $_GET['sortby'];
    if (isset($varTag)) {
        if (in_array($varTag, $varTags)) {
            $varTag = $varTag;
        } else {
            $varTag = 'emp_no';
        }
    }
    if ($varTag == 'emp_no') {
        $sort_1 = 'employees1.emp_no ASC';
    } elseif ($varTag == 'first') {
        $sort_1 = 'employees1.first_name ASC';
    } elseif ($varTag == 'last') {
        $sort_1 = 'employees1.last_name ASC';
    } elseif ($varTag == 'role') {
        $sort_1 = 'title.title ASC';
    } elseif ($varTag == 'dept') {
        $sort_1 = 'depts.dept_name ASC';
    }
} elseif (!isset($_GET['sortby'])) {
    $varTag = $varTag;
    $sort_1 = 'employees1.emp_no ASC';
}

//pagination of records
if (isset($_GET['pageno'])) {
    $pagnocheck = new pageNumberCheck();
    $pagnocheck->pnocheck1($_GET['pageno']);
    $pageno = $pagnocheck->getPaginNum();
} else {
    $pageno = 1;
}

if (isset($_GET['emp'])) {
    $empnolinkcl= preg_replace('/\D/','', $_GET['emp']);
    $singleUserGetter = new getASingleUser();
    $singleUserGetter->singleUserDump($empnolinkcl);
    $empnogot = $singleUserGetter->getEmpNum();
}

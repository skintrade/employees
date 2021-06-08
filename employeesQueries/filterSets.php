<?php

// variable masters
$varTag;
$sort_1;
$tset;
$tsetfilter;
$dset;
$dsetfilter;
$fnset;
$fnsetfilter;
$lnset;
$lnsetfilter;
$noset;
$nosetfilter;


include ('./employeesQueries/arrays.php');
//subset of records by role/title
if (isset($_GET['t'])) {
    $tset = $_GET['t'];
    if (in_array($tset, $rolessArray)) {
        $tsetfilter = 'and title.title = "'.$tset . '"';
    }
    else {
        $tsetfilter = "and title.title is not null\n";
    }
}
elseif (!isset($_GET['t'])) {
    $tsetfilter = "and title.title is not null\n";
}
// subset of records by department
if (isset($_GET['d'])) {
    $dset = $_GET['d'];
    if (in_array($dset, $deptsArray)) {
        $dsetfilter = 'and depts.ds_dept_no = "'.$dset . '"';
    }
    else {
        $dsetfilter = "and depts.ds_dept_no is not null\n";
    }
}
elseif (!isset($_GET['d'])) {
    $dsetfilter = "and depts.ds_dept_no is not null\n";
}
// subset of records by department
if (isset($_GET['firstname'])) {
    $fnset = $_GET['firstname'];
    $fnsetfilter = 'and employees1.first_name LIKE "'. $fnset .'%"';
}
elseif (!isset($_GET['firstname'])) {
    $fnsetfilter = "\n";
}
if (isset($_GET['lastname'])) {
    $lnset = $_GET['lastname'];
    $lnsetfilter = 'and employees1.last_name LIKE "'. $lnset .'%"';
}
elseif (!isset($_GET['lastname'])) {
    $lnsetfilter = "\n";
}
//employees1.emp_no
if (isset($_GET['empno'])) {
    $noset = $_GET['empno'];
    $nosetfilter = 'and employees1.emp_no LIKE "'. $noset .'%"';
}
elseif (!isset($_GET['empno'])) {
    $nosetfilter = "\n";
}
// basic sorters
if (isset($_GET['sortby'])) {
    $varTag = $_GET['sortby'];

    //$varTags = array("emp_no","first","last","role","dept");

    if (isset($varTag)) {
        if (in_array($varTag, $varTags)) {
            $varTag = $varTag;
        } else {
            $varTag = 'emp_no';
        }
    }

    if ($varTag == 'emp_no') {
        $sort_1 = 'employees1.emp_no ASC';
    }
    elseif ($varTag == 'first') {
        $sort_1 = 'employees1.first_name ASC';
    }
    elseif ($varTag == 'last') {
        $sort_1 = 'employees1.last_name ASC';
    }
    elseif ($varTag == 'role') {
        $sort_1 = 'title.title ASC';
    }
    elseif ($varTag == 'dept') {
        $sort_1 = 'depts.dept_name ASC';
    }
}
elseif (!isset($_GET['sortby'])) {
    $sort_1 = 'employees1.emp_no ASC';
}


/////////

if (isset($_GET['firstname'])) {
    $fnisset = $_GET['firstname'];
    }
else {
    $fnisset = '';
}
if (isset($_GET['lastname'])) {
    $lnisset = $_GET['lastname'];
    }
else {
    $lnisset = '';
}
if (isset($_GET['empno'])) {
    $enisset = $_GET['empno'];
    }
else {
    $enisset = '';
}
if (isset($_GET['d'])){
    $dTag = $_GET['d'];
    //$varTags = array("emp_no","first","last","role","dept");
    if (isset($dTag)) {
        if (in_array($dTag, $deptsArray)) {
            $disset = $dTag;
        } else {
            $disset = '';
        }
    }
    //$disset = $_GET['d'];
}
else {
    $disset = '';
}
if (isset($_GET['t'])){
    $tTag = $_GET['t'];
    //$varTags = array("emp_no","first","last","role","dept");
    if (isset($tTag)) {
        if (in_array($tTag, $rolessArray)) {
            $tisset = $tTag;
        } else {
            $tisset = '';
        }
    }
    //$tisset = $_GET['t'];
}
else {
    $tisset = '';
}

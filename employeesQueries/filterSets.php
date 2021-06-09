<?php

// variable masters
$varTag;
$sort_1;

include ('./employeesQueries/arrays.php');
// basic sorters
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

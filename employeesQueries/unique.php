<?php

include ('./employeesQueries/filterSets.php');

// GET THE UNIQUE DATA SET
/*
timer start - for testing and debugging
un comment lines as required
- see also timer end below
*/
//$started = microtime(true);

$sql = "SELECT distinct * FROM employees as employees1\n"
    . "left join (select emp_no as s_emp_no, salary as salary, from_date as s_from, to_date as s_to from salaries) as sals on employees1.emp_no=sals.s_emp_no\n"
    . "left join (select emp_no as d_emp_no, dept_no as dept_no, from_date as d_from, to_date as d_to from dept_emp) as dept on employees1.emp_no=dept.d_emp_no\n"
    . "left join (select emp_no as t_emp_no, title as title, from_date as t_from, to_date as t_to from titles) as title on employees1.emp_no=title.t_emp_no\n"
    . "left join (select dept_no as ds_dept_no, dept_name as dept_name from departments) as depts on dept.dept_no=depts.ds_dept_no\n"
    . "left join (select emp_no as mgr_emp_no, dept_no as mgr_dept_no, from_date as mgr_from, to_date as mgr_to from dept_manager) as mgr on dept.dept_no=mgr.mgr_dept_no\n"
    . "left join (select emp_no as e2_emp_no, first_name as mgr_first, last_name as mgr_last from employees) as employees2 on employees2.e2_emp_no=mgr.mgr_emp_no\n"
    . "where sals.s_to > current_date()\n"
    . "and employees1.emp_no = $empnogot\n"
    . "and mgr.mgr_to > current_date()\n"
    . "and title.t_to > current_date()\n"
    . "and sals.s_to is not null\n"
    . "and mgr.mgr_to is not null\n"
    . "LIMIT 1";
$result = $conn->query($sql, MYSQLI_USE_RESULT);

if ($result= mysqli_query($conn2,$sql)) {
	// it return number of rows in the table.
	$row = mysqli_num_rows($result);
    // for testing purposes - uncomment as required
	if ($row) {
        //echo "total number of current employees: " .$row;
	}
    else {
        header("Location: ./error.php");
        exit;
    }
}
else {
    //echo 'count broken again';
}

/*
timer end - for testing and debugging
un comment lines as required
*/
//$end = microtime(true);
//$difference = $end - $started;
//$queryTime = number_format($difference, 10);

/* if needed for testing
echo '<div class="spacerVert centerify">' .
    '<code class="small">query took ' . $queryTime . ' seconds to complete.</code>' .
    '</div>';
*/

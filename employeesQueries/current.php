<?php

include ('./employeesQueries/filterSets.php');

$offset = ($pageno-1) * $no_of_records_per_page;

//timer start
$started = microtime(true);

$sql = "SELECT * FROM employees as employees1\n"
    . "left join (select emp_no as s_emp_no, to_date as s_to from salaries) as sals on employees1.emp_no=sals.s_emp_no\n"
    . "left join (select emp_no as d_emp_no, dept_no as dept_no, to_date as d_to from dept_emp) as dept on employees1.emp_no=dept.d_emp_no\n"
    . "left join (select emp_no as t_emp_no, title as title, to_date as t_to from titles) as title on employees1.emp_no=title.t_emp_no\n"
    . "left join (select dept_no as ds_dept_no, dept_name as dept_name from departments) as depts on dept.dept_no=depts.ds_dept_no\n"
    . "left join (select dept_no as mgr_dept_no, to_date as mgr_to from dept_manager) as mgr on dept.dept_no=mgr.mgr_dept_no\n"
    . "where sals.s_to > current_date()\n"
    . "and mgr.mgr_to > current_date()\n"
    . "$tsetfilter"
    . "$dsetfilter"
    . "and dept.d_to > current_date()\n"
    . "and title.t_to > current_date()\n"
    . "$fnsetfilter"
    . "$lnsetfilter"
    . "$nosetfilter"
    . "order by $sort_1 LIMIT $no_of_records_per_page OFFSET $offset";

$result = mysqli_query($conn, $sql, MYSQLI_STORE_RESULT);

include('./templates/modules/listingHeader.php');

if ($result) {
// it return number of rows in the table.
    $row = mysqli_num_rows($result);

// for testing purposes - uncomment as required
	if ($row) {
        while ($myrow = $result->fetch_array(MYSQLI_ASSOC))
        {
                echo '<tr class="clickable-row" data-href="employee?emp=' . $myrow['emp_no'] . '"><td>' . $myrow['emp_no'] . '</td>' .
                '<td>' . $myrow['first_name'] . ' ' . $myrow['last_name'] . '</td>' .
                '<td>' . $myrow['title'] . '</td>' .
                '<td>' . $myrow['dept_name'] . '</td>' .
                '</tr>';
        }
	}
    else {
        trigger_error("0 Results found - please check your search parameters", E_USER_NOTICE);
    }
}
else {
    trigger_error("NO DATA RETURNED", E_USER_WARNING);
}
echo '</tbody></table>';

//timer end
$end = microtime(true);
$difference = $end - $started;
$queryTime = number_format($difference, 10);

include('./employeesQueries/totalCurrent.php');
include('./templates/modules/paginationControl.php');

echo '<div class="spacerVert centerify">' .
    '<code class="small">query took ' . $queryTime . ' seconds to complete.</code>' .
    '</div>';

<?php
include ('./employeesQueries/filterSets.php');

$tsetfilter;
$dsetfilter;
$fnsetfilter;
$lnsetfilter;
$nosetfilter;

if (isset($_GET['t'])) {
    $varToBechecked = 't';
    $getValue = $_GET['t'];
    $tvarcheck = new checkThoseVars();
    $tvarcheck->varCheckerInput($conn3,$_GET['t'],$varToBechecked);
    $tsetfilter = $tvarcheck->varCheckerOutput($varToBechecked,$getValue,'filter');
} else {
    $tsetfilter = "and title.title is not null\n";
}
if (isset($_GET['d'])) {
    $varToBechecked = 'd';
    $getValue = $_GET['d'];
    $dvarcheck = new checkThoseVars();
    $dvarcheck->varCheckerInput($conn3,$_GET['d'],$varToBechecked);
    $dsetfilter = $dvarcheck->varCheckerOutput($varToBechecked,$getValue,'filter');
} else {
    $dsetfilter = "and depts.ds_dept_no is not null\n";
}
if (isset($_GET['firstname'])) {
    $varToBechecked = 'fn';
    $getValue = $_GET['firstname'];
    $fnvarcheck = new checkThoseVars();
    $fnvarcheck->varCheckerInput($conn3,$_GET['firstname'],$varToBechecked);
    $fnsetfilter = $fnvarcheck->varCheckerOutput($varToBechecked,$getValue,'filter');
} else {
    $fnsetfilter = "\n";
}
if (isset($_GET['lastname'])) {
    $varToBechecked = 'ln';
    $getValue = $_GET['lastname'];
    $lnvarcheck = new checkThoseVars();
    $lnvarcheck->varCheckerInput($conn3,$_GET['lastname'],$varToBechecked);
    $lnsetfilter = $lnvarcheck->varCheckerOutput($varToBechecked,$getValue,'filter');
} else {
    $lnsetfilter = "\n";
}
if (isset($_GET['empno'])) {
    //echo 'ENEN';
    $varToBechecked = 'en';
    $getValue = $_GET['empno'];
    $getValue = preg_replace('/\D/','', $getValue);
    $envarcheck = new checkThoseVars();
    $envarcheck->varCheckerInput($conn3,$_GET['empno'],$varToBechecked);
    $nosetfilter = $envarcheck->varCheckerOutput($varToBechecked,$getValue,'filter');
} else {
    $nosetfilter = "\n";
}

//get count of current employees for pagination
$sql2 = "SELECT * FROM dept_emp as dept\n"
    . "left join (select dept_no as ds_dept_no, dept_name as dept_name from departments) as depts on dept.dept_no=depts.ds_dept_no\n"
	. "left join (select emp_no as t_emp_no, to_date as t_to, title as title from titles) as title on dept.emp_no=title.t_emp_no\n"
    . "left join (select emp_no as mgr_emp_no, dept_no as mgr_dept_no, from_date as mgr_from, to_date as mgr_to from dept_manager) as mgr on dept.dept_no=mgr.mgr_dept_no\n"
	. "left join (select emp_no, first_name, last_name from employees)as employees1 on title.t_emp_no=employees1.emp_no\n"
    .  "where dept.to_date > current_date()\n"
    . "and title.t_to > current_date()\n"
    . "and mgr.mgr_to > current_date()\n"
	. "$tsetfilter"
	. "$dsetfilter"
    . "$fnsetfilter"
    . "$lnsetfilter"
    . "$nosetfilter";

if ($result2= mysqli_query($conn2,$sql2)) {
	// it return number of rows in the table.
	$row = mysqli_num_rows($result2);
    // for testing purposes - uncomment as required
	if ($row) {
        //echo "total number of current employees: " .$row;
	}
    else {
        //echo "broken";
    }
}
else {
    //echo 'count broken again';
}
$result2->close();
$conn2->close();

$no_of_records_per_page = 30;
$total_records = $row;
$total_pages = ceil($row / $no_of_records_per_page);
// end: get count of current employees for pagination

// clean up page number filter
$param = 'pageno';
function currenturl_without_queryparam( $queryparamkey ) {
    $current_url = current_url();
    $parsed_url = parse_url( $current_url );
    if( array_key_exists( 'query', $parsed_url )) {
        $query_portion = $parsed_url['query'];
    } else {
        return $current_url;
    }
    parse_str( $query_portion, $query_array );
    if( array_key_exists( $queryparamkey , $query_array ) ) {
        unset( $query_array[$queryparamkey] );
        $q = ( count( $query_array ) === 0 ) ? '' : '?';
        return $parsed_url['scheme'] . '://' . $parsed_url['host'] . $parsed_url['path'] . $q . http_build_query( $query_array );
    } else {
        return $current_url;
    }
    //echo $current_url;
}
function current_url() {
    $current_url = 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
    return $current_url;
}
$uri = currenturl_without_queryparam($param).'?&'.$param.'=';

// end: clean up page number filter

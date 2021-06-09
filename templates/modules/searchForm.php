<?php

require './utilities/dbconn.php';

//include ('./employeesQueries/filterSets.php') ;
$tsetfilter;
$dsetfilter;
$fnsetfilter;
$lnsetfilter;
$nosetfilter;
$fnisset = '';
$lnisset = '';
$enisset = '';
$tisset = '';
$disset = '';
$varTags = array("emp_no","first","last","role","dept");

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
    $tvarcheck->varCheckerInput($conn3,$_GET['t'],$varToBechecked);
    $tisset = $tvarcheck->varCheckerOutput($varToBechecked,$getValue,'sortby');
} /*else {
    $tisset = "";
}*/
if (isset($_GET['d'])) {
    $varToBechecked = 'd';
    $getValue = $_GET['d'];
    $dvarcheck = new checkThoseVars();
    $dvarcheck->varCheckerInput($conn3,$_GET['d'],$varToBechecked);
    $disset = $dvarcheck->varCheckerOutput($varToBechecked,$getValue,'sortby');
} /*else {
    $disset = "";
}*/
if (isset($_GET['firstname'])) {
    $varToBechecked = 'fn';
    $getValue = $_GET['firstname'];
    $fnvarcheck = new checkThoseVars();
    $fnvarcheck->varCheckerInput($conn3,$_GET['firstname'],$varToBechecked);
    $fnisset = $fnvarcheck->varCheckerOutput($varToBechecked,$getValue,'sortby');
} /*else {
    $fnisset = "";
}*/
if (isset($_GET['lastname'])) {
    $varToBechecked = 'ln';
    $getValue = $_GET['lastname'];
    $lnvarcheck = new checkThoseVars();
    $lnvarcheck->varCheckerInput($conn3,$_GET['lastname'],$varToBechecked);
    $lnisset = $lnvarcheck->varCheckerOutput($varToBechecked,$getValue,'sortby');
} /*else {
    $lnisset = "";
}*/
if (isset($_GET['empno'])) {
    $varToBechecked = 'en';
    $getValue = $_GET['empno'];
    $getValue = preg_replace('/\D/','', $getValue);
    $envarcheck = new checkThoseVars();
    $envarcheck->varCheckerInput($conn3,$_GET['empno'],$varToBechecked);
    $enisset = $envarcheck->varCheckerOutput($varToBechecked,$getValue,'sortby');
} /*else {
    $enisset = "";
}*/
?>
<form class="empSearch" id="form_hps" method="get" action="current_employees.php">
    <div class="form_description">
        <h3>Search Employees</h3>
        <p>Please use the free form search below</p>
    </div>
    <div>
        <div class="input-row row">
            <div class="col-sm-4">
            <label class="description" for="freename1">First Name</label> <input id="freename1" class="f_free" name="firstname" type="text" maxlength="255" value="<?php echo htmlspecialchars($fnisset) ?>"/>
        </div>
        <div class="col-sm-4">
            <label class="description" for="freename2">Last Name</label><input id="freename2" class="f_free" name="lastname" type="text" maxlength="255" value="<?php echo htmlspecialchars($lnisset) ?>"/>
        </div>
        <div class="col-sm-4">
            <label class="description" for="empno">Employee Number</label><input id="empno" class="f_free" name="empno" type="text" maxlength="255" value="<?php echo htmlspecialchars($enisset) ?>"/>
        </div>
        </div>
    </div>
    <div  class="input-row row">
        <div class="col-sm-4">
            <label class="description" for="t">Job Title </label>
            <select id="t" name="t">
                <option value="" <?php if ($tisset == '') echo ' selected="selected"'; ?> ></option>
                <option value="Assistant Engineer" <?php if ($tisset == 'Assistant Engineer') echo ' selected="selected"'; ?> >Assistant Engineer</option>
                <option value="Engineer" <?php if ($tisset == 'Engineer') echo ' selected="selected"'; ?> >Engineer</option>
                <option value="Manager" <?php if ($tisset == 'Manager') echo ' selected="selected"'; ?> >Manager</option>
                <option value="Senior Engineer" <?php if ($tisset == 'Senior Engineer') echo ' selected="selected"'; ?> >Senior Engineer</option>
                <option value="Senior Staff" <?php if ($tisset == 'Senior Staff') echo ' selected="selected"'; ?> >Senior Staff</option>
                <option value="Technique Leader" <?php if ($tisset == 'Technique Leader') echo ' selected="selected"'; ?> >Technique Leader</option>
                <option value="Staff" <?php if ($tisset == 'Staff') echo ' selected="selected"'; ?> >Staff</option>
            </select>
        </div>
        <div class="col-sm-4">
            <label class="description" for="d">Department </label>
            <select id="d" name="d">
                <option value="" <?php if ($disset == '') echo ' selected="selected"'; ?> ></option>
                <option value="d009" <?php if ($disset == 'd009') echo ' selected="selected"'; ?> >Customer Service</option>
                <option value="d005" <?php if ($disset == 'd005') echo ' selected="selected"'; ?> >Development</option>
                <option value="d002" <?php if ($disset == 'd002') echo ' selected="selected"'; ?> >Finance</option>
                <option value="d003" <?php if ($disset == 'd003') echo ' selected="selected"'; ?> >HR</option>
                <option value="d001" <?php if ($disset == 'd001') echo ' selected="selected"'; ?> >Marketing</option>
                <option value="d004" <?php if ($disset == 'd004') echo ' selected="selected"'; ?> >Production</option>
                <option value="d006" <?php if ($disset == 'd006') echo ' selected="selected"'; ?> >Quality Management</option>
                <option value="d008" <?php if ($disset == 'd008') echo ' selected="selected"'; ?> >Research</option>
                <option value="d007" <?php if ($disset == 'd007') echo ' selected="selected"'; ?> >Sales</option>
            </select>
        </div>
        <div class="col-sm-4">
        </div>
    </div>
    <div  class="input-row row">
        <div class="col-sm-12">
            <div class="centerify">
                <input id="saveForm" class="button_text btn" type="submit"  />
                <a class="button btn" type='reset' id="sreset" value='Reset' name='reset' disabled>Reset</a>
            </div>
            <input type="hidden" name="form_id" value="mmdev" disabled="disabled"/>
        </div>
    </div>
</form>

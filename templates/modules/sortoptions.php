<?php
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
    $envarcheck = new checkThoseVars();
    $envarcheck->varCheckerInput($conn3,$_GET['empno'],$varToBechecked);
    $enisset = $envarcheck->varCheckerOutput($varToBechecked,$getValue,'sortby');
} /*else {
    $enisset = "";
}*/
?>

<div class="row">
<form  class="empSortOpt" id="form_hps" method="get" action="">
    <div class="input-row row">
        <div class=" hard-right innerDiv">
    <label class="description" for="sortby">Sort By : </label>
    <select id="sortby" name="sortby">
        <option value="emp_no" <?php if (($varTag == '') || ($varTag == 'emp_no')) echo ' selected="selected"'; ?> > Employee Number</option>
        <option value="first" <?php if ($varTag == 'first') echo ' selected="selected"'; ?> >First Name</option>
        <option value="last" <?php if ($varTag == 'last') echo ' selected="selected"'; ?> >Last Name</option>
        <?php if ($tisset == '' ) : ?>
        <option value="role" <?php if ($varTag == 'role') echo ' selected="selected"'; ?> >Role</option>
        <?php endif; ?>
        <?php if ($disset == '' ) : ?>
        <option value="dept" <?php if ($varTag == 'dept') echo ' selected="selected"'; ?> >Department</option>
        <?php endif; ?>
    </select>
    <?php  if ($fnisset != '') : ?>
        <input type="hidden" id="firstname" name="firstname" value="<?php echo $fnisset ?>">
    <?php endif;?>
    <?php  if ($lnisset != '') : ?>
        <input type="hidden" id="lastname" name="lastname" value="<?php echo $lnisset ?>">
    <?php endif;?>
    <?php  if ($enisset != '') : ?>
    <input type="hidden" id="empno" name="empno" value="<?php echo $enisset ?>">
    <?php endif;?>
    <?php  if ($tisset != '') : ?>
    <input type="hidden" id="t" name="t" value="<?php echo $tisset ?>">
    <?php endif;?>
    <?php  if ($disset != '') : ?>
    <input type="hidden" id="d" name="d" value="<?php echo $disset ?>">
    <?php endif;?>
    <input id="sendForm" class="button_text btn" type="submit"  />
</div>
</div>
</form>
</div>

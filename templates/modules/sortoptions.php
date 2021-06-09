<?php
//include ('./employeesQueries/filterSets.php') ;
//$varTags = array("emp_no","first","last","role","dept");
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
} ?>
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
    <input type="hidden" id="firstname" name="firstname" value="<?php echo $fnisset ?>">
    <input type="hidden" id="lastname" name="lastname" value="<?php echo $lnisset ?>">
    <input type="hidden" id="empno" name="empno" value="<?php echo $enisset ?>">
    <input type="hidden" id="t" name="t" value="<?php echo $tisset ?>">
    <input type="hidden" id="d" name="d" value="<?php echo $disset ?>">
    <input id="sendForm" class="button_text btn" type="submit"  />
</div>
</div>
</form>
</div>

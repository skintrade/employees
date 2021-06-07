<!-- RENDER THE EMPLOYEE DATA -->
<div class="row">
    <div class="col-sm-2">
        <img src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png" alt="Portrait_Placeholder" width="100%">
    </div>
    <div class="col-sm-10">
        <div class="boxalpha-inner">
            <h4>Name: <?php echo $sfullname ?></h4>
            <p>Employee ID: <?php echo $semp_no ?></p>
            <p>Name: <?php echo $sfullname ?></p>
            <p>Job Title: <?php echo $stitle ?></p>
            <p>Department: <?php echo $sdept; ?></p>
            <p>Gender: <?php echo $sgender; ?></p>
            <p>Date of initial hire:  <?php echo $shired?></p>
            <p>Current Role start date: <?php echo $stitlefrom?></p>
            <p>Current Salary: <?php echo $ssalary?> p.a.</p>
            <?php if ($smanager != $semp_no ) : ?>
            <p>Department Manager : <a href="about?emp=<?php echo $smanager?>" ><?php echo $smanfullname?></a> (from <?php echo $smansince?>)</p>
            <?php endif; ?>
        </div>
    </div>
</div>

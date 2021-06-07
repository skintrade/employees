<?php

$page_str = <<< EOPAGE

<table class="userListing container-fluid">
    <thead>
        <tr class="">
            <th class="">employee ID</th>
            <th class="">Name</th>
            <th class="">Role</th>
            <th class="">Department</th>
        <tr>
    </thead>
<tbody>

EOPAGE;
include ('./templates/modules/sortoptions.php');
echo $page_str;

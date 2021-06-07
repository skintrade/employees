<?php
while ($myrow = $result->fetch_array(MYSQLI_ASSOC))
{
        echo '<tr class="clickable-row" data-href="about?emp=' . $myrow['emp_no'] . '"><td>' . $myrow['emp_no'] . '</td>' .
        '<td>' . $myrow['first_name'] . ' ' . $myrow['last_name'] . '</td>' .
        '<td>' . $myrow['title'] . '</td>' .
        '<td>' . $myrow['dept_name'] . '</td>' .
        '</tr>';
}
echo '</tbody></table>';

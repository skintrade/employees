<?php
include('listingHeader.php');

while ($myrow = $result->fetch_array(MYSQLI_ASSOC))
{
        echo '<tr><td>' . $myrow['emp_no'] . '</td>' .
        '<td>' . $myrow['first_name'] . ' ' . $myrow['last_name'] . '</td>' .
        '<td>' . $myrow['title'] . '</td>' .
        '<td>' . $myrow['dept_name'] . '</td>' .
        '</tr>';
}
echo '</tbody></table>';

$result->close();
$conn->close();

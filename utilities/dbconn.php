<?php

// set these variables to match the DB in use for this test
$servername = "localhost";
$username = "DevTest";
$password = "DevTest";
$dbname = "employees";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn2 = new mysqli($servername, $username, $password, $dbname);
//$conn3 = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// Check connection
if ($conn2->connect_error) {
  die("Connection failed: " . $conn2->connect_error);
}
// Check connection
//if ($conn3->connect_error) {
// die("Connection failed: " . $conn3->connect_error);
//}

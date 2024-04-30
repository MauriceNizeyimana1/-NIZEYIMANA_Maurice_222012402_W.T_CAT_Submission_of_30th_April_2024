<?php
// Connection details
$host = "localhost";
$user = "Maurice";
$pass = "222012402";
$database = "labor_management";

// Creating connection
$connection = new mysqli($host, $user, $pass, $database);

// Check for connection errors
if ($connection->connect_errno) {
    die("Connection failed: " . $connection->connect_error);
}
?>

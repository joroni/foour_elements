<?php
require_once('../database_connection.php');
$conn = mysqli_connect($host, $user, $password, $db);

//include('../database_connection.php');
$output = array();
$query  = "SELECT * FROM $db.users";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $output[] = $row;
    }
    echo json_encode($output);
}
?> 
<?php
require_once('../database_connection.php');
$conn = mysqli_connect($host, $user, $password, $db);
$data    = json_decode(file_get_contents("php://input"));
if (count($data) > 0) {
    $id    = $data->id;
    $query = "UPDATE $db.users SET users.u_is_active = '0' WHERE users.id='$id'";

    if (mysqli_query($conn, $query)) {
        echo 'User Deactivated Successfully...';
    } else {
        echo 'Failed';
    }
}
?>
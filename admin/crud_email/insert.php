<?php
//$conn = mysqli_connect("localhost", "root", "", "test_quiz");
require_once('../database_connection.php');
$conn = mysqli_connect($host, $user, $password, $db);
//$sql_e = "SELECT * FROM groups WHERE email='$email'";
$info = json_decode(file_get_contents("php://input"));
if (count($info) > 0) {
    $group_name     = mysqli_real_escape_string($conn, $info->group_name);
    $is_active     = mysqli_real_escape_string($conn, $info->is_active);
   // $group_id     = mysqli_real_escape_string($conn, $info->group_id);
    if($is_active =='' || $is_active ==NULL){
        $is_active = 0;
    }
    $btn_name = $info->btnName;
    
    if ($btn_name == "Insert") {
        $query = "INSERT INTO $db.groups (group_name, is_active) VALUES ('$group_name', '$is_active')";
        if (mysqli_query($conn, $query)) {
            echo "Data Inserted Successfully...";
        } else {
            echo 'Failed';
        }
    }
    if ($btn_name == 'Update') {
        $group_id   = $info->group_id;
        $query = "UPDATE groups SET group_name = '$group_name', is_active = '$is_active' WHERE group_id = '$group_id'";
        if (mysqli_query($conn, $query)) {
            echo 'Data Updated Successfully...';
        } else {
            echo 'Failed';
        }
    }
}
?>
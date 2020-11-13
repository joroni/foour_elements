<?php
//$conn = mysqli_connect("localhost", "root", "", "test_quiz");
require_once('../database_connection.php');
$conn = mysqli_connect($host, $user, $password, $db);
//$sql_e = "SELECT * FROM users WHERE email='$email'";
$info = json_decode(file_get_contents("php://input"));
if (count($info) > 0) {
    $first_name     = mysqli_real_escape_string($conn, $info->first_name);
    $last_name     = mysqli_real_escape_string($conn, $info->last_name);
    $email     = mysqli_real_escape_string($conn, $info->email);
    $group_id    = mysqli_real_escape_string($conn, $info->group_id);
    $acl_id      = mysqli_real_escape_string($conn, $info->acl_id);
    $u_is_active      = mysqli_real_escape_string($conn, $info->u_is_active);
    if($u_is_active =='' || $u_is_active == null){
        $is_active = 0;
    }
    $btn_name = $info->btnName;
    
    

    if ($btn_name == "Insert") {
        $query = "INSERT INTO $db.users (first_name, last_name, email, group_id, acl_id, u_is_active) VALUES ('$first_name', '$last_name', '$email', '$group_id', '$acl_id', '$u_is_active')";
        if (mysqli_query($conn, $query)) {
            echo "Data Inserted Successfully...";
        } else {
            echo 'Failed';
        }
    }
    if ($btn_name == 'Update') {
        $id    = $info->id;
        $query = "UPDATE $db.users SET first_name = '$first_name', last_name = '$last_name', email = '$email', group_id = '$group_id', acl_id = '$acl_id',  u_is_active = '$u_is_active' WHERE users.id = '$id'";
        if (mysqli_query($conn, $query)) {
            echo 'Data Updated Successfully...';
        } else {
            echo 'Failed';
        }
    }
}



/**** */


//include '../processor/config.php';
/*
$data = json_decode(file_get_contents("php://input"));

// Username
$email = $data->email;
 
$resText = '';

if($uname != ''){
 // Check username
 $sel = mysqli_query($con,"select count(*) as allcount from users where email = '".$email."' ");
 $row = mysqli_fetch_array($sel);

 $resText = "Available";
 if($row['allcount'] > 0){
  $resText = 'Not available';
 }
}

echo $resText;
*/
?>


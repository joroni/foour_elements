<?php

require_once('../../frontend/processor/config.php');

$data = json_decode(file_get_contents("php://input"));

// Username
$email = $data->email;
    
$resText = '';

if($email != ''){
    // Check username
    $sel = mysqli_query($con,"SELECT count(*) AS allcount FROM users WHERE email = '".$email."' ");
    $row = mysqli_fetch_array($sel);

    $resText = "Available";
    if($row['allcount'] > 0){
        $resText = 'Not available';
    }
}

echo $resText;
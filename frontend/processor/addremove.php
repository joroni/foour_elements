<?php

include 'config.php';

$data = json_decode(file_get_contents("php://input"));

$request_type = $data->request_type;

/* // Get active question records
if($request_type == 1){

    $stmt = $con->prepare("SELECT * FROM questions WHERE is_active = 1");
    $stmt->execute();
    $result = $stmt->get_result();
    $data = array();
    if($result->num_rows > 0){
       while($row = $result->fetch_assoc()) {
            $data[] = array("question_id"=>$row['question_id'],"question"=>$row['question'],"type"=>$row['type'],"is_active"=>$row['is_active']); 
        }
    }
    
    $stmt->close();
    echo json_encode($data);
    exit;
}
 */
// Insert record
if($request_type == 2){
    $user_id = $data->user_id;
    $question_id = $data->question_id;
    $choice_id = $data->choice_id;
    $group_id = $data->group_id;
    $group_name = $data->group_name;
    
    // Check answer to the question id already exists
    $stmt = $con->prepare("SELECT * FROM answers WHERE user_id=? AND question_id=? AND group_id=? AND group_name=?");
    $stmt->bind_param('ssss',$user_id, $question_id, $group_id,  $group_name);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $return_arr = array();
    if($result->num_rows == 0){

        // Insert
        //INSERT INTO `answers` (`id`, `user_id`, `question_id`, `choice_id`, `group_id`, `time_answered`) VALUES (NULL, '12', '16', '1234', '1', current_timestamp());
        $insertSQL = "INSERT INTO answers (user_id, question_id, choice_id, group_id, group_name) VALUES (?, ?, ?,?,?)";
        $stmt = $con->prepare($insertSQL);
        $stmt->bind_param("sssss",$user_id,$question_id,$choice_id,$group_id,$group_name);
        $stmt->execute();

        $lastinsert_id = $stmt->insert_id;
        if($lastinsert_id > 0){
            $return_arr[] = array("id"=>$lastinsert_id,"user_id"=>$user_id,"question_id"=>$question_id,"choice_id"=>$choice_id,"group_id"=>$group_id,"group_name"=>$group_name);
        }
        $stmt->close();     
    }
    
    echo json_encode($return_arr);
    exit;
}

// Delete record
if($request_type == 3){
    $question_id = $data->question_id;

    // Check userid exists
    $stmt = $con->prepare("SELECT * FROM answers WHERE id=?");
    $stmt->bind_param('i',$id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    
    if($result->num_rows > 0){

        // Delete
        $deleteSQL = "DELETE FROM answers WHERE id=?";
        $stmt = $con->prepare($deleteSQL);
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->close();

        echo 1;
        exit;
    }else{
        echo 0;
    }

    exit;
}

// Get user answer record
if($request_type == 4){
    $user_id = $data->user_id;
    $stmt = $con->prepare("SELECT * FROM answers WHERE user_id = ? ORDER BY CAST(question_id AS unsigned)");
    $stmt->bind_param('i',$user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = array();
    if($result->num_rows > 0){
       while($row = $result->fetch_assoc()) {
            $data[] = array("id"=>$row['id'],"user_id"=>$row['user_id'],"question_id"=>$row['question_id'],"choice_id"=>$row['choice_id']); 
        }
    }
    
    $stmt->close();
    echo json_encode($data);
    exit;
}



// Get user record
if($request_type == 5){
    $email = $data->email;
    
   // $email = 'jraymund.niconi@gmail.com';
 
    $stmt = $con->prepare("SELECT * FROM $dbname.users WHERE email = ?");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = array();
    if($result->num_rows > 0){
       while($row = $result->fetch_assoc()) {
            $data[] = array("id"=>$row['id'],"first_name"=>$row['first_name'],"email"=>$row['email'], "group_id"=>$row['group_id']); 
        }
    }
    
    $stmt->close();
    echo json_encode($data);
    exit;
}

if($request_type == 6){

    $stmt = $con->prepare("SELECT * FROM $dbname.users");
    $stmt->execute();
    $result = $stmt->get_result();
    $data = array();
    if($result->num_rows > 0){
       while($row = $result->fetch_assoc()) {
            $data[] = array("id"=>$row['id'],"first_name"=>$row['first_name'],"last_name"=>$row['last_name'],"user_name"=>$row['user_name'],"email"=>$row['email'],"group_id"=>$row['group_id']); 
        }
    }
    
    $stmt->close();
    echo json_encode($data);
    exit;
}



// Delete record
if($request_type == 7){
    $user_id = $data->user_id;

    // Check userid exists
    $stmt = $con->prepare("SELECT * FROM answers WHERE user_id=?");
    $stmt->bind_param('i',$user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    
    if($result->num_rows > 0){

        // Delete
        $deleteSQL = "DELETE FROM answers WHERE user_id=?";
        $stmt = $con->prepare($deleteSQL);
        $stmt->bind_param('i',$user_id);
        $stmt->execute();
        $stmt->close();

        echo 1;
        exit;
    }else{
        echo 0;
    }

    exit;
}

// Insert record
if($request_type == 8){
    $user_id = $data->user_id;
    $user_earth = $data->user_earth;
    $user_water = $data->user_water;
    $user_air = $data->user_air;
    $user_fire = $data->user_fire;
    $group_id = $data->group_id;
    $group_name = $data->group_name;
    $user_element = $data->user_element;
 //   $seconds = $data->seconds;
    
    
    // Check answer to the question id already exists
    $stmt = $con->prepare("SELECT * FROM $dbname.user_scores WHERE user_id=?");
    $stmt->bind_param('s',$user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $return_arr = array();
    if($result->num_rows == 0){

        // Insert
        //INSERT INTO `answers` (`id`, `user_id`, `question_id`, `choice_id`, `group_id`, `time_answered`) VALUES (NULL, '12', '16', '1234', '1', current_timestamp());
        //$insertSQL = "INSERT INTO user_scores (user_id, user_earth, user_water, user_air, user_fire, group_id, seconds) VALUES (?,?,?,?,?,?,?)";
     $insertSQL = "INSERT INTO $dbname.user_scores (user_id, user_earth, user_water, user_air, user_fire, group_id, group_name, user_element) VALUES (?,?,?,?,?,?,?,?)";
        $stmt = $con->prepare($insertSQL);
        //$stmt->bind_param("ssssss",$user_id,$user_earth,$user_water,$user_air,$user_fire,$group_id, $seconds);
        $stmt->bind_param("ssssssss",$user_id,$user_earth,$user_water,$user_air,$user_fire,$group_id,$group_name, $user_element);
        $stmt->execute();

        $lastinsert_id = $stmt->insert_id;
        if($lastinsert_id > 0){
            //$return_arr[] = array("id"=>$lastinsert_id,"user_id"=>$user_id,"user_earth"=>$user_earth,"user_water"=>$user_water,"user_air"=>$user_air,"user_fire"=>$user_fire,"group_id"=>$group_id,"seconds"=>$seconds);
            $return_arr[] = array("id"=>$lastinsert_id,"user_id"=>$user_id,"user_earth"=>$user_earth,"user_water"=>$user_water,"user_air"=>$user_air,"user_fire"=>$user_fire,"group_id"=>$group_id, "group_name"=>$group_name, "user_element"=>$user_element);
            
        }
        $stmt->close();
     
    }
    
    echo json_encode($return_arr);
    exit;
}


if($request_type == 9){

    $stmt = $con->prepare("SELECT * FROM element_desciption WHERE element_name = ?");
    $stmt->bind_param('s',$element_name);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $return_arr = array();
    if($result->num_rows == 0){

       while($row = $result->fetch_assoc()) {
            $data[] = array("element_id"=>$row['element_id'],"element_name"=>$row['element_name'],"element_description"=>$row['element_description']); 
        }
    }
    
    $stmt->close();
    echo json_encode($data);
    exit;
}




// Check if user already taken the quiz
if($request_type == 10){
    $user_id = $data->user_id;
    
 //   $seconds = $data->seconds;
    
 $stmt = $con->prepare("SELECT * FROM $dbname.user_scores WHERE user_id=?");
 $stmt->bind_param('s',$user_id);
 $stmt->execute();
 $result = $stmt->get_result();
 $stmt->close();
 if($result->num_rows > 0){

    while($row = $result->fetch_assoc()) {
         $data[] = array("user_id"=>$row['user_id']); 
     }
 
      
    }



$stmt->close();
echo json_encode($data);
exit;
}


if($request_type == 11){

    $stmt = $con->prepare("SELECT * FROM $dbname.user_scores WHERE user_id=?");
    $stmt->bind_param('s',$user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $return_arr = array();
    if($result->num_rows == 0){

       while($row = $result->fetch_assoc()) {
            $data[] = array("user_earth"=>$row['user_earth'],"user_air"=>$row['user_air'],"user_water"=>$row['user_water'],"user_fire"=>$row['user_fire'], "user_element"=>$row['user_element']); 
        }
    }
    
    $stmt->close();
    echo json_encode($data);
    exit;
}

<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include '../../frontend/processor/config.php';
//include '../database_connection.php';
$data = json_decode(file_get_contents("php://input"));
$id = 0;
$request_type = $data->request_type;
// Get active question records
if($request_type == 0){

    $stmt = $con->prepare("SELECT * FROM test_quiz.questions WHERE is_active = 1");
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



if($request_type == 1){

    $stmt = $con->prepare("SELECT * FROM test_quiz.user_scores INNER JOIN test_quiz.users WHERE test_quiz.users.id = test_quiz.user_scores.user_id");
    $stmt->execute();
    $result = $stmt->get_result();
    $data = array();
    if($result->num_rows > 0){
       while($row = $result->fetch_assoc()) {
            $data[] = array("user_id"=>$row['user_id'], "user_earth"=>$row['user_earth'],"user_air"=>$row['user_air'],"user_water"=>$row['user_water'], "user_fire"=>$row['user_fire'],"group_id"=>$row['group_id'],"acl_id"=>$row['acl_id'],"first_name"=>$row['first_name'],
            "last_name"=>$row['last_name'],"user_element"=>$row['user_element'],"email"=>$row['email'],"created"=>$row['created']); 
        }
    }
    
    $stmt->close();
    echo json_encode($data);
    exit;
}


if($request_type == 2){
    $user_id = $data->id; 
     $stmt = $con->prepare("SELECT * FROM test_quiz.user_scores INNER JOIN test_quiz.users WHERE test_quiz.users.id = ? AND test_quiz.user_scores.user_id= ?"); 
   //$stmt = $con->prepare("SELECT * FROM user_scores WHERE user_id = ?");
    $stmt->bind_param('s',$user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = array();
    if($result->num_rows > 0){
       while($row = $result->fetch_assoc()) {
           /*  $data1[] = array("user_id"=>$row['user_id'],"user_earth"=>$row['user_earth'],"user_air"=>$row['user_air'],"user_water"=>$row['user_water'], "user_fire"=>$row['user_fire'],"group_id"=>$row['group_id'],"first_name"=>$row['first_name'],
            "last_name"=>$row['last_name'],"email"=>$row['email'],"created"=>$row['created']);  */
            $data[] = array("user_id"=>$row['user_id'],"user_earth"=>$row['user_earth'],"user_air"=>$row['user_air'],"user_water"=>$row['user_water'], "user_fire"=>$row['user_fire'],"group_id"=>$row['group_id'],"acl_id"=>$row['acl_id'],"user_element"=>$row['user_element']); 
        }
    }
    
    $stmt->close();
    echo json_encode($data);
    exit;
}


// Insert record
if($request_type == 3){
    $email = $data->email; 
    $first_name = $data->first_name;  
    $last_name = $data->last_name;   
    $group_id = $data->group_id;
    $acl_id = $data->acl_id;
    
    
    // Check answer to the email id already exists
    $stmt = $con->prepare("SELECT * FROM test_quiz.users WHERE email=?");
    $stmt->bind_param('s',$email);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $return_arr = array();
    if($result->num_rows == 0){
       // INSERT INTO users (id, user_name, user_password, email, first_name, last_name, group_id, date_joined, is_active, acl) VALUES (NULL, 'jay', '', 'jay@mail.com', 'jay', 'yo', '2', '2020-09-25 15:07:19', '1', '2');
        // Insert
        //INSERT INTO answers (id, user_id, question_id, choice_id, group_id, time_answered) VALUES (NULL, '12', '16', '1234', '1', current_timestamp());
        $insertSQL = "INSERT INTO test_quiz.users (email, first_name, last_name, group_id, group_name, acl_id, u_is_active) VALUES (?, ?, ?,?,?,?)";
        $stmt = $con->prepare($insertSQL);
        $stmt->bind_param("ssssss", $email,$first_name,$last_name,$group_id,$acl_id,$u_is_active);
        $stmt->execute();

        $lastinsert_id = $stmt->insert_id;
        if($lastinsert_id > 0){
            $return_arr[] = array("id"=>$lastinsert_id,"email"=>$email,"first_name"=>$first_name,"last_name"=>$last_name,"group_id"=>$group_id, "group_name"=>$group_name, "acl_id"=>$acl_id, "u_is_active"=>$u_is_active);
        }
        $stmt->close();
        /*$insertSQL = "INSERT INTO users(fname,lname,username ) values(?,?,?)";
        $stmt = $con->prepare($insertSQL);
        $stmt->bind_param("sss",$fname,$lname,$username);
        $stmt->execute();

        $lastinsert_id = $stmt->insert_id;
        if($lastinsert_id > 0){
            $return_arr[] = array("id"=>$lastinsert_id,"fname"=>$fname,"lname"=>$lname,"username"=>$username);
        }
        $stmt->close();*/
    }
    
    echo json_encode($return_arr);
    exit;
}

// Get users' record
if($request_type == 4){
    $stmt = $con->prepare("SELECT * FROM  test_quiz.users INNER JOIN  test_quiz.groups WHERE test_quiz.users.group_id = test_quiz.groups.group_id ORDER BY test_quiz.users.id DESC");
    $stmt->execute();
    $result = $stmt->get_result();
    $data = array();
    if($result->num_rows > 0){
       while($row = $result->fetch_assoc()) {
        $data[] = $row;
        }
    }
    
    $stmt->close();
    echo json_encode($data);
    exit;
}


$id = 0;
// Get user by id
if($request_type == 5){
    $id = $data->id;
    
    // $email = 'jraymund.niconi@gmail.com';
  
     $stmt = $con->prepare("SELECT * FROM test_quiz.users INNER JOIN test_quiz.groups WHERE users.group_id = groups.group_id AND id = ?");
     $stmt->bind_param("s",$id);
     $stmt->execute();
     $result = $stmt->get_result();
     $data = array();
     if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
             $data[] = array("id"=>$row['id'],"first_name"=>$row['first_name'],"last_name"=>$row['last_name'],"email"=>$row['email'], "group_id"=>$row['group_id'], "group_name"=>$row['group_name'], "acl_id"=>$row['acl_id'], "u_is_active"=>$row['u_is_active']); 
         }
     }
     $stmt->close();
     echo json_encode($data);
     exit;
 }
/* 
if ($btn_name == 'Update') {
    $id    = $info->id;
    $query = "UPDATE insert_emp_info SET name = '$name', email = '$email', age = '$age' WHERE id = '$id'";
    if (mysqli_query($conn, $query)) {
        echo 'Data Updated Successfully...';
    } else {
        echo 'Failed';
    }
} */

if($request_type == 6){
    $id = $data->id;

    // Check userid exists
    $stmt = $con->prepare("SELECT * FROM test_quiz.users WHERE id=?");
    $stmt->bind_param('i',$id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    
    if($result->num_rows > 0){

        // Update
        $updateSQL = "UPDATE test_quiz.users SET had_taken = 1 WHERE id = ?";
        $stmt = $con->prepare($updateSQL);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $stmt->close();

        echo 1;
        exit;
    }else{
        echo 0;
    }

    exit;
}




// Get groupings
if($request_type == 7){
   // $stmt = $con->prepare("SELECT * FROM test_quiz.groups WHERE is_active=1");
   $stmt = $con->prepare("SELECT * FROM test_quiz.groups");
    $stmt->execute();
    $result = $stmt->get_result();
    $data = array();
    if($result->num_rows > 0){
       while($row = $result->fetch_assoc()) {
        $data[] = $row;
        }
    }
    
    $stmt->close();
    echo json_encode($data);
    exit;
}

// Get active groupings
if($request_type == 16){
 $stmt = $con->prepare("SELECT * FROM test_quiz.groups WHERE is_active=1");
  //  $stmt = $con->prepare("SELECT * FROM test_quiz.groups");
     $stmt->execute();
     $result = $stmt->get_result();
     $data = array();
     if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
         $data[] = $row;
         }
     }
     
     $stmt->close();
     echo json_encode($data);
     exit;
 }
 

// Get acls
if($request_type == 8){
    $stmt = $con->prepare("SELECT * FROM test_quiz.user_acl");
    $stmt->execute();
    $result = $stmt->get_result();
    $data = array();
    if($result->num_rows > 0){
       while($row = $result->fetch_assoc()) {
        $data[] = $row;
        }
    }
    
    $stmt->close();
    echo json_encode($data);
    exit;
}





 
if($request_type == 9){





$message = '';

$form_data = json_decode(file_get_contents("php://input"));

$data = array(
':email'  => $form_data->email,
 ':first_name'  => $form_data->first_name,
 ':last_name'  => $form_data->last_name,
 ':group_id'  => $form_data->group_id,
 ':acl_id'  => $form_data->acl_id,
  ':u_is_active'  => $form_data->u_is_active,
 ':id'    => $form_data->id
);

$query = "
 UPDATE users 
 SET email= :email, first_name = :first_name, last_name = :last_name, group_id = :group_id, acl_id = :acl_id , u_is_active = :u_is_active  
 WHERE id = :id
";

$statement = $connect->prepare($query);
if($statement->execute($data))
{
 $message = 'Data Updated';
}

$output = array(
 'message' => $message
);

echo json_encode($output);


}




// Delete record
if($request_type == 10){
    $user_id = $data->user_id;

    // Check userid exists
    $stmt = $con->prepare("SELECT * FROM test_quiz.answers WHERE user_id=?");
    $stmt->bind_param('i',$user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    
    if($result->num_rows > 0){

        // Delete
        $deleteSQL = "DELETE FROM test_quiz.answers WHERE user_id=?";
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






// Delete record
if($request_type == 11){
    $user_id = $data->user_id;

    // Check userid exists
    $stmt = $con->prepare("SELECT * FROM test_quiz.user_scores WHERE user_id=?");
    $stmt->bind_param('i',$user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    
    if($result->num_rows > 0){

        // Delete
        $deleteSQL = "DELETE FROM test_quiz.user_scores WHERE user_id=?";
        $stmt = $con->prepare($deleteSQL);
        $stmt->bind_param('i',$user_id);
        $stmt->execute();
        $stmt->close();

        echo 1;
        $ok=1;

        // Delete record
        if($ok == 1){
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
                $a = 1;
               // exit;
               if($a == 1){
                $id = $data->user_id;
            
                // Check userid exists
                $stmt = $con->prepare("SELECT * FROM test_quiz.users WHERE id=?");
                $stmt->bind_param('i',$id);
                $stmt->execute();
                $result = $stmt->get_result();
                $stmt->close();
                
                if($result->num_rows > 0){
            
                    // Update
                    $updateSQL = "UPDATE test_quiz.users SET had_taken = 0 WHERE id = ?";
                    $stmt = $con->prepare($updateSQL);
                    $stmt->bind_param('i',$id);
                    $stmt->execute();
                    $stmt->close();
            
                    echo 1;
                    exit;
                }else{
                    echo 0;
                }
            
                exit;
            }
            
            }else{
                echo 0;
            }
        
            exit;
        }
        
    }else{
        echo 0;
    }

    exit;



    // Check userid exists
    $stmt->bind_param('i',$user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    
    if($result->num_rows > 0){

        // Delete
        $deleteSQL = "DELETE FROM test_quiz.answers WHERE user_id=?";
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


 



if($request_type == 13){
    $stmt = $con->prepare("SELECT * FROM groups
      LEFT JOIN user_scores
      ON user_scores.group_id = groups.group_id WHERE is_active=1");
     // $stmt = $con->prepare("SELECT * FROM test_quiz.user_scores INNER JOIN test_quiz.users WHERE test_quiz.users.id = test_quiz.user_scores.user_id");
      
    // $stmt = $con->prepare("select `group_id`,avg(`user_earth`),avg(`user_air`),avg(`user_water`), avg(`user_fire`) from user_scores group by group_id");
     $stmt->execute();
      $result = $stmt->get_result();
      $data = array();
      if($result->num_rows > 0){
         while($row = $result->fetch_assoc()) {
              $data[] = array("group_id"=>$row['group_id'], "user_earth"=>$row['user_earth'],"user_air"=>$row['user_air'],"user_water"=>$row['user_water'], "user_fire"=>$row['user_fire'],"group_name"=>$row['group_name']); 
          }
      }
      
      $stmt->close();
      echo json_encode($data);
      exit;
  }
 
  if($request_type == 14){
     //SELECT cast(ROUND(AVG(app_tests.test_resultPercent),2) as numeric(19,2))
     $stmt = $con->prepare("SELECT group_name, group_id, ROUND(AVG(user_earth),2) AS group_earth, ROUND(AVG(user_air),2) AS group_air, ROUND(AVG(user_water),2) AS group_water, round(avg(user_fire),2) AS group_fire from user_scores GROUP BY group_id, group_name");
     $stmt->execute();
     $result = $stmt->get_result();
     $data = array();
     if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
             $data[] = array("group_id"=>$row['group_id'],"group_name"=>$row['group_name'],"group_earth"=>$row['group_earth'],"group_air"=>$row['group_air'],"group_water"=>$row['group_water'],"group_fire"=>$row['group_fire']); 
         }
     }
     
     $stmt->close();
     echo json_encode($data);
     exit;
 }
 
 
 if($request_type == 15){
 
     $stmt = $con->prepare("SELECT * FROM `user_scores` INNER JOIN groups WHERE user_scores.group_id = groups.group_id");
     $stmt->execute();
     $result = $stmt->get_result();
     $data = array();
     if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
             $data[] = array("group_id"=>$row['group_id'],"group_name"=>$row['group_name']); 
         }
     }
     
     $stmt->close();
     echo json_encode($data);
     exit;
 }




// Get active groupings
if($request_type == 17){
    $stmt = $con->prepare("SELECT user_element, count(user_element) as nameCount, ROUND(count(user_element) / (SELECT count(user_element) FROM user_scores)*100,1) as percent FROM user_scores GROUP BY user_element");
     //  $stmt = $con->prepare("SELECT * FROM test_quiz.groups");
        $stmt->execute();
        $result = $stmt->get_result();
        $data = array();
        if($result->num_rows > 0){
           while($row = $result->fetch_assoc()) {
            $data[] = $row;
            }
        }
        
        $stmt->close();
        echo json_encode($data);
        exit;
    }



// Get admnin users' record
if($request_type == 18){
    $stmt = $con->prepare("SELECT * FROM  test_quiz.register  ORDER BY test_quiz.register.id DESC");
    $stmt->execute();
    $result = $stmt->get_result();
    $data = array();
    if($result->num_rows > 0){
       while($row = $result->fetch_assoc()) {
        $data[] = $row;
        }
    }
    
    $stmt->close();
    echo json_encode($data);
    exit;
}


    
 //}
?>
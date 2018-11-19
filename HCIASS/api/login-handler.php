<?php
    session_start();
    
   $data = file_get_contents('php://input');
   $data = json_decode($data);
    $email = $data->email;
    $pwd = $data->pwd;
    $type = $data->id;
    
    $link = mysqli_open();
    $query = "SELECT * FROM user WHERE email = '$email'";
    $result = $link->query($query);
    $user = array();

    if(($row = mysqli_fetch_assoc($result))){
        $user = $row;
    }

    mysqli_close($link);
    
    if($pwd == $user["password"] && $user["login_count"] > 0){
        $_SESSION["user"] = $user;
        echo json_encode(
                array(
                        "stat"=>"SUCCESS",
                        "user"=>$user
            ));
        return;
    }else if($pwd != $row["password"]){
        echo json_encode(
            array(
                    "stat"=>"FAIL",
                   
        ));
        return;
    }else if($row["login_count"] == 0){
        echo json_encode(
            array(
                    "stat"=>"NEWBEE",
                    
        ));
        return;

    }else{
        echo json_encode(
            array(
                    "stat"=>"UNKNOW",
                    
        ));
        return;
    }
?>
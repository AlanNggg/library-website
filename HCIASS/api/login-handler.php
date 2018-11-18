<?php
    session_start();
    include_once "../include/global.include.php";
    
    $user = $_POST["id"];
    echo $use;
    return;
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    $link = mysqli_open();
    $query = 'SELECT * FROM user WHERE email = "$email"';
    $result = $link->query($query);
    $user = array();

    if(($row = mysqli_fetch_assoc($result))){
        $user = $row;
    }

    mysqli_close($link);

    if(count($user) == 1  && $pwd == $row["password"] && $row["login_count"] > 0){
        //$_SESSION["user"] = $user;
        echo json_encode(
                array(
                        "status"=>"SUCCESS",
                        "user"=>$user
            ));
        return;
    }else if($pwd != $row["password"]){
        echo json_encode(
            array(
                    "status"=>"FAIL",
                   
        ));
    return;
    }else if($row["login_count"] > 0){
        echo json_encode(
            array(
                    "status"=>"NEWBEE",
                    
        ));
    return;

    }
?>
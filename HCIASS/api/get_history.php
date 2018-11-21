<?php

$data = file_get_contents('php://input');
   $data = json_decode($data);
    $email = $data->email;
    $pwd = $data->pwd;
    $type = $data->id;
    
    $link = mysqli_open();
    $query = "SELECT * FROM book ";
    $result = $link->query($query);
    $book = array();

    while(($row = mysqli_fetch_assoc($result))){
        $book[] = $row;
    }

    $magazine = array();
    $query = "SELECT * FROM magazine";
    $result = $link->query($query);
    while(($row = mysqli_fetch_assoc($result))){
        $magazine[] = $row;
    }
    $software = array();
    $query = "SELECT * FROM software";
    $result = $link->query($query);
    while(($row = mysqli_fetch_assoc($result))){
        $software[] = $row;
    }

    mysqli_close($link);

    echo json_encode(
            array(
                    "book"=>$book,
                   "magazine"=>$magazine,
                   "software" =>$software
        ));
    return;

?>
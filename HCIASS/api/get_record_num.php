<?php

$data = file_get_contents('php://input');
   $data = json_decode($data);
    $email = $data->email;
    $pwd = $data->pwd;
    $type = $data->id;
    
    $link = mysqli_open();
    $query = "SELECT * FROM lend_book,book WHERE email = '$email' AND lend_book.book_code = book.book_code";
    $result = $link->query($query);
    $record = array();

    while(($row = mysqli_fetch_assoc($result))){
        $record[] = $row;
    }

    $query = "SELECT * FROM lend_magazine,magazine WHERE email = '$email' AND lend_magazine.magazine_code = magazine.magazine_code";
    $result = $link->query($query);
    while(($row = mysqli_fetch_assoc($result))){
        $record[] = $row;
    }

    $query = "SELECT * FROM lend_software,software WHERE email = '$email' AND lend_software.software_code = software.software_code";
    $result = $link->query($query);
    while(($row = mysqli_fetch_assoc($result))){
        $record[] = $row;
    }

    mysqli_close($link);

    echo json_encode(
            array(
                    "total"=>count($record),
                   "recode"=>$record
        ));
    return;

?>
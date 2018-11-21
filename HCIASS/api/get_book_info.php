<?php

    $link = mysqli_open();
    $query = "SELECT * FROM book WHERE book_code = '1'";
    $result = $link->query($query);
    $book = array();

    while(($row = mysqli_fetch_assoc($result))){
        $book[] = $row;
    }


    mysqli_close($link);

    echo json_encode(
            array(
                    "book"=>$book,
                  
        ));
    return;

?>
<?php
    
    
    $data = file_get_contents('php://input');
    $data = json_decode($data);
    
    $attribute = $data->attribute;
    $keyword = $data->keyword;
    
    $link = mysqli_open();
    // $table = strtolower($attribute);

    $query = "SELECT * FROM $table WHERE name LIKE '%$keyword%'";
    $result2 = mysqli_query($link, $query);

       


    // $result = $link->query($query);
    
    $search = array();

    if (mysqli_num_rows($result2) > 0) {
        while ($row = mysqli_fetch_assoc($result2)) {
            $search[] = $row;
        }

        mysqli_close($link);

        echo json_encode(
            array(
                    "stat"=>"SUCCESS",
                    "search"=>$search
        ));
        return;
    } else {
        echo json_encode(
            array(
                    "stat"=>"FAIL",
                    "error" => mysqli_error($link),
                    "num" => mysqli_num_rows($result2),
                    "table" => $attribute
        ));
        return;
    }
?>
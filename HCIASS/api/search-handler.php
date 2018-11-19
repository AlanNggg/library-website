<?php
    
    $data = $_GET['search'];
    $data = json_decode($data);

    $table = $data->attribute;
    $keyword = $data->keyword;
    
    $link = mysqli_open();

    $query = "SELECT * FROM $table WHERE name LIKE '%$keyword%'";
    $result = $link->query($query);
    
    $search = array();

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
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
                    "num" => mysqli_num_rows($result),
                    "table" => $attribute,
                    "keyword" => $keyword
        ));
        return;
    }
?>

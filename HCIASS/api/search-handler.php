<?php
    
    $data = $_GET['search'];
    $data = json_decode($data);

    $table = $data->attribute;
    $keyword = $data->keyword;
    
    $link = mysqli_open();
    if ($table == "All" && is_null($keyword)) {
        $query = array();
        $query[] = "SELECT * FROM book";
        $query[] = "SELECT * FROM magazine";
        $query[] = "SELECT * FROM software";

        $result = array();

        foreach ($query as $sql) {
            $result[] = $link->query($sql);
        }
        
        
        $search = array();
    } else if ($table == "All") {
        $query = array();
        $query[] = "SELECT * FROM book WHERE name LIKE '%$keyword%'";
        $query[] = "SELECT * FROM magazine WHERE name LIKE '%$keyword%'";
        $query[] = "SELECT * FROM software WHERE name LIKE '%$keyword%'";

        $result = array();

        foreach ($query as $sql) {
            $result[] = $link->query($sql);
        }

    } else if (is_null($keyword)) {

        $query = "SELECT * FROM $table";
    
        $result = $link->query($query);
        
        $search = array();

    } else {
        $query = "SELECT * FROM $table WHERE name LIKE '%$keyword%'";
    
        $result = $link->query($query);
        
        $search = array();

    }

    if (is_array($result)) {
        foreach ($result as $ans) {
            while ($row = mysqli_fetch_assoc($ans)) {
                $search[] = $row;
            }
        }

        mysqli_close($link);

        if (sizeof($search) > 0) {
            echo json_encode(
                array(
                        "stat"=>"SUCCESS",
                        "search"=>$search
            ));
            return;
        } else {
            echo json_encode(
                array(
                        "stat"=>"FAILED",
                        "num" => mysqli_num_rows($result),
                        "table" => $table,
                        "keyword" => $keyword,
                        "query" => $query
            ));
            return;
        }

    } else if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $search[] = $row;
        }

        mysqli_close($link);

        echo json_encode(
            array(
                    "stat"=>"SUCCESS",
                    "search"=>$search,
                    "table" => $table
        ));
        return;
    } else {
        echo json_encode(
            array(
                    "stat"=>"FAILED",
                    "num" => mysqli_num_rows($result),
                    "table" => $table,
                    "keyword" => $keyword,
                    "query" => $query
        ));
        return;
    }
?>

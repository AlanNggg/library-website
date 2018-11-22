<?php
    
    $data = $_GET['search'];
    $data = json_decode($data);
    
    $table = $data->attribute;
    $keyword = $data->keyword;
    
    $link = mysqli_open();

    // All Data from all tables
    if ($table == "All" && empty($keyword)) {
        $query = array();
        $query[] = "SELECT * FROM book";
        $query[] = "SELECT * FROM magazine";
        $query[] = "SELECT * FROM software";

        $result = array();

        foreach ($query as $sql) {
            $result[] = $link->query($sql);
        }
      

        $search = array();
    
    // All Data from all tables which match the keyword
    } else if ($table == "All") {
        $query = array();
        $query[] = "SELECT * FROM book WHERE name LIKE '%$keyword%' OR author LIKE '%$keyword%' OR description LIKE '%$keyword%'";
        $query[] = "SELECT * FROM magazine WHERE name LIKE '%$keyword%' OR company LIKE '%$keyword%' OR description LIKE '%$keyword%'";
        $query[] = "SELECT * FROM software WHERE name LIKE '%$keyword%' OR company LIKE '%$keyword%' OR description LIKE '%$keyword%'";

        $result = array();

        foreach ($query as $sql) {
            $result[] = $link->query($sql);
        }

        $search = array();

    // All Data from a table
    } else if (empty($keyword)) {

        $query = "SELECT * FROM $table";
    
        $result = $link->query($query);
        
        $search = array();

    // All Data from a table which match the keyword
    } else {
        if ($table == "Book") {
            $query = "SELECT * FROM $table WHERE name LIKE '%$keyword%' OR author LIKE '%$keyword%' OR description LIKE '%$keyword%'";
        } else {
            $query = "SELECT * FROM $table WHERE name LIKE '%$keyword%' OR company LIKE '%$keyword%' OR description LIKE '%$keyword%'";
        }

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
        } else {
            echo json_encode(
                array(
                        "stat"=>"FAILED",
            ));
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
        ));
    } else {
        echo json_encode(
            array(
                    "stat"=>"FAILED",
        ));
    }
?>

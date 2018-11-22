<?php
    
    $data = file_get_contents('php://input');
    $data = json_decode($data);

    $code = $data->code;
    $table = $data->category;
    $email = $data->email;
    $availability = $data->availability;
    $link = mysqli_open();

    if ($availability == "true") {

        $query = array();

        if ($table == "BOOK") {
            $query[] = "INSERT INTO lend_book VALUES ('$email', '$code', null, null, 0)";
            $query[] = "UPDATE book SET availability = 'false' WHERE code = '$code'";
        } else if ($table == "MAGAZINE") {
            $query[] = "INSERT INTO lend_magazine VALUES ('$email', '$code', null, null, 0)";
            $query[] = "UPDATE magazine SET availability = 'false' WHERE code = '$code'";
        } else {
            $query[] = "INSERT INTO lend_software VALUES ('$email', '$code', null, null, 0)";
            $query[] = "UPDATE software SET availability = 'false' WHERE code = '$code'";
        }

        $result = array();

        foreach ($query as $sql) {
            $result[] = $link->query($sql);
        }

        mysqli_close($link);

        echo json_encode(
            array(
                    "stat"=>"SUCCESS",
                    "query" =>$query
        ));
    } else {

        mysqli_close($link);

        echo json_encode(
            array(
                    "stat"=>"FAILED"
        ));
    }
?>
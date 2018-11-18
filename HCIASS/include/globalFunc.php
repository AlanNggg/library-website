<?php
    function isEmpty($var){
        return is_null($val) || empty($var) ? true : false;
    }

    function mysqli_open()
    {
        global $DATABASE;
        $con = mysqli_connect($DATABASE["HOST"] , $DATABASE["USERNAME"] , $DATABASE["PASSWORD"] , $DATABASE["DBNAME"],3306);
        return $con;
    }
?>
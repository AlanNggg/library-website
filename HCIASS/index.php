<?php
    session_start();

    if(isset($_GET["logout"])){
        $_SESSION["user"] = null;
    }

    if(!isset($_SESSION["user"])){
        include "login.html";
        return;
    }

    
    $user = $_SESSION["user"]; 
    include 'header.php';

    //check url have a recordList param and go to common/record.php
    if(isset($_GET["recordList"])){
        include 'common/record.php';
        return;
    }
    //check url have a payment param and go to common/payment/record.php
    if(isset($_GET["payment"])){
        include 'common/payment.html';
        return;
    }


    if($user["role"]=='student' || $user["role"]== 'alumni'){
        include 'search.php';
        return;
    }



?>

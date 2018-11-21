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
        include 'common/payment.php';
        return;
    }

    if(isset($_GET["history"])){
        include 'common/history.php';
        return;
    }

    if(isset($_GET["userInfo"])){
        include 'common/userInfo.php';
        return;
    }

    if(isset($_GET["friendInfo"])){
       
        include 'common/friendInfo.html';
        return;
    }


    if($user["role"]=='student' || $user["role"]== 'alumni'){
        include 'search.php';
        return;
    }



?>

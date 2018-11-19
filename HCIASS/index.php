<?php
    session_start();

    if(!isset($_SESSION["user"])){
        include "login.html";
        return;
    }

    
    $user = $_SESSION["user"]; 
    include 'header.php';

    if($user["role"]=='student' || $user["role"]== 'alumni'){
        include 'search.php';
    }

?>

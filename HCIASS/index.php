<?php
    session_start();

    if(!isset($_SESSION["user"])){
        include "login.html";
        return;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
</head> 

</html>
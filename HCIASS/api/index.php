<?php
/*

when some page use api file will come to this page first*

*/

header('Content-Type: application/json; charset=uft-8');
include_once "../include/global.include.php";

$action = isset($_GET["action"]) ? $_GET["action"] : "";

if($action)
    include $action . ".php";


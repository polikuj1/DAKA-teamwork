<?php 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
session_start();
require_once("connectDaka.php");

if (isset($_SESSION["mem_id"])) {
    unset($_SESSION["mem_id"]);
    unset($_SESSION["mname"]);
  
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "not_logged_in"));
}
?>
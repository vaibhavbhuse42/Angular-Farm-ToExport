<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$servername = "localhost";
$username = "root";
$password = "pass123";  // your MySQL password
$dbname = "farm_to_export";

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
    die(json_encode(['status'=>'error','message'=>$conn->connect_error]));
}
?>

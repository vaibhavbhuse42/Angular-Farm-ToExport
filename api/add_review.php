<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include 'db.php';
$data = json_decode(file_get_contents("php://input"), true);
$stmt = $conn->prepare("INSERT INTO reviews(user_id,product_id,rating,comment) VALUES(?,?,?,?)");
$stmt->bind_param("iiis",$data['user_id'],$data['product_id'],$data['rating'],$data['comment']);
if($stmt->execute()) echo json_encode(['status'=>'success','message'=>'Review added']);
else echo json_encode(['status'=>'error','message'=>$stmt->error]);
?>

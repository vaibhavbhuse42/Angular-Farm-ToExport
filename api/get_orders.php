<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include 'db.php';
$user_id = $_GET['user_id'];
$stmt = $conn->prepare("SELECT * FROM orders WHERE user_id=? ORDER BY created_at DESC");
$stmt->bind_param("i",$user_id);
$stmt->execute();
$result = $stmt->get_result();
$orders=[];
while($row=$result->fetch_assoc()) $orders[]=$row;
echo json_encode(['status'=>'success','orders'=>$orders]);
?>

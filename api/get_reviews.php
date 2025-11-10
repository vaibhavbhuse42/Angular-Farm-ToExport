<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include 'db.php';
$product_id = $_GET['product_id'];
$stmt = $conn->prepare("SELECT r.*, u.name as user_name FROM reviews r LEFT JOIN users u ON r.user_id=u.id WHERE r.product_id=?");
$stmt->bind_param("i",$product_id);
$stmt->execute();
$result = $stmt->get_result();
$reviews = [];
while($row = $result->fetch_assoc()) $reviews[] = $row;
echo json_encode(['status'=>'success','reviews'=>$reviews]);
?>

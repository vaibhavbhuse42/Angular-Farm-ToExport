<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include 'db.php';
$id = $_GET['id'];
$stmt = $conn->prepare("SELECT p.*, s.name as subcategory_name FROM products p LEFT JOIN subcategories s ON p.subcategory_id=s.id WHERE p.id=?");
$stmt->bind_param("i",$id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();
echo json_encode(['status'=>'success','product'=>$product]);
?>

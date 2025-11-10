<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include 'db.php';
$data = json_decode(file_get_contents("php://input"), true);
$name = $data['name'];
$email = $data['email'];
$password = password_hash($data['password'], PASSWORD_DEFAULT);
$role = $data['role'] ?? 'exporter';
$stmt = $conn->prepare("INSERT INTO users(name,email,password,role) VALUES(?,?,?,?)");
$stmt->bind_param("ssss",$name,$email,$password,$role);
if($stmt->execute()){ echo json_encode(['status'=>'success','message'=>'User registered']); }
else{ echo json_encode(['status'=>'error','message'=>$stmt->error]); }
?>

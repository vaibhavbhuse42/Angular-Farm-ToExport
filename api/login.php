<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include 'db.php';
$data = json_decode(file_get_contents("php://input"), true);
$email = $data['email'];
$password = $data['password'];
$stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
$stmt->bind_param("s",$email);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows>0){
    $user = $result->fetch_assoc();
    if(password_verify($password,$user['password'])){
        echo json_encode(['status'=>'success','user'=>$user]);
    } else {
        echo json_encode(['status'=>'error','message'=>'Invalid password']);
    }
}else{
    echo json_encode(['status'=>'error','message'=>'User not found']);
}
?>


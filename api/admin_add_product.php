<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include 'db.php';
$data = $_POST;
$name = $data['name'];
$subcategory_id = $data['subcategory_id'];
$price = $data['price'];
$stock = $data['stock'];
$description = $data['description'];

$image = '';
if(isset($_FILES['image'])){
    $target = '../angularjs-app/images/'.basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);
    $image = $_FILES['image']['name'];
}

$stmt = $conn->prepare("INSERT INTO products(subcategory_id,name,description,price,stock,image) VALUES(?,?,?,?,?,?)");
$stmt->bind_param("issdis",$subcategory_id,$name,$description,$price,$stock,$image);
if($stmt->execute()) echo json_encode(['status'=>'success','message'=>'Product added']);
else echo json_encode(['status'=>'error','message'=>$stmt->error]);
?>


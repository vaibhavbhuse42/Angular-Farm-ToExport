<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include 'db.php';
$data = json_decode(file_get_contents("php://input"), true);

$user_id = $data['user_id'];
$cart = $data['cart']; // array of {product_id, quantity, price}
$total = 0;
foreach($cart as $c){ $total += $c['price']*$c['quantity']; }

// Insert order
$stmt = $conn->prepare("INSERT INTO orders(user_id,total) VALUES(?,?)");
$stmt->bind_param("id",$user_id,$total);
$stmt->execute();
$order_id = $stmt->insert_id;

// Insert order details
foreach($cart as $c){
    $stmt = $conn->prepare("INSERT INTO order_details(order_id,product_id,quantity,price) VALUES(?,?,?,?)");
    $stmt->bind_param("iiid",$order_id,$c['product_id'],$c['quantity'],$c['price']);
    $stmt->execute();

    // Update product stock
    $conn->query("UPDATE products SET stock = stock - ".$c['quantity']." WHERE id=".$c['product_id']);
}

echo json_encode(['status'=>'success','message'=>'Order placed successfully']);
?>

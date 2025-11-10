\<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include 'db.php';

$input = json_decode(file_get_contents("php://input"), true);
$where = [];

if(isset($input['category_id'])) $where[] = "p.subcategory_id IN (SELECT id FROM subcategories WHERE category_id=".$input['category_id'].")";
if(isset($input['price_min'])) $where[] = "p.price >= ".$input['price_min'];
if(isset($input['price_max'])) $where[] = "p.price <= ".$input['price_max'];

$sql = "SELECT p.*, s.name as subcategory_name FROM products p JOIN subcategories s ON p.subcategory_id=s.id";
if(count($where) > 0) $sql .= " WHERE ".implode(" AND ", $where);

$result = $conn->query($sql);
$products = [];
while($row = $result->fetch_assoc()) $products[] = $row;

echo json_encode(['status'=>'success','products'=>$products]);
?>

<?php

require_once __DIR__ . "/../config/connect.php";
require_once __DIR__ . "/../model/product.php";

header("Content-Type: application/json; charset=UTF-8");

global $conn;

$sql = "SELECT * FROM product";
$stmt = $conn->query($sql);

$products = [];

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

    // Tạo một object Product
    $product = new Product(
        $row["id"],
        $row["name"],
        $row["price"]
    );

    // Chuyển object Product thành dữ liệu JSON
    $products[] = [
        "id" => $product->getId(),
        "name" => $product->getName(),
        "price" => $product->getPrice()
    ];
}

echo json_encode([
    "success" => true,
    "data" => $products
]);

?>
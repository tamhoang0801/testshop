<?php
require_once __DIR__ . "/../config/connect.php";
require_once __DIR__ . "/../model/product.php";
function getProduct(){
    global $conn;

    $sql = "SELECT * FROM product";
    $stmt = $conn->query($sql);

    $pro = [];
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $pro[] = new product(
            $row["id"], $row["name"], $row["price"]
        );
        
    }
    return $pro;
}
?>
<?php
require_once __DIR__ . "/../model/Cart.php";
if(session_status()=== PHP_SESSION_NONE){
    session_start();
}
if(!isset($_SESSION["cart"])){
    $_SESSION["cart"] = new Cart;
}
$cart = $_SESSION["cart"]; 
if($_SERVER["REQUEST_METHOD"]=== "POST"){
    $id = $_POST["id"] ?? "";
    $name = $_POST["name"] ?? "";
    $price = $_POST["price"] ?? 0.0;
    if($_POST["id"] !== null && $_POST["name"] !== null){
        $_SESSION["cart"]->add($id, $name, $price, 1);
        $_SESSION["cart"]= $cart;
    }
    header("location: cart.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/index.css">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <td>ID</td>
                <td>NAME</td>
                <td>PRICE</td>
                <td>QUANTITY</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($cart->getItem() as $item):?>
            <tr>
                <td> <?= $item->getId() ?> </td>
                <td> <?= $item->getName() ?> </td>
                <td> <?= $item->getPrice() ?> </td>
                <td> <?= $item->getQuantity() ?></td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    <div>Total:<?= $cart->total()?></div>
    <form action="/model/order.php" method="POST">
        <button type="submit">confirm</button>
    </form>
    <a href="/index.php">continue cart</a>
</body>
</html>
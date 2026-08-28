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
    <link rel="stylesheet" href="/style/cart.css">
    <title>Document</title>
</head>
<body>
    <main>
        <div class="narbav">
            <div class="click_Cart" onclick="location.href='/index.php'"> < Back cart</div>
        </div>
        <div class="content">
            <div class="header">
                My cart
            </div>
            <table class="cart_Table">
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
            <div class="footer">
                <div>Total:<?= $cart->total()?></div>
                <form action="/model/order.php" method="POST">
                    <button type="submit" class="submit">Order</button>
                </form>
            </div>
        </div>
    </main>
    
    
</body>
</html>
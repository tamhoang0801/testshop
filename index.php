<?php
require_once __DIR__ . "/reponsitory/database.php";
session_start();
$product = getProduct();

if(!isset($_SESSION["user"])){
    header("location: /form.html/login.html");
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
    <header>
        <h2>
            Welcome to my shop
        </h2>
    </header>
    <main>
        <table>
            <thread>
                <tr>
                    <td>Id</td>
                    <td>Name</td>
                    <td>Price</td>
                    <td>Action</td>
                </tr>
            </thread>
            <tbody>
                <?php foreach($product as $prod): ?>
                <tr>
                    <td><?=$prod->getId()?></td>
                    <td><?=$prod->getName()?></td>
                    <td><?=$prod->getPrice()?> USD </td>
                    <td>
                        <form action="/reponsitory/cart.php" method="post">
                            <input type="hidden" name="id" value="<?=$prod->getId()?>">
                            <input type="hidden" name="name" value="<?=$prod->getName()?>">
                            <input type="hidden" name="price" value="<?=$prod->getPrice()?>">
                            <button type="submit" class="buy_Button">Buy</button>
                        </form>
                    </td>

                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="title_Images">Ảnh gia đình năm 2025</div>
        <img src="/images/z7905259190672_4cfe164cc589a9e036bb9f53a224be62.jpg" alt="" style= "width: 500px;">
    </main>
</body>
</html>
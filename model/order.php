<?php

require_once __DIR__ . "/../config/connect.php";
require_once __DIR__ . "/Cart.php";
require_once __DIR__ . "/CartItem.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Kiểm tra đăng nhập
if (!isset($_SESSION["user"])) {
    header("Location: /form.html/login.html");
    exit;
}

// Kiểm tra giỏ hàng
if (!isset($_SESSION["cart"])) {
    die("Giỏ hàng không tồn tại.");
}

$cart = $_SESSION["cart"];

if (empty($cart->getItem())) {
    die("Giỏ hàng đang trống.");
}

$userId = $_SESSION["user"];

try {

    $conn->beginTransaction();

    // Thêm đơn hàng
    $sql = "INSERT INTO orders(userId, orderDate)
            VALUES(:userId, NOW())";

    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ":userId" => $userId
    ]);

    // Lấy id đơn hàng vừa tạo
    $orderId = $conn->lastInsertId();

    // Thêm chi tiết đơn hàng
    $sql = "INSERT INTO orderdetails(orderId, productId, quantity, total)
            VALUES(:orderId, :productId, :quantity, :total)";

    $stmt = $conn->prepare($sql);

    foreach ($cart->getItem() as $item) {

        $total = $item->getPrice() * $item->getQuantity();

        $stmt->execute([
            ":orderId"   => $orderId,
            ":productId" => $item->getId(),
            ":quantity"  => $item->getQuantity(),
            ":total"     => $total
        ]);
    }

    $conn->commit();

    // Xóa giỏ hàng sau khi đặt thành công
    unset($_SESSION["cart"]);

    header("Location: /index.php");
    exit;

} catch (PDOException $e) {

    $conn->rollBack();
    echo "Lỗi: " . $e->getMessage();
}
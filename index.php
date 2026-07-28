<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: /form.html/login.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>My Shop</title>
</head>
<body>
    <header>
        <div class="navbar">
            <div class="navbar_item">Home</div>
            <div class="navbar_item">Intro</div>
            <div class="navbar_item">Order</div>
            <div class="navbar_item">Contact</div>
        </div>
        <h2> Welcome to my shop</h2>
        <div class="navbar_Search">
            <i class="fa-solid fa-magnifying-glass"></i>
        </div>
    </header>
    <main>

        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="content">
            </tbody>
        </table>
    </main>
    <script>
        // API lấy danh sách nhiều sản phẩm
        const apiDatabase = "/reponsitory/database.php";
        // Lấy tbody
        const content = document.querySelector(".content");
        fetch(apiDatabase)
            .then(res => {
                if (!res.ok) {
                    throw new Error(
                        "HTTP Error: " + res.status
                    );
                }
                return res.json();
            })
            .then(dataBase => {
                console.log("Dữ liệu API:", dataBase);
                // data là một mảng sản phẩm
                content.innerHTML = dataBase.data.map(product => {
                    return `
                        <tr>
                            <td>${product.id}</td>
                            <td>${product.name}</td>
                            <td>${product.price} USD</td>
                            <td>
                                <form action="/reponsitory/cart.php" method="POST" >
                                    <input type="hidden" name="id" value="${product.id}">
                                    <input type="hidden" name="name" value="${product.name}">
                                    <input type="hidden" name="price" value="${product.price}">
                                    <button type="submit" class="buy_Button"> Add to cart</button>
                                </form>
                            </td>
                        </tr>
                    `;
                }).join("");
            })
            .catch(error => {
                console.error(
                    "Lỗi gọi API:",
                    error
                );
                content.innerHTML = `
                    <tr>
                        <td colspan="4">
                            Không thể tải danh sách sản phẩm
                        </td>
                    </tr>
                `;
            });
    </script>
</body>
</html>
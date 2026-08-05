
function renderCart() {
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

}

function renderIntro() {
    const homeItem = document.querySelectorAll(".home_Item");
    let index = 0; 
    setInterval(() => {
        
        homeItem[index].classList.remove("active");
        index = (index + 1 ) % homeItem.length;
        homeItem[index].classList.add("active");
    }, 3000); // Thay đổi thời gian chuyển đổi (ms)

}
function start() {
    renderIntro();
    renderCart();
}
start();
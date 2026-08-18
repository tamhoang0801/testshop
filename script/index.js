
function renderCart() {
    const apiDatabase = "/reponsitory/database.php";
// Lấy tbody
    const content = document.querySelector(".cart_Table");
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
                        <div class="cart_Item">
                
                            
                            <img src="${product.images}" alt="">
                            <div class="name_Product">Name: ${product.name}</div>
                            <div class="price_Product">Price: ${product.price} USD</div>
                            <div>
                                <form action="/reponsitory/cart.php" method="POST" >
                                    <input type="hidden" name="id" value="${product.id}" >
                                    <input type="hidden" name="name" value="${product.name}">
                                    <input type="hidden" name="price" value="${product.price}">
                                    <button type="submit" class="buy_Button"> Add to cart</button>
                                </form>
                            </div>
                        </div>
                    
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
                    <div colspan="4">
                        Không thể tải danh sách sản phẩm
                    </div>
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
function viewCreen() {
    const navbarItem = document.querySelectorAll(".navbar_item");
    const mainItems = document.querySelectorAll(".main_Item");
    navbarItem.forEach((item,index)=>{
        let mainItem = mainItems[index];
        item.addEventListener("click",()=>{
            const active = document.querySelector(".navbar_item.active");
            if(active) {
                active.classList.remove("active");
            }
            item.classList.add("active");

            mainItem.scrollIntoView({
                block: "start",
                behavior: 'smooth',
                top: -100

            });
        })

    })
}
function add() {
    const intro = document.querySelector(".intro");

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                intro.classList.add("active");
            }
            else {
                intro.classList.remove("active")
            }
        });
    });

    observer.observe(intro);
}
function start() {
    renderIntro();
    renderCart();
    viewCreen(); 
    add();
}
start();
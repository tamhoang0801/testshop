
function renderCart() {
    const description = ["Lamborghini Aventador sở hữu thiết kế thể thao mạnh mẽ, sang trọng và đầy cá tính. Động cơ hiệu suất cao mang đến khả năng tăng tốc ấn tượng cùng trải nghiệm lái phấn khích. Nội thất hiện đại, cao cấp, phù hợp với những người yêu thích tốc độ, sự khác biệt và muốn thể hiện phong cách riêng.",
                        "Mercedes Benz nổi bật với thiết kế sang trọng, tinh tế và hiện đại. Động cơ mạnh mẽ mang đến khả năng vận hành ổn định, êm ái. Nội thất rộng rãi, tiện nghi cùng nhiều công nghệ tiên tiến tạo trải nghiệm thoải mái. Đây là lựa chọn phù hợp cho những người yêu thích sự đẳng cấp.",
                        "Pexels 1000 là mẫu mô tô thể thao với thiết kế mạnh mẽ, cá tính và năng động. Động cơ mạnh mẽ mang lại khả năng tăng tốc nhanh cùng cảm giác lái đầy phấn khích. Kiểu dáng khí động học nổi bật, phù hợp với những người yêu thích tốc độ và phong cách thể thao.",
                        "iPhone 17 Pro Max sở hữu thiết kế cao cấp, màn hình sắc nét và hiệu năng mạnh mẽ. Hệ thống camera chất lượng cao giúp chụp ảnh, quay video ấn tượng. Thiết bị mang đến trải nghiệm sử dụng mượt mà, hiện đại và tiện lợi, phù hợp với những người yêu thích công nghệ và thiết kế sang trọng."
                            ];
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
            content.innerHTML = dataBase.data.map((product,index) => {
                return `
                        <div class="cart_Item">
                
                            
                            <div class="images_Product">
                                <img src="${product.images}" alt="">
                            </div>
                            <div class="content_Product">
                                <div class="name_Product">Name: ${product.name}</div>
                                <div class="des_Product">Description:  ${description[index]}</div>
                                <div class="price_Product">Price: ${product.price} USD</div>
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
function introAction() {
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
function cartAction() {
    const cartItems = document.querySelectorAll(".cart_Item");

    console.log("Số cart_Item:", cartItems.length);

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            console.log(
                entry.target,
                entry.isIntersecting
            );

            if (entry.isIntersecting) {
                entry.target.classList.add("active");
            } else {
                entry.target.classList.remove("active");
            }
        });
    });

    cartItems.forEach(item => {
        observer.observe(item);
    });
}
function start() {
    renderIntro();
    renderCart();
    viewCreen(); 
    introAction();
    setTimeout(()=>{
        cartAction();
    },1000);
}
start();
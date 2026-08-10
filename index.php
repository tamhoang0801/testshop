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
            <div class="navbar_item active">Home</div>
            <div class="navbar_item">Intro</div>
            <div class="navbar_item">Order</div>
            <div class="navbar_item">Contact</div>
        </div>
        <div class="navbar_Search">
            <i class="fa-solid fa-magnifying-glass"></i>
        </div>
    </header>
    <main>
        <div class="main_Item">
            <div class="home_Item active">
                <img src="images\5dd17243-cb36-4ea5-a698-8b399a4ff700.png" alt="">
                <div class="description">
                    <h3>Chất Lượng Cao</h3>
                    
                </div>
            </div>

            <div class="home_Item">
                <img src="images/a19b431b-bf5d-4756-b21a-3f84a2b3a50e.png" alt="">
                <div class="description">
                    <h3>Giao Hàng Nhanh</h3>
    
                </div>
            </div>

            <div class="home_Item">
                <img src="images/hỗ trợ khách hàng.png" alt="">
                <div class="description">
                    <h3>Hỗ Trợ 24/7</h3>
                </div>
            </div>

            <div class="home_Item">
                <img src="images/dae12927-541d-4840-9811-1fb895664b73.png" alt="">
                <div class="description">
                    <h3>Thanh Toán An Toàn</h3>
                </div>
            </div>
        </div>
        <div class="main_Item intro_Content">
            <h1>INTRODUCTION</h1>
            <section class="intro">

                ```
                <h2>Chúng Tôi Không Chỉ Bán Hàng – Chúng Tôi Bán Niềm Tin</h2>

                <p>
                    Trong thế giới mà từng phút giây đều tạo nên giá trị, một đơn hàng được giao đúng thời điểm không chỉ là sự hoàn thành nhiệm vụ mà còn là lời khẳng định về uy tín và trách nhiệm. Chúng tôi xây dựng hệ thống vận chuyển hiện đại với mục tiêu mang đến những giải pháp nhanh chóng, an toàn và chính xác cho mọi khách hàng. Mỗi kiện hàng đều được theo dõi xuyên suốt hành trình, kiểm soát nghiêm ngặt trong từng khâu để đảm bảo đến nơi nguyên vẹn và đúng hẹn.
                </p>

                <p>
                    Với đội ngũ chuyên nghiệp, quy trình vận hành tối ưu và dịch vụ hỗ trợ khách hàng 24/7, chúng tôi luôn sẵn sàng đồng hành cùng bạn trong mọi nhu cầu vận chuyển. Dù là cá nhân hay doanh nghiệp, chúng tôi tin rằng mỗi đơn hàng đều chứa đựng những giá trị quan trọng cần được bảo vệ và trao gửi đúng lúc. Lựa chọn chúng tôi không chỉ là lựa chọn một đơn vị giao nhận, mà còn là lựa chọn một đối tác đáng tin cậy luôn đặt chất lượng dịch vụ và sự hài lòng của khách hàng lên hàng đầu.
                </p>
                ```

            </section>


        </div>
        <div class="main_Item cart_Content">
            <div class="cart_Table"></div>
        </div>
        <div class="main_Item contact_Content">
            <h1>CONTACT</h1>
            <div class="contact_Items">
                <div class="contact_Item left_Content">
                    <div class="left_Content">Name:myshop.com</div>
                    <div class="left_Content">Phone:0884830342</div>
                    <div class="left_Content">Address:Ho Chi Minh city</div>
                </div>
                <div class="contact_Item right_Content">
                <form action="" method="get">
                    <input type="text" placeholder="email">
                    <input type="password" placeholder="password">
                    <input type="text" placeholder="message">
                    <button type="submit">Send</button>
                </form>
                </div>
            </div>
        </div>

        
    </main>
    <script src="/script/index.js"></script>
</body>
</html>
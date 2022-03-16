<?php

?>

<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>دریادلان | پنل مدیریت</title>
</head>
<style>
    body {
        font-family: rm;
    }

    @font-face {
        font-family: rm;
        src: url("http://localhost/DaryaDelan/styles/fonts/IRANSansWeb.woff2");
    }

    a {
        text-decoration: none;
        font-size: 20px;
        color: black;
        border: 3px solid green;
        padding: 10px;
    }

    a:hover {
        color: red;
        border: 3px solid red;
        border-radius: 100px;
        padding: 10px;
    }

    .content {
        float: left;
    }

    .item {
        float: left;
        border: 3px solid yellowgreen;
        padding-right: 10px;
        padding-left: 10px;
        height: 25%;
        padding-top: 20px;
    }

    img {
        max-width: 200px;
        max-height: 200px;
    }

    @media only screen and (max-width: 600px) {
        .item {
            float: none;
            display: block;
            width: 100%;
            box-sizing: border-box;
            overflow-y: hidden;
            overflow-x: hidden;
        }

        .content {
            width: 100%;
            height: 100%;
        }

        p {
            float: left;
            text-align: center;
        }
    }
</style>

<body>
    <div class="panel" style="display: none; text-align: center;">
        <h1>پنل ادمین</h1>
        <hr />
        <br />
        <div class="content" style="float: left;">
            <div class="item">
                <img src="./icon/UserManage.png" alt="User Manage" />
                <p><a href="#">مدیریت کاربران</a></p>
            </div>
            <div class="item">
                <img src="./icon/Message.png" alt="User Manage" />
                <p><a href="./SendMessage.php">ارسال پیام به صندوق کاربران</a></p>
            </div>
            <div class="item">
                <img src="./icon/ShopManage.png" alt="User Manage" />
                <p><a href="#">مدیریت فروشگاه</a></p>
            </div>
            <div class="item">
                <img src="./icon/CategoryManage.png" alt="User Manage" />
                <p><a href="./category.php?name=">دسته بندی ها</a></p>
            </div>
            <div class="item">
                <img src="./icon/ProductManage.png" alt="User Manage" />
                <p><a href="./products.php">مدیریت محصولات</a></p>
            </div>
            <div class="item">
                <img src="./icon/SellerManage.png" alt="User Manage" />
                <p><a href="#">مدیریت فروشندگان</a></p>
            </div>
            <div class="item">
                <img src="./icon/SellerManage.png" alt="User Manage" />
                <p><a href="#">مدیریت عمده فروشان</a></p>
            </div>
            <div class="item">
                <img src="./icon/SliderManage.png" alt="User Manage" />
                <p><a href="./slider.htm">مدیریت اسلایدرها</a></p>
            </div>
            <div class="item">
                <img src="./icon/OffPriceManage.png" alt="User Manage" />
                <p><a href="./slider.htm">مدیریت تخفیف ها</a></p>
            </div>
            <div class="item">
                <img src="./icon/LicenseManage.png" alt="User Manage" />
                <p><a href="./license.php">مدیریت مدارک ارسالی</a></p>
            </div>
            <div class="item">
                <img src="./icon/TicketManage.png" alt="User Manage" />
                <p><a href="#">مدیریت تیکت ها</a></p>
            </div>
            <div class="item">
                <img src="./icon/Exit.png" alt="User Manage" />
                <p><a href="#">خروج از پنل مدیریت</a></p>
            </div>
        </div>
    </div>
</body>
<script>
    var user_name = prompt("نام کاربری", localStorage.getItem("u"));
    var password = prompt("پسورد", localStorage.getItem("p"));

    var x = localStorage.setItem("u", user_name);
    var y = localStorage.setItem("p", password);
    var select = localStorage.getItem("select");

    if (user_name === "admin" && password === "admin") {
        var panel = document.getElementsByClassName("panel");
        for (var i = 0; i < panel.length; i++) {
            panel[i].style.display = "block";
        }
    }
</script>

</html>
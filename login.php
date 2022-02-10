<?php

?>

<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/bootstrap.min.css" />
    <link rel="stylesheet" href="./styles/login.css">
    <title>دریادلان | ورود به حساب</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-7">
                <img src="./photo/logo.png" alt="Logo" class="icon">
                <input type="text" class="searchInput" placeholder="دنبال چی می گردی؟">
                <button class="btn btn-success">جستجو</button>
            </div>
            <div class="col-sm-3">

            </div>
            <div class="col-sm-2" class="tag3">
                <a href="./Login.php">ورود / ثبت نام</a>
                <a href="#">سبد خرید</a>
            </div>
        </div>
    </div>
    <br>
    <div class="row content">
        <div class="col-md-10">
            <div class="content">
                <a href="#">محصولات</a>
                <a href="#">فروشند شوید</a>
                <a href="#">سوالی دارید؟</a>
                <a href="#">درباره ما</a>
                <a href="#">تماس با ما</a>
            </div>
        </div>
        <div class="col-md-2 content">
            <span>
                <img class="icon-location" src="http://localhost/DaryaDelan/photo/location.png" alt="Location">
            </span>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-12">
            <div class="content2" style="">
                <div class="login">
                    <h3><b>ورود به حساب کاربری</b></h3>
                    <br />
                    <form action="./login/login.php" method="POST">
                        <input type="text" class="searchInput" placeholder="نام کاربری" name="user_name">
                        <br />
                        <br />
                        <input type="password" class="searchInput" placeholder="گذرواژه" name="password">
                        <br />
                        <br />
                        <button class="btn btn-success">ورود</button>
                    </form>
                    <br />
                    <br />
                    <p>حساب کاربری ندارید؟</p>
                    <button class="btn btn-secondary"><a style="color: white;" href="./signup.php">ثبت نام</a></button>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="./script/bootstrap.min.js"></script>
<script>

</script>

</html>
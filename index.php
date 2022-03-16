<?php

require("./lib/jdf.php");
$today = jdate("Y/m/d H:i");
$tomorrow = jdate("Y/m/d H");
print $tomorrow;

?>

<html lang="en" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles/bootstrap.min.css" />
  <link rel="stylesheet" href="./styles/style.css">
  <title>دریادلان
  </title>
</head>

<body>
  <!-- Header Content -->
  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <div class="content-header">
          <img style="width: 40px; height: 40px;" src="./photo/login (2).png" />
          <a href="#" id="myBtn">ورود / ثبت نام</a>
          <img style="width: 40px; height: 40px;" src="./photo/location (2).png" />
          <a href="#" id="myLocation">موقعیت من</a>
          <img style="width: 40px; height: 40px;" src="./photo/shop_cart.png"/>
          <a href="#">سبد خرید</a>
        </div>
      </div>
      <div class="col-md-2">
        <img style="width: 40px; height: 40px;" src="./photo/date.png" />
        <a href="#"><?php print $today; ?></a>
      </div>
    </div>
  </div>
  <!-- Header Menu -->
  <div class="container-fluid header">
    <div class="header">
      <div class="row">
        <!-- Options  -->
        <div class="col-sm-7 searchDiv">
          <br/>
          <form method="POST" action="./search.php">
            <input class="searchInput" type="text" name="search" placeholder="دنبال چی می گردی؟"/>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Content Menu -->
  <div class="row">
    <div class="col-md-12">
      <div class="content">
        <img src="./photo/product_index_page.png" class="icon2" />
        <a href="#">محصولات
        </a>
        <img src="./photo/seller.png" class="icon2" />
        <a href="#">فروشند شوید
        </a>
        <img src="./photo/question.png" class="icon2" />
        <a href="#">سوالی دارید؟
        </a>
        <img src="./photo/aboutus.png" class="icon2" />
        <a href="#">درباره ما
        </a>
        <img src="./photo/call.png" class="icon2" />
        <a href="#">تماس با ما
        </a>
        <img src="./photo/shop_cart.png" class="icon2" />
        <a href="#">سبد خرید
        </a>
      </div>
    </div>
  </div>
  <br />
  <h3 class="tag2">
    <img class="icon" src="http://localhost/DaryaDelan/photo/CategoryIcon.jpg" alt="Category">
    <b class="tag">دسته بندی
    </b>
  </h3>
  <!-- Content (Offprice Slider)  -->
  <div class="row">
    <div class="col-sm-12">
      <div class="content2">
        <div style="text-align: center;">
          <div style="float: left;">
            <img class="slider-style" src="http://localhost/DaryaDelan/admin/Slider/img_1.png" alt="Slider_1" id="slider_img" />
            <br />
            <br />
            <img class="category-item" src="./photo/Category/img_1.png" />
            <img class="category-item" src="./photo/Category/img_2.png" />
            <img class="category-item" src="./photo/Category/img_3.png" />
            <img class="category-item" src="./photo/Category/img_4.png" />
            <br />
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <br />
  <br />
  <br />
  <!-- Offprice Tag -->
  <h3 class="tag2">
    <img class="icon" src="http://localhost/DaryaDelan/photo/offPrice.png" alt="Zone">
    <b class="tag">تخفیفات
    </b>
  </h3>
  <!-- Content (Offprice Slider)  -->
  <div class="row">
    <div class="col-sm-12">
      <div style="background-color: red">
        <div style="width: 700px;">
          <img class="category-item2" style="" src="http://localhost/DaryaDelan/admin/OffPrice/img_0.png" alt="OffPrice Banner" id="slider2" class="slider-style2">
        </div>
      </div>
    </div>
  </div>
  </div>
  <br />
  <div class="container">
    <div class="row">
      <div class="col-md-12">
      </div>
    </div>
  </div>
  <br />
  <!-- Region Tag -->
  <h3 class="tag2">
    <img class="icon" src="http://localhost/DaryaDelan/photo/State.png" alt="Zone">
    <b class="tag">استان شما</b>
  </h3>
  <!-- Content (Region/Zone Slider)  -->
  <div class="container">
    <div class="row">
      <div class="content2">

      </div>
    </div>
  </div>
  </div>
  <br />
  <!-- Brand Tag -->
  <h3 class="tag2">
    <img class="icon" src="http://localhost/DaryaDelan/photo/Brand.png" alt="Zone">
    <b class="tag">برندهای ما</b>
  </h3>
  <!-- Content (Region/Zone Slider)  -->
  <div class="container">
    <div class="row">
      <div class="content-6">
        <div style="float: left;">
          <img class="category-item" style="width: 400px; heigth: 100px;" src="./photo/Brand/img_2.jpg" class="slider-style-3" alt="Brand" id="brandSlider" />
          <img class="category-item" style="width: 400px; heigth: 100px;" src="./photo/Brand/img_1.jpg" class="slider-style-3" alt="Brand" id="brandSlider" />
          <img class="category-item" style="width: 400px; heigth: 100px;" src="./photo/Brand/img_0.jpg" class="slider-style-3" alt="Brand" id="brandSlider" />
        </div>
      </div>
    </div>
  </div>
  </div>
  <br />
  <!-- Login/SignUp Modal -->
  <div id="myModal" class="modal">
    <!-- Login Modal -->
    <div class="modal-content" id="modalContent">
      <form action="./login/Login.php" method="POST">
        <span class="close">&times;
        </span>
        <h1>ورود
        </h1>
        <hr />
        <br />
        <br />
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">
              <img src="./photo/user.jpg" class="icon2" alt="نام کاربری">
            </span>
          </div>
          <input name="user_name" type="text" class="form-control" placeholder="نام کاربری" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">
              <img src="./photo/password.png" class="icon2" alt="پسورد">
            </span>
          </div>
          <input name="password" type="password" class="form-control" placeholder="پسورد" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">
              <img src="./photo/role.png" class="icon2" alt="نقش">
            </span>
          </div>
          <fieldset>
            <select style="width: 100%;" class="form-select" name="userSelect" id="userSelect">
              <option value="none" selected>انتخاب نوع فعالیت</option>
              <option name="user" value="user">کاربر</option>
              <option name="pricer" value="pricer">فروشنده</option>
              <option name="wholesaler" value="wholesaler">عمده فروش</option>
            </select>
          </fieldset>
        </div>
        <br />
        <button class="btn btn-success" style="width: 50%;">ورود
        </button>
        <br />
        <hr>
        <button class="btn btn-danger" style="width: 50%;" onclick="openSignUpModal()">ثبت نام
        </button>
      </form>
    </div>
  </div>
  <footer>
    <p>تمامی حقوق برای شرکت دریادلان محفوظ است
    </p>
  </footer>
</body>
<script src="./script/bootstrap.min.js">
</script>
<script src="./script/index.js">
</script>
<script>
  var i = 0;
  setInterval(function() {
    let sliderPhoto = document.getElementById("slider_img");
    sliderPhoto.setAttribute("src", "http://localhost/DaryaDelan/admin/Slider/img_" + i + ".png");
    i = (i + 1) % 2;
  }, 2000);





  // var index = 0;
  // setInterval(function(){
  //   let sliderPhoto = document.getElementById("brandSlider");
  //   sliderPhoto.setAttribute("src", "./photo/Brand/img_" + index + ".jpg");
  //   index = (index + 1) % 3;
  // }, 2000)
</script>

</html>
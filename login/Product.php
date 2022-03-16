<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_name = $_GET["name"];
    $product_name = $_POST["name"];
    $proudct_price = $_POST["price"];
    $product_descroption = $_POST["descroption"];
    $product_category = $_POST["category"];

    if (file_exists(mkdir("./Product/$user_name/"))) {
        
    } else {
        mkdir("./Product/$user_name/");
    }

    $fileName_1 = basename($_FILES["image_1"]["name"]);
    $fileTemp_1 = $_FILES["image_1"]["tmp_name"];
    move_uploaded_file($fileTemp_1,"./Product/$user_name/".$fileName_1);

    $fileName_2 = basename($_FILES["image_2"]["name"]);
    $fileTemp_2 = $_FILES["image_2"]["tmp_name"];
    move_uploaded_file($fileTemp_2,"./Product/$user_name/".$fileName_2);

    $fileName_4 = basename($_FILES["image_4"]["name"]);
    $fileTemp_4 = $_FILES["image_4"]["tmp_name"];
    move_uploaded_file($fileTemp_4,"./Product/$user_name/".$fileName_4);

    $root1 = "Product/$user_name/$fileName_1";
    $root2 = "Product/$user_name/$fileName_2";
    $root4 = "Product/$user_name/$fileName_4";

    $con = mysqli_connect("localhost", "root", "", "daryadelan");
    $sql = "INSERT INTO product(name, user_name, price, desceroption, category, image_1, image_2, image_4) 
    VALUES('$product_name', '$user_name', '$proudct_price', '$product_descroption', '$product_category', '$root1', '$root2', '$root4')";
    $query = mysqli_query($con, $sql);

    if($query) {
        $state = "محصول شما با موفقیت ارسال شد و در حال بررسی آن هستیم.";
    }
    else {
        echo mysqli_error($con);

    }

    print "
    <script>
        
    </script>
    ";
}

$user_name = $_GET["name"];
function load_category()
{
    $con = mysqli_connect("localhost", "root", "", "daryadelan");
    $sql = "SELECT * FROM category";
    $query = mysqli_query($con, $sql);

    while ($row = mysqli_fetch_assoc($query)) {
        print "<option value='$row[category_name]'>$row[category_name]</option>";
    }
}
print "
<html dir='rtl'>
                <head>
                    <meta charset='UTF-8'/>
                    <title>دریادلان | حساب کاربری</title>
                    <link rel='stylesheet' href='http://localhost/DaryaDelan/styles/bootstrap.min.css'/>
                    <link rel='stylesheet' href='./style.css'/>
                    <link rel='stylesheet' href='http://localhost/DaryaDelan/Lib/XDialog/style.css'/>
                </head>
                <body>
                <div class='row' style='background-color: #cfd3d22e;'>
                <div class='col-md-12'>
                    <img style='width: 40px; height: 40px;' src='http://localhost/DaryaDelan/photo/IndexPage.png'/>
                    <a href='http://localhost/DaryaDelan/'>صفحه اصلی</a>
                    <img style='width: 40px; height: 40px;' src='http://localhost/DaryaDelan/photo/Eixt.png'/>
                    <a href=''>خروج</a>
                </div>
            </div>
            <div class='row content'>
                <div class='col-md-12'>
                    <div class='content'>
                        <a href='#'>محصولات</a>
                        <a href='#'>فروشند شوید</a>
                        <a href='#'>سوالی دارید؟</a>
                        <a href='#'>درباره ما</a>
                        <a href='#'>تماس با ما</a>
                    </div>
                </div>
            </div>
            <br/>
            <br/>
                    <div class='container content4'>
                        <div class='row'>
                            <div class='col-sm-4'>
                                <div class='user-info shadow p-3 mb-5 bg-white rounded' style='padding-top: 20px;'>
                                    <img class='user-profile shadow p-3 mb-5 bg-white rounded' src='http://localhost/DaryaDelan/photo/user.jpg' alt='User Profile'/>
                                    <h3>سلام، $user_name (عمده فروش)</h3>
                                    <br/>
                                    <ul>
                                        <li><a href='Message.php?q=wholeaser&name=$user_name'>وضعیت حساب</a></li>
                                        <li><a href='Product.php?q=pricer&name=$user_name'>ارسال محصول</a></li>
                                        <li><a href='#'>کیف پول</a></li>
                                        <li><a href='#'>شکایت</a></li>
                                        <li><a href='#'>خروج از حساب</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class='col-sm-8'>
                                <div class='user-info shadow p-3 mb-5 bg-white rounded'>
                                    <!-- Send Form -->
                                    <form method='POST' action='#' enctype='multipart/form-data'>
                                        <fieldset>
                                            <legend> <img class='icon2' src='http://localhost/DaryaDelan/photo/Panel/product.png'/> اطلاعات محصول</legend>
                                            <br/>
                                            <input type='name' placeholder='نام کالا' name='name'/>
                                            <br/>
                                            <input type='number' placeholder='قیمت کالا (تومان)' name='price'/>
                                            <br/>
                                            <input type='text' placeholder='دسته بندی' name='category'/>
                                            <br/>
                                            <br/>
                                            <b>تصاویر محصول (آپلود چهار تصویر الزامی است)</b>
                                            <br/>
                                            <input type='file' name='image_1' id='image_1' multiple >
                                            <br/>
                                            <input type='file' name='image_2' id='image_2' multiple >
                                            <br/>
                                            <input type='file' name='image_4' id='image_4' multiple >
                                            <br/>
                                            <p><legend>توضیحات محصول</legend></p>
                                            <div id='editor' name='descroption'></div>
                                            <br/>
                                            <p style='color: red; font-size: 20px;'>توجه داشته باشید محصولات ارسال شده توسط شما بعد از تایید مدیریت بر روی فروشگاه قرار می گیرد.</p>
                                            <button class='sendButton'>ارسال</button>

                                            <p style='color: green; font-size: 20px;'>$state</p>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- The Modal -->
                    <div id='myModal' class='modal'>
                           <!-- Modal content -->
                           <div class='modal-content' id='modalContent'>
                             <form action='./login/login.php' method='POST'>
                               <span class='close'>&times;
                               </span>
                               <h1>ورود
                               </h1>
                               <br />
                               <br />
                               <input type='text' class='searchInput2' placeholder='نام کاربری' name='user_name' />
                               <br />
                               <br />
                               <input type='password' class='searchInput2' placeholder='گذرواژه' name='password'/>
                               <br />
                               <br />
                               <button class='btn btn-success'>ورود
                               </button>
                               <br />
                               <br />
                               <button class='btn btn-danger' onclick='openSignUpModal()'>ثبت نام
                               </button>
                             </form>
                           </div>
                         </div>
                </body>
                <script src='http://localhost/DaryaDelan/script/bootstrap.min.js'></script>
                <script>
                    try {
                        var state = document.getElementsByTagName('h1');
                        
                        for(var i = 0; i < state.length; i++) {
                            state[i].style.display = 'none';
                        }

                        localStorage.setItem('user_name', '$user_name');
                        localStorage.setItem('password', '$password');

                        console.log(localStorage.getItem('user_name'));

                        var user_info = document.getElementById('user_info');
                        var info = '';
                        var httpRequest = new XMLHttpRequest();
                        httpRequest.onreadystatechange = function() {
                            if(httpRequest.readyState === 4 && httpRequest.status === 200) {
                                var data = JSON.parse(httpRequest.responseText);

                                for(var i = 0; i < data.length; i++) {
                                    info += '<p>نام کاربری: ' + data[i]['user_name'] + '</p>';
                                    info += '<p>گذرواژه: ' + data[i]['password'] + '</p>';
                                    info += '<p>شماره تلفن: ' + data[i]['phone'] + '</p>';
                                    info += '<p>آدرس محل سکونت: ' + data[i]['location'] + '</p>';
                                }
                                user_info.innerHTML = info;
                            }
                        };
                        httpRequest.open('GET', './user_info.php?user=$user_name', true);
                        httpRequest.send();

                        localStorage.setItem('select', 'wholesaler');
                        
                        function exit() {
                            localStorage.clear();
                            alert('با موفقیت خارج شدید!');
                            window.location.assign('http://localhost/DaryaDelan/');
                        }
                    }

                    catch (error) {
                        console.log('error');
                        console.log(error.message);
                    }

                    finally {
                        console.log('Runned!');
                    }
                </script>
                <script src='http://localhost/DaryaDelan/Lib/XDialog/xdialog.js'></script>
                <script src='ckeditor.js'></script>

<script>
	ClassicEditor
		.create( document.querySelector( '#editor' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );
</script>
            </html>";

<?php

print "
<style>
                .table {
                    display: none;
                }
            </style>
";

$user = $_POST["userSelect"];

if ($_GET["user_name"] != "") {
    $user_name = $_GET["user_name"];
} else if ($_POST["user_name"] != "") {
    $user_name = $_POST["user_name"];
}

if ($_GET["pass"] != "") {
    $password = $_GET["pass"];
} else if ($_POST["password"]) {
    $password = $_POST["password"];
}

if ($_GET["select"] != "") {
    $user = $_GET["select"];
}

if ($user === "user") {
    $con = mysqli_connect("localhost", "root", "", "daryadelan");
    $sql = "SELECT * FROM user";
    $query = mysqli_query($con, $sql);

    while ($row = mysqli_fetch_assoc($query)) {
        if ($row["user_name"] === strval($user_name) && $row["password"] === strval($password)) {
            echo "
            <html dir='rtl'>
                <head>
                    <meta charset='UTF-8'/>
                    <title>دریادلان | حساب کاربری</title>
                    <link rel='stylesheet' href='http://localhost/DaryaDelan/styles/bootstrap.min.css'/>
                    <link rel='stylesheet' href='./style.css'/>
                </head>
                <body>
                <div class='container-fluid'>
                <div class='row'>
                    <div class='col-sm-7'>
                        <img src='http://localhost/DaryaDelan/photo/logo.png' alt='Logo' class='icon'>
                        <input type='text' class='searchInput' placeholder='دنبال چی می گردی؟'>
                        <button class='btn btn-success'>جستجو</button>
                    </div>
                    <div class='col-sm-3'>
        
                    </div>
                    <div class='col-sm-2' class='tag3'>
                        <a href='#'>$user_name</a>
                        <a href='#' onClick='exit()'>خروج از حساب</a>
                    </div>
                </div>
            </div>
            <br>
            <div class='row content'>
                <div class='col-md-10'>
                    <div class='content'>
                        <a href='#'>محصولات</a>
                        <a href='#'>فروشند شوید</a>
                        <a href='#'>سوالی دارید؟</a>
                        <a href='#'>درباره ما</a>
                        <a href='#'>تماس با ما</a>
                    </div>
                </div>
                <div class='col-md-2 content'>
                    <span>
                        <button class='btn btn-danger' id='myBtn'><img class='icon-location' src='http://localhost/DaryaDelan/photo/location.png' alt='Location'></button>
                    </span>
                </div>
            </div>
            <br/>
            <br/>
                    <div class='container content4'>
                        <div class='row'>
                            <div class='col-sm-4'>
                                <div class='user-info shadow p-3 mb-5 bg-white rounded' style='padding-top: 20px;'>
                                    <img class='user-profile shadow p-3 mb-5 bg-white rounded' src='http://localhost/DaryaDelan/photo/user.jpg' alt='User Profile'/>
                                    <h3><h3>سلام، $user_name (کاربر معمولی)</h3></h3>
                                    <br/>
                                    <ul>
                                        <li><a href='#'>ویرایش اطلاعات حساب</a></li>
                                        <li><a href='#'>ارتباط با پشتیبانی</a></li>
                                        <li><a href='#'>سبد خرید</a></li>
                                        <li><a href='#'>کیف پول</a></li>
                                        <li><a href='#'>شکایت</a></li>
                                        <li><a href='#'>خروج از حساب</a></li>
                                    </ul>
                                </div>  
                            </div>
                            <div class='col-sm-8'>
                                <div class='user-info shadow p-3 mb-5 bg-white rounded'>
                                    <h3>وضعیت حساب</h3>
                                    <span id='user_info'>
                                        <p id='loading'>درحال دریافت اطلاعات....</p>
                                    </span>
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

                        localStorage.setItem('select', 'user');
                        
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
            </html>
            ";
            break;
        } else {
            echo "<h1 id='no'>No</h1>
            <style>
                .table {
                    display: none;
                }
            </style>
            <script>
                var h1Elements = document.getElementsByTagName('h1');
                for(var i = 1; i < h1Elements.length; i++) {
                    h1Elements[i].style.display = 'none';
                }
            </script>
            ";;
        }
    }
} else if ($user === "pricer") {
    $con = mysqli_connect("localhost", "root", "", "daryadelan");
    $sql = "SELECT * FROM buyer";
    $query = mysqli_query($con, $sql);

    while ($row = mysqli_fetch_assoc($query)) {
        if ($row["user_name"] === strval($user_name) && $row["password"] === strval($password)) {
            echo "
            <html dir='rtl'>
                <head>
                    <meta charset='UTF-8'/>
                    <title>دریادلان | حساب کاربری</title>
                    <link rel='stylesheet' href='http://localhost/DaryaDelan/styles/bootstrap.min.css'/>
                    <link rel='stylesheet' href='./style.css'/>
                </head>
                <body>
                <div class='container-fluid'>
                <div class='row' style='background-color: #cfd3d22e;'>
                <div class='col-md-12'>
                    <img style='width: 40px; height: 40px;' src='http://localhost/DaryaDelan/photo/IndexPage.png'/>
                    <a href='http://localhost/DaryaDelan/'>صفحه اصلی</a>
                    <img style='width: 40px; height: 40px;' src='http://localhost/DaryaDelan/photo/Eixt.png'/>
                    <a href='' onclick='exit()'>خروج</a>
                    <img style='width: 40px; height: 40px;' src='http://localhost/DaryaDelan/photo/newMessage.png'/>
                    <a href='' onclick=''>پیام ها</a>
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
                                    <h3>سلام، $user_name (فروشنده)</h3>
                                    <ul>
                                        <li><a href='Message.php?q=pricer&name=$user_name'>وضعیت حساب</a></li>
                                        <li><a href='MyMessage.php?user=$user_name'>ارتباط با پشتیبانی</a></li>
                                        <li><a href='Product.php?q=pricer&name=$user_name'>ارسال محصول</a></li>
                                        <li><a href='#'>کیف پول</a></li>
                                        <li><a href='#'>شکایت</a></li>
                                        <li><a href='#'>خروج از حساب</a></li>
                                    </ul>
                                </div>  
                            </div>
                            <div class='col-sm-8'>
                                <div class='user-info shadow p-3 mb-5 bg-white rounded'>
                                    <h3>هیچ اخباری موجود نیست</h3>
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

                        localStorage.setItem('select', 'pricer');
                        
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
            </html>
            ";
            break;
        } else {
            echo "
            <h1>id='no'>No</h1>
            <style>
                .table {
                    display: none;
                }
            </style>
            <script>
                var h1Elements = document.getElementsByTagName('h1');
                for(var i = 1; i < h1Elements.length; i++) {
                    h1Elements[i].style.display = 'none';
                }
            </script>
            ";
            continue;
        }
    }
} else if ($user === "wholesaler") {
    $con = mysqli_connect("localhost", "root", "", "daryadelan");
    $sql = "SELECT * FROM buyer";
    $query = mysqli_query($con, $sql);

    while ($row = mysqli_fetch_assoc($query)) {
        if ($row["user_name"] === strval($user_name) && $row["password"] === strval($password)) {
            echo "
            <html dir='rtl'>
                <head>
                    <meta charset='UTF-8'/>
                    <title>دریادلان | حساب کاربری</title>
                    <link rel='stylesheet' href='http://localhost/DaryaDelan/styles/bootstrap.min.css'/>
                    <link rel='stylesheet' href='./style.css'/>
                </head>
                <body>
            <br>
            <div class='row' style='background-color: #cfd3d22e;'>
                <div class='col-md-12'>
                    <img style='width: 40px; height: 40px;' src='http://localhost/DaryaDelan/photo/IndexPage.png'/>
                    <a href='http://localhost/DaryaDelan/'>صفحه اصلی</a>
                    <img style='width: 40px; height: 40px;' src='http://localhost/DaryaDelan/photo/Eixt.png'/>
                    <a href='' onclick='exit()'>خروج</a>
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
            </html>
            ";
            break;
        } else {
            echo "<h1 id='no'>No</h1>
            <style>
                .table {
                    display: none;
                }
            </style>
            <script>
                var h1Elements = document.getElementsByTagName('h1');
                for(var i = 1; i < h1Elements.length; i++) {
                    h1Elements[i].style.display = 'none';
                }
            </script>
            ";;
            continue;
        }
    }
}


print "
<script>
    localStorage.setItem('password', '$password');
    console.log(localStorage.getItem('password'));
</script>
";
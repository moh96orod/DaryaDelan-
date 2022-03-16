<?php
    print "
    <style>
        table {
            display: none;
        }
    </style>
    ";

    $q = $_GET["q"];
    $user_name = $_GET["name"];

    if($q != "") {
        if($q == "wholeaser") {
            $con = mysqli_connect("localhost", "root", "", "daryadelan");
            $sql = "SELECT * FROM buyer WHERE state='ok' AND user_name='$user_name'";
            $query = mysqli_query($con, $sql);
            
            while($row = mysqli_fetch_assoc($query)) {
                print "<html dir='rtl'>
                <head>
                    <meta charset='UTF-8'/>
                    <title>دریادلان | حساب کاربری</title>
                    <link rel='stylesheet' href='http://localhost/DaryaDelan/styles/bootstrap.min.css'/>
                    <link rel='stylesheet' href='./style.css'/>
                </head>
                <body>
                <div class='row' style='background-color: #cfd3d22e;'>
                <div class='col-md-12'>
                    <img style='width: 40px; height: 40px;' src='http://localhost/DaryaDelan/photo/IndexPage.png'/>
                    <a href='http://localhost/DaryaDelan/'>صفحه اصلی</a>
                    <img style='width: 40px; height: 40px;' src='http://localhost/DaryaDelan/photo/Eixt.png'/>
                    <a href='' onclick='exit()'>خروج</a>
                </div>
                </div>
            <br/>
            <style>
                h1 {
                    display: none;
                }
            </style>
            <br/>
                    <div class='container content4'>
                        <div class='row'>
                            <div class='col-sm-4'>
                                <div class='user-info shadow p-3 mb-5 bg-white rounded' style='padding-top: 20px;'>
                                    <img class='user-profile shadow p-3 mb-5 bg-white rounded' src='http://localhost/DaryaDelan/photo/user.jpg' alt='User Profile'/>
                                    <h3>سلام، $user_name (عمده فروش)</h3>
                                    <br/>
                                    <ul>
                                        <li><a href='#'>پیام های من</a></li>
                                        <li><a href='#'>ارتباط با پشتیبانی</a></li>
                                        <li><a href='#'>سبد خرید</a></li>
                                        <li><a href='#'>کیف پول</a></li>
                                        <li><a href='#'>شکایت</a></li>
                                        <li><a href='#'>خروج از حساب</a></li>
                                    </ul>
                                </div>  
                            </div>
                            <div class='col-sm-8 user-info shadow p-3 mb-5 bg-white rounded'>
                                <img style='width: 100px; height: 100px;' src='http://localhost/DaryaDelan/Signup/license/$row[license]'/>
                                <br/>
                                <br/>
                                <h2 style='color: green;'>مدارک با موفقیت تایید شد.</h2>
                                <hr/>
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
                
            }
            
            
        }

        if($q == "pricer") {
            $con = mysqli_connect("localhost", "root", "", "daryadelan");
            $sql = "SELECT * FROM buyer WHERE state='ok' AND user_name='$user_name'";
            $query = mysqli_query($con, $sql);
            
            while($row = mysqli_fetch_assoc($query)) {
                print "<html dir='rtl'>
                <head>
                    <meta charset='UTF-8'/>
                    <title>دریادلان | حساب کاربری</title>
                    <link rel='stylesheet' href='http://localhost/DaryaDelan/styles/bootstrap.min.css'/>
                    <link rel='stylesheet' href='./style.css'/>
                </head>
                <body>
                <div id='ok' class='container-fluid'>
                <div class='row'>
                <div class='row' style='background-color: #cfd3d22e;'>
                <div class='col-md-12'>
                    <img style='width: 40px; height: 40px;' src='http://localhost/DaryaDelan/photo/IndexPage.png'/>
                    <a href='http://localhost/DaryaDelan/'>صفحه اصلی</a>
                    <img style='width: 40px; height: 40px;' src='http://localhost/DaryaDelan/photo/Eixt.png'/>
                    <a href='' onclick='exit()'>خروج</a>
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
                                        <li><a href='./MyMessage.php?user=$user_name'>پیام های من</a></li>
                                        <li><a href='#'>ارتباط با پشتیبانی</a></li>
                                        <li><a href='#'>سبد خرید</a></li>
                                        <li><a href='#'>کیف پول</a></li>
                                        <li><a href='#'>شکایت</a></li>
                                        <li><a href='#'>خروج از حساب</a></li>
                                    </ul>
                                </div>  
                            </div>
                            <div class='col-sm-8 user-info shadow p-3 mb-5 bg-white rounded'>
                                <img style='width: 100px; height: 100px;' src='http://localhost/DaryaDelan/Signup/license/$row[license]'/>
                                <br/>
                                <br/>
                                <h2 style='color: green;'>مدارک با موفقیت تایید شد.</h2>
                                <hr/>
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
                
            }
            
            break;
        }
    }

    
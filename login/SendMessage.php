<?php
        include("./jdf.php");

        # get time
        $today = jdate("Y/m/d H:i");

        $user_name = $_POST["user_name"];
        $message = $_POST["message"];
        // $state = $_POST["state"];

        $con = mysqli_connect("localhost", "root", "", "daryadelan");
        $sql = "INSERT INTO message(user_name, message_body, message_time, message_from, state, response) VALUES('$user_name', '$message', '$today', '$user_name', 'ok', '')";
        $query = mysqli_query($con, $sql);

        if($query) {
            print "
            <html dir='rtl'>

<head>
    <meta charset='UTF-8' />
    <title>دریادلان | حساب کاربری</title>
    <link rel='stylesheet' href='http://localhost/DaryaDelan/styles/bootstrap.min.css' />
    <link rel='stylesheet' href='./style.css' />
</head>

<body>
    <div class='container-fluid'>
        <div class='row' style='background-color: #cfd3d22e;'>
            <div class='col-md-12'>
                <img style='width: 40px; height: 40px;' src='http://localhost/DaryaDelan/photo/IndexPage.png' />
                <a href='http://localhost/DaryaDelan/'>صفحه اصلی</a>
                <img style='width: 40px; height: 40px;' src='http://localhost/DaryaDelan/photo/Eixt.png' />
                <a href='' onclick='exit()'>خروج</a>
            </div>
        </div>
    </div>
    <br />
    <br />
    <div class='container content4'>
        <div class='row'>
            <div class='col-sm-4'>
                <div class='user-info shadow p-3 mb-5 bg-white rounded' style='padding-top: 20px;'>
                    <img class='user-profile shadow p-3 mb-5 bg-white rounded' src='http://localhost/DaryaDelan/photo/user.jpg' alt='User Profile' />
                    <h3>سلام، $user_name (فروشنده)</h3>
                    <ul>
                        <li><a href='Message.php?q=pricer&name=$user_name'>وضعیت حساب</a></li>
                        <li><a href='#'>ارتباط با پشتیبانی</a></li>
                        <li><a href='Product.php?q=pricer&name=$user_name'>ارسال محصول</a></li>
                        <li><a href='#'>کیف پول</a></li>
                        <li><a href='#'>شکایت</a></li>
                        <li><a href='#'>خروج از حساب</a></li>
                    </ul>
                </div>
            </div>
            <div class='col-sm-8'>
                <div class='alert alert-success'>
                    <h5>پیام شما با موفقیت برای پشتیبانی ارسال شد.</h5>
                    <p>زمانی که پاسخ ارسال شود در همین صفحه قابل مشاهده خواهد بود و همچنین از طریق ایمیل با یک لینک به شما اطلاع رسانی خواهیم.</p>
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
                <input type='text' class='searchInput2' placeholder='نام کاربری' name='user_name' disabled />
                <br />
                <br />
                <input type='password' class='searchInput2' placeholder='گذرواژه' name='password' />
                <br />
                <br />
                <button class='btn btn-danger'>ورود
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

        for (var i = 0; i < state.length; i++) {
            state[i].style.display = 'none';
        }

        function exit() {
            localStorage.clear();
            alert('با موفقیت خارج شدید!');
            window.location.assign('http://localhost/DaryaDelan/');
        }
    } catch (error) {
        console.log('error');
        console.log(error.message);
    } finally {
        console.log('Runned!');
    }
</script>

</html>
            ";
        }
        else {
            echo mysqli_connect_error();
            echo mysqli_connect_errno();
            echo mysqli_error($con);
            echo "ارسال نشد";
        }

        mysqli_close($con);
    
?>
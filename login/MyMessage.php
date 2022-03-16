<?php
$user_name = $_GET["user"];

if ($_GET["read"] != "OK") {
    $con = mysqli_connect("localhost", "root", "", "daryadelan");
    $sql = "UPDATE message SET read='ok' WHERE user_name='$user_name'";
    $query = mysqli_query($con, $sql);
    if ($query) {
        print "
            <script>
                window.alert('پیام به عنوان پیام خوانده شده ذخیره شد.');
            </script>
            ";
    } else {
        print mysqli_connect_error();
        print mysqli_errno($con);
    }
}

?>

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
                    <h3>سلام، <?php print $user_name; ?> (فروشنده)</h3>
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
                <div class='alert alert-info'>
                    <h5>پیام ها</h5>
                    <hr>
                    <br>
                    <?php
                    if ($user_name != "") {
                        $con = mysqli_connect("localhost", "root", "", "daryadelan");
                        $sql = "SELECT * FROM message";
                        $query = mysqli_query($con, $sql);

                        while ($row = mysqli_fetch_assoc($query)) {
                            if ($row["user_name"] === $user_name) {
                                if ($row["state"] === "ok") {
                                    print "
                                <div class='alert alert-warning'>
                                    <a href='?user=$user_name&read=ok'><img title='بعد از خواندن پیام روی این گزینه کلیک کنید.' src='http://localhost/DaryaDelan/photo/login%20(2).png' alt='پیام خوانده شده' style='width: 50px; heigth: 50px;'/></a>
                                    <hr/>
                                    <p>از طرف: $row[user_name]</p>
                                    <p>متن پیام:</p>
                                    <b> $row[message_body]</b>
                                    <br/>
                                    <br/>
                                    <p>$row[message_time]</p>
                                    <br/>
                                </div>
                                ";
                                } else {
                                    print "
                                <div class='alert alert-light'>
                                    <a href='?user=$user_name&read=ok'><img title='بعد از خواندن پیام روی این گزینه کلیک کنید.' src='http://localhost/DaryaDelan/photo/read.png' alt='پیام خوانده شده' style='width: 50px; heigth: 50px;'/></a>
                                    <hr/>
                                    <p>از طرف: $row[message_from]</p>
                                    <p>متن پیام:</p>
                                    <b> $row[message_body]</b>
                                    <br/>
                                    <br/>
                                    <p>$row[message_time]</p>
                                    <br/>
                                </div>
                                ";
                                }
                            }
                        }
                    } else {
                        echo "درخواست نامعتبر است.";
                    }
                    ?>
                </div>
                <div class="alert alert-success">
                    <p>اگر قصد ارسال تصویر، ویدئو و ... را دارید ابتدا در یک سرویس بارگذاری، آن را آپلود کرده و لینک آن را در کادر پیام قرار دهید.
                </div>
                <div class="alert alert-warning">
                    <div class="send-response">
                        <form action="./SendMessage.php?user_name=<?php echo $user_name; ?>" method="POST">
                            <h5>ارسال پاسخ</h5>
                            <hr>
                            <br>
                            نام کاربری: <input class="input input-group-lg" value="<?php print $user_name; ?>" name="user_name" />
                            <br />
                            <br />
                            متن پیام: <input style="height: 200px; width: 400px;" type="text" name="message">
                            <br />
                            <br />
                            <button class="btn btn-warning">ارسال</button>
                            <br/>
                        </form>
                    </div>
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
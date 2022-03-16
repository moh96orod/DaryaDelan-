<?php
    $userName = $_POST["user_name"];
    $password = $_POST["password"];
    $phone_number = $_POST["phone_number"];
    $nationalty_code = $_POST["national_code"];

    $con = mysqli_connect("localhost", "root", "", "daryadelan");
    $sql = "INSERT INTO user(user_name, password, phone, location) VALUES('$userName', '$password', '$phone_number', '$nationalty_code')";
    $query = mysqli_query($con, $sql);

    if($query) {
        echo "<html>
        <head>
          <meta charset='UTF-8'/>
          <title>وضعیت ثبت نام</title>
          <link rel='stylesheet' href='./styles/bootstrap.min.css'/>
          <link rel='stylesheet' href='./styles/style.css'/>
        </head>
        <body>
          <div class='container'>
            <div class='row'>
              <div class='col-md-12'>
                <h1>ثبت نام با موفقیت انجام شد.</h1>
              </div>
            </div>
          </div>
        </body>
        <script src='./script/bootstrap.min.js'></script>
        <script>
          localStorage.setItem('select', 'user');
        </script>
      </html>";
    }
    else {
        echo mysqli_connect_errno();
        echo mysqli_connect_errno();
        echo mysqli_errno($con);
    }

    mysqli_close($con);
?>
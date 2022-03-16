<?php

   

        // Count total files
        $countfiles = count($_FILES['file']['name']);
        
        // Looping all files
        for($i=0;$i<$countfiles;$i++){
          $filename = $_FILES['file']['name'][$i];
          
          // Upload file
          move_uploaded_file($_FILES['file']['tmp_name'][$i],'./License/'.$filename);

          $toDay = date("Y_m_d");
          $userName = $_POST["user_name"];
          $password = $_POST["password"];
          $phone_number = $_POST["phone_number"];
          $nationalty_code = $_POST["nationalty_code"];
          $location = $_POST["location"];
          $license = $filename = $_FILES['file']['name'][$i];
      
          $con = mysqli_connect("localhost", "root", "", "daryadelan");
          $sql = "INSERT INTO buyer(user_name, password, location, national_code, phone_number, license, state, type)
          VALUES('$userName', '$password', '$location', '$nationalty_code', '$phone_number', '$license', 'check', 'wholesaler')";
          $query = mysqli_query($con, $sql);
          if($query) {
            print "
            <html>
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
                localStorage.setItem('select', 'wholesaler');
              </script>
            </html>
            ";
        }
        else {
            echo mysqli_connect_errno();
            echo mysqli_connect_error();
            echo mysqli_error($con);
        }
        
       }

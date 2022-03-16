<?php
    $con = mysqli_connect("localhost", "root", "", "daryadelan");
    $sql = "SELECT * FROM buyer WHERE state='check'";
    $query = mysqli_query($con, $sql);
    $url = $_SERVER["PHP_SELF"];

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if($_POST["user_name"] != "") {
            $con = mysqli_connect("localhost", "root", "", "daryadelan");
            $sql = "UPDATE buyer SET state='ok' WHERE user_name='$_POST[user_name]'";
            $query = mysqli_query($con, $sql);

            if($query) {
                echo "وضعیت ثبت شد. (مدارک تایید شد)";
            }
        }

        if(isset($_POST["x"]) != "") {
            $con = mysqli_connect("localhost", "root", "", "daryadelan");
            $sql = "UPDATE buyer SET state='no' WHERE user_name='$_POST[x]'";
            $query = mysqli_query($con, $sql);

            if($query) {
                echo "وضعیت ثبت شد. (مدارک رد شد)";
            }
        }
    }
    
    if(mysqli_num_rows($query) == 0) {
        echo "مدارک ارسالی وجود ندارد";
    }

    while($row = mysqli_fetch_assoc($query)) {
        echo "
        <style>
            table {
                display: none
            }
        </style>
        <div style='text-align: center'>
            <img width='400px' height='400px' src='http://localhost/DaryaDelan/Signup/license/$row[license]'/>
            <h1>$row[user_name]</h1>
            <form action='$url' method='POST'>
                <input value='$row[user_name]' name='user_name'/>
                <button>تایید؟</button>
            </form>

            <form action='$url' method='POST'>
                <input value='$row[user_name]' name='x'/>
                <button>رد؟</button>
            </form>
        </div>
        ";
    }
?>

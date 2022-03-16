<?php
$con = mysqli_connect("localhost", "root", "", "daryadelan");
$sql = "SELECT * FROM category";
$query = mysqli_query($con, $sql);

print "
<style>
    body {
        direction: rtl;
    }

</style>
";

function add_category()
{
    $con = mysqli_connect("localhost", "root", "", "daryadelan");
    $sql = "INSERT INTO category(category_name, category_link) VALUES('$_POST[name]', '$_POST[link]')";
    $query = mysqli_query($con, $sql);
    if ($query) {
        echo "<p style='color: green'>ارسال شد.</p>";
    } else {
    }
}


function check_exist_category($name)
{
    $con = mysqli_connect("localhost", "root", "", "daryadelan");
    $sql = "SELECT * FROM category";
    $query = mysqli_query($con, $sql);

    while ($row = mysqli_fetch_assoc($query)) {
        if ($row["category_name"] === $name || $name === "") {
            echo "<p style='color: red'>دسته بندی از قبل وجود دارد!</p>";
            return false;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(check_exist_category($_POST["name"]) === false) {

    } else {
        add_category();
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مدیریت دسته بندی ها</title>
</head>

<body>
    <br/>
    <br/>
    <fieldset>
        <legend>افزودن دسته بندی</legend>
        <form method="POST" action="#">
            <input type="text" name="name" placeholder="عنوان دسته بندی">
            <br />
            <input type="text" name="link" placeholder="آدرس دسته بندی">
            <br />
            <br />
            <button>افزودن</button>
        </form>
    </fieldset>
</body>

</html>
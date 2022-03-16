<?php
function print_category()
{
    $con = mysqli_connect("localhost", "root", "", "daryadelan");
    $sql = "SELECT * FROM category";
    $query = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        print "<option value='$row[category_name]'>$row[category_name]</option>";
    }
}

function add_product() {
    $con = mysqli_connect("localhost", "root", "", "daryadelan");
    $sql = "INSERT INTO product(name, price, category) VALUES('$_POST[name]', '$_POST[price]', '$_POST[category]')";
    $query = mysqli_query($con, $sql);

    if($query) {
        echo "ارسال شد.";
    } else {
        echo mysqli_error($con);
    }
}

function check_exist_category($name)
{
    $con = mysqli_connect("localhost", "root", "", "daryadelan");
    $sql = "SELECT * FROM product";
    $query = mysqli_query($con, $sql);

    while ($row = mysqli_fetch_assoc($query)) {
        if ($row["name"] === $name || $name === "") {
            echo "<p style='color: red'> کالا از قبل وجود دارد!</p>";
            return false;
        }
    }
}

if(isset($_POST["name"])) {
    if(check_exist_category($_POST["name"] === false)) {
        echo "<h1>محصول از قبل وجود دارد. لطفا برای انتشار نام آن را تغییر دهید.</h1>";
    } else {
        add_product();
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مدیریت محصولات</title>
</head>

<body>
    <fieldset>
        <legend>افزودن محصول</legend>
        <form method="POST" action="#">
            <input type="text" name="name" placeholder="نام محصول">
            <br />
            <input type="text" name="price" placeholder="قیمت محصول">
            <br />
            <input type="text" placeholder="دسته بندی" />
            <select name=""  id="category">
                <?php print_category(); ?>
            </select>
            <br/>
            <br/>
            <button>ارسال</button>
        </form>
    </fieldset>
</body>

</html>
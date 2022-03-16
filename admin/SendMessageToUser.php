<?php
print "
<style>
    .table {
        display: none;
    }
</style>
";
if ($_GET["user_name"] != "") {
    $user_name = $_GET["user_name"];
} else {
    $user_name = "";
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>دریادلان | ارسال پیام به کاربران</title>
</head>

<body>
    <form action="#" method="POST">
        <input type="text" name="user_name" placeholder="نام کاربری" value="<?php print $user_name; ?>">
        <br />
        <br />
        <input type="text" name="message_body" placeholder="متن پیام">
        <br />
        <br />
        <button>ارسال</button>
    </form>
</body>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_name = $_POST["user_name"];
    $message = $_POST["message_body"];

    $con = mysqli_connect("localhost", "root", "", "daryadelan");
    $sql = "INSERT INTO message(user_name, message_body, message_from, state, response) VALUES('$user_name', '$message', 'پشتیبانی دریادلان', 'no', 'no')";
    $query = mysqli_query($con, $sql);

    if ($query) {
        echo "با موفقیت ارسال شد.";
    } else {
        echo mysqli_connect_error();
        echo mysqli_connect_errno();
        echo mysqli_errno($con);
        echo "ارسال نشد";
    }

    mysqli_close($con);
} else if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $user_name = $_GET["user_name"];
}
?>
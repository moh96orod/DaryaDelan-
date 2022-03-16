<?php
$user_name = $_POST["user_name"];
$con = mysqli_connect("localhost", "root", "", "daryadelan");
$sql = "SELECT * FROM message";
$query = mysqli_query($con, $sql);

# set title for news message
print "<b>پیام های جدید</b>";
print "<br/> <br/>";

while ($row = mysqli_fetch_assoc($query)) {
    if ($row["response"] === "") {
        print $row["user_name"] . '|' . $row["message_body"] . '|' .  $row["message_time"] . '|' . $row["message_from"] . '|' .  '<a href="sendMessageToUser.php?user_name='.$row["user_name"].'">ارسال پاسخ</a>';
        print "<br/>";
        print "<br/>";
    }
}
?>
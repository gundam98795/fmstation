<?php
$server = "localhost";         # MySQL/MariaDB 伺服器
$dbuser = "root";       # 使用者帳號
$dbpassword = "1073314"; # 使用者密碼
$dbname = "fmstation";    # 資料庫名稱

# 連接 MySQL/MariaDB 資料庫

$conn = mysqli_connect($server, $dbuser, $dbpassword, $dbname) or die;

/* $sql="update account set password='1010' where userid='xuan'";
 */
/* $sql="insert into account (userid,password,name) values ('fa','1120','許明財')";
 */
$sql = "select sum(subtotal) from custorder";

/* $result = mysqli_query($conn, $sql); */
$row = mysqli_fetch_array(mysqli_query($conn, $sql));

echo $row[0];

/* 
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_array($result)) {
        echo $row[0] . " " . $row[1] . " " . $row[2] . "<br>";
    }
} else {
    echo "0 results";
} */

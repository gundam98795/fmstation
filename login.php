<?php
session_start();

$server = "localhost";
$dbuser = "root";
$dbpassword = "1073314";
$dbname = "fmstation";

$conn = mysqli_connect($server, $dbuser, $dbpassword, $dbname) or die;

$id = $_POST['userid'];
$pass = $_POST['password'];

if ($conn) {
    /*     $sql = "select userid,password,name from account where userid='" . $id . "'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) <= 0) {
        echo "<script>alert('無此使用者名稱!請重新輸入');javascript:history.back(1)</script>";
    } else {
        $row = mysqli_fetch_array($result);

        if ($pass != trim($row['password'])) {
            echo "<script>alert('密碼錯誤!請重新輸入');javascript:history.back(1)</script>";
        } else {
 */
    $_SESSION['server'] = $server;
    $_SESSION['dbuser'] = $dbuser;
    $_SESSION['dbpassword'] = $dbpassword;
    $_SESSION['dbname'] = $dbname;

    /* $_SESSION['userid'] = trim($row['userid']);
            $_SESSION['password'] = trim($row['password']);
            $_SESSION['name'] = trim($row['name']); */

    header("Location:home.php");
    /*         }
    }
 */
} else {
    echo "<script>alert('無法連至資料庫!');javascript:history.back(1)</script>";
}

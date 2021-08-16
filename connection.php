<?php
session_start();

if (isset($_SESSION['server'])) {
    $_server = $_SESSION['server'];
    $_dbuser = $_SESSION['dbuser'];
    $_dbpassword = $_SESSION['dbpassword'];
    $_dbname = $_SESSION['dbname'];

/*     $_userid = $_SESSION['userid'];
    $_password = $_SESSION['password'];
    $_name = $_SESSION['name'];
 */
    $conn = mysqli_connect($_server, $_dbuser, $_dbpassword, $_dbname) or die;

/*     $sql = "select userid,password,name from account where userid='" . $_userid . "'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) <= 0) {
        echo "<script>alert('登入狀態錯誤');location.href='login.html'</script>";
    } else {
        $row = mysqli_fetch_array($result);

        if ($_password != trim($row['password'])) {
            echo "<script>alert('登入狀態錯誤');location.href='login.html'</script>";
        }
    } */
} else {
    echo "<script>alert('連線逾時，請重新登入');location.href='login.html'</script>";
}

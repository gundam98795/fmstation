<?php
require_once("connection.php");

$form = $_POST['form'];

if (isset($_POST['new'])) { //新單
    $form = $_POST['form'];

    $sql1 = "select * from custorder where serial like '" . $form[0] . "' ";
    $result = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('此訂單已存在!請重新輸入');location.href='custorder_new.php';</script>";
    } else {

        $sql1 = "insert into custorder
                 (serial, 
                 date, 
                 custname, 
                 code, 
                 name, 
                 amount, 
                 price, 
                 subtotal, 
                 total, 
                 ratio, 
                 remark) 
                 values 
                 ('" . $form[0] . "',
                 '" . $form[1] . "', 
                 '" . $form[2] . "', 
                 '" . $form[3] . "', 
                 '" . $form[4] . "', 
                 '" . $form[5] . "', 
                 '" . $form[6] . "', 
                 '" . $form[5] * $form[6] . "', 
                 '" . $form[5] * $form[6] * $form[9] . "', 
                 '" . $form[9] . "', 
                 '" . $form[10] . "' )";

        mysqli_query($conn, $sql1);

        $_SESSION['fix'] = $form[0];

        echo "<script>alert('新增完成');location.href='custorder_form.php';</script>";
    }
} elseif (isset($_POST['fix_a'])) { //單改
    $sql = "select sum(subtotal) from custorder where serial='" . $form[0] . "'";
    $row = mysqli_fetch_array(mysqli_query($conn, $sql));

    $sql1 = "update custorder set 
        date='" . $form[1] . "', 
        custname = '" . $form[2] . "', 
        total = '" . $row[0] * $form[9] . "', 
        ratio = '" . $form[9] . "',       
        remark = '" . $form[10] . "'       
        where serial='" . $form[0] . "'";

    mysqli_query($conn, $sql1);

    $_SESSION['fix'] = $form[0];

    echo "<script>alert('修改完成');location.href='custorder_form.php';</script>";
} elseif (isset($_POST['fix_b'])) { //單刪
    $sql1 = "delete from custorder where serial='" . $form[0] . "'";

    mysqli_query($conn, $sql1);

    $_SESSION['fix'] = $form[0];

    echo "<script>alert('刪除完成');location.href='custorder.php';</script>";
} elseif (isset($_POST['fix_c'])) { //新增
    $sql = "select sum(subtotal) from custorder where serial='" . $form[0] . "'";
    $row = mysqli_fetch_array(mysqli_query($conn, $sql));

    $sql1 = "insert into custorder
    (serial, 
    date, 
    custname, 
    code, 
    name, 
    amount, 
    price, 
    subtotal, 
    total, 
    ratio, 
    remark) 
    values 
    ('" . $form[0] . "',
    '" . $form[1] . "', 
    '" . $form[2] . "', 
    '" . $form[3] . "', 
    '" . $form[4] . "', 
    '" . $form[5] . "', 
    '" . $form[6] . "', 
    '" . $form[5] * $form[6] . "', 
    '" . ($row[0] + ($form[5] * $form[6])) * $form[9] . "', 
    '" . $form[9] . "', 
    '" . $form[10] . "' )";

    mysqli_query($conn, $sql1);


    $sql1 = "update custorder set 
        total = '" . ($row[0] + ($form[5] * $form[6])) * $form[9] . "'   
        where serial='" . $form[0] . "'";

    mysqli_query($conn, $sql1);

    $_SESSION['fix'] = $form[0];

    echo "<script>alert('新增完成');location.href='custorder_form.php';</script>";
} elseif (isset($_POST['fix_d'])) { //品改
    $sql = "update custorder set 
        code = '" . $form[3] . "', 
        amount = '" . $form[5] . "', 
        price = '" . $form[6] . "', 
        subtotal = '" . $form[5] * $form[6] . "', 
        remark = '" . $form[10] . "'
        where serial='" . $form[0] . "' 
        and name = '" . $form[4] . "'";

    mysqli_query($conn, $sql);


    $sql = "select sum(subtotal) from custorder where serial='" . $form[0] . "'";
    $row = mysqli_fetch_array(mysqli_query($conn, $sql));

    $sql2 = "select ratio from custorder where serial='" . $form[0] . "'";
    $row2 = mysqli_fetch_array(mysqli_query($conn, $sql2));

    $sql1 = "update custorder set 
        total = '" . $row[0] * $row2[0] . "'
        where serial='" . $form[0] . "'";

    mysqli_query($conn, $sql1);

    $_SESSION['fix'] = $form[0];

    echo "<script>alert('修改完成');location.href='custorder_form.php';</script>";
} elseif (isset($_POST['fix_e'])) { //品刪
    $sql1 = "delete from custorder where serial='" . $form[0] . "' and name='" . $form[4] . "'";

    mysqli_query($conn, $sql1);

    $sql = "select sum(subtotal) from custorder where serial='" . $form[0] . "'";
    $row = mysqli_fetch_array(mysqli_query($conn, $sql));

    $sql2 = "select ratio from custorder where serial='" . $form[0] . "'";
    $row2 = mysqli_fetch_array(mysqli_query($conn, $sql2));

    $sql1 = "update custorder set 
        total = '" . $row[0] * $row2[0] . "'
        where serial='" . $form[0] . "'";

    mysqli_query($conn, $sql1);

    $_SESSION['fix'] = $form[0];

    echo "<script>alert('刪除完成');location.href='custorder_form.php';</script>";
}

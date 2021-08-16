<?php
require_once("connection.php");

if (isset($_POST['add'])) {
    $form = $_POST['form'];

    $sql1 = "select max(serial) from cust";

    $result1 = mysqli_query($conn, $sql1);
    $s = mysqli_fetch_array($result1);



    $sql1 = "insert into cust
        (serial, 
        name, 
        post, 
        address, 
        busino, 
        mail, 
        contact, 
        phone, 
        cphone, 
        fax, 
        remark, 
        indate) 
        values 
        ('" . substr(trim($s[0]) + 100001, -5) . "',
        '" . $form[1] . "', 
        '" . $form[2] . "', 
        '" . $form[3] . "', 
        '" . $form[4] . "', 
        '" . $form[5] . "', 
        '" . $form[6] . "', 
        '" . $form[7] . "', 
        '" . $form[8] . "', 
        '" . $form[9] . "', 
        '" . $form[10] . "', 
        '" . $form[11] . "' )";

    mysqli_query($conn, $sql1);

    echo "<script>alert('新增完成');location.href='cust.php';</script>";
} elseif (isset($_POST['fix'])) {
    $form = $_POST['form'];

    $sql1 = "update cust set 
        name='" . $form[1] . "', 
        post = '" . $form[2] . "', 
        address = '" . $form[3] . "', 
        busino = '" . $form[4] . "', 
        mail = '" . $form[5] . "', 
        contact = '" . $form[6] . "', 
        phone = '" . $form[7] . "', 
        cphone = '" . $form[8] . "', 
        fax = '" . $form[9] . "', 
        remark = '" . $form[10] . "'
        where serial='" . $form[0] . "'";

    mysqli_query($conn, $sql1);

    echo "<script>alert('修改完成');location.href='cust.php';</script>";
} elseif (isset($_POST['del'])) {
    $form = $_POST['form'];

    $sql1 = "delete from cust where serial='" . $form[0] . "'";

    mysqli_query($conn, $sql1);

    echo "<script>alert('刪除完成');location.href='cust.php';</script>";
} elseif (isset($_POST['excel'])) {
    $word = $_POST['form'];
    $check = $_POST["check"];

    $count = 0;
    $_str = "";
    foreach ($check as $c) {
        $_str = $_str . "," . $c;
        $count++;
    }
    $_str = substr($_str, 1);

    $query = "select " . $_str . " from cust 
              where serial like '%" . $word[0] . "%' 
              and name like '%" . $word[1] . "%' 
              and address like '%" . $word[2] . "%' 
              and busino like '%" . $word[3] . "%' ";


    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        ob_clean();

        $file = fopen("excel/cust.csv", "w");
        fwrite($file, "\xEF\xBB\xBF");

        $list = array();
        foreach ($check as $c) {
            switch ($c) {
                case "serial":
                    array_push($list, "編號");
                    break;
                case "name":
                    array_push($list, "客戶名稱");
                    break;
                case "contact":
                    array_push($list, "聯絡人");
                    break;
                case "post":
                    array_push($list, "郵遞區號");
                    break;
                case "address":
                    array_push($list, "地址");
                    break;
                case "phone":
                    array_push($list, "電話");
                    break;
                case "cphone":
                    array_push($list, "手機");
                    break;
                case "fax":
                    array_push($list, "傳真");
                    break;
                case "mail":
                    array_push($list, "信箱");
                    break;
                case "busino":
                    array_push($list, "統一編號");
                    break;
                case "remark":
                    array_push($list, "備註");
                    break;
                case "indate":
                    array_push($list, "建檔日期");
                    break;
            }
        }
        fputcsv($file, $list);


        while ($row = mysqli_fetch_array($result)) {
            $list = array();
            for ($x = 0; $x < $count; $x++) {
                array_push($list, '="'.$row[$x].'"');
            }
            fputcsv($file, $list);
        }

        fclose($file);
        header('content-disposition:attachment;filename="客戶資料.csv"');
        header('content-length:' . filesize('excel/cust.csv'));
        readfile('excel/cust.csv');
        ob_implicit_flush();
    } else {
        echo "<script>alert('查無資料');javascript:history.back(1)</script>";
    }
}

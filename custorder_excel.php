<?php
require_once("connection.php");
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>訂單轉EXCEL</title>

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/navbar-top.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

</head>

<body>
    <?php require("navbar.php"); ?>

    <div class="container">
        <main class="form-signin position-absolute top-50 start-50 translate-middle" style="text-align:center;">
            <form method="POST" action="custorder_excel.php">
                <div class="form-floating">
                    <input type="text" name="code" class="form-control" id="floatingInput" placeholder="訂單編號">
                    <label for="floatingInput">訂單編號</label>
                </div>
                <br>
                <button class="w-auto btn btn-lg btn-info border border-dark border-1 m-1" type="submit" name="excel"><b>匯出</b></button>
            </form>
        </main>
    </div>

    <?php if (isset($_POST['excel'])) {
        $word = $_POST['code'];

        $query = "select * from custorder where serial like '" . $word . "' ";

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            ob_clean();

            $file = fopen("excel/order.csv", "w");
            fwrite($file, "\xEF\xBB\xBF");


            $row = mysqli_fetch_array($result);

            $list = array(
                array("客戶:", $row[2]),
                array("日期:", (substr($row[1], 0, 4) - 1911) . ". " . substr($row[1], -4, 2) . ". " . substr($row[1], -2)),
                array(""),
                array("No.", "型號", "品名", "數量", "單價", "金額")
            );

            foreach ($list as $line) {
                fputcsv($file, $line);
            }


            $result = mysqli_query($conn, $query);

            $i = 1;
            while ($row = mysqli_fetch_array($result)) {
                $list = array($i, $row[3], $row[4], $row[5], $row[6], $row[7], $row[10]);
                fputcsv($file, $list);

                $i++;
            }

            $sql = "select sum(subtotal) from custorder where serial='" . $word . "'";
            $row1 = mysqli_fetch_array(mysqli_query($conn, $sql));

            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($result);

            $list = array(
                array(""),
                array("", "", "", "", "5%", $row1[0] * ($row[9] - 1)),
                array("", "", "", "", "總計", $row[8]),
                array(""),
                array("備註:", $row[10])
            );

            foreach ($list as $line) {
                fputcsv($file, $line);
            }

            fclose($file);
            header('content-disposition:attachment;filename="訂單資料.csv"');
            header('content-length:' . filesize('excel/order.csv'));
            readfile('excel/order.csv');
            ob_implicit_flush();
        } else {
            echo "<script>alert('查無資料');</script>";
        }
    } ?>


    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
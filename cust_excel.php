<?php
require_once("connection.php");
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>客戶轉excel</title>

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/navbar-top.css" rel="stylesheet">
    <link href="bootstrap/form-validation.css" rel="stylesheet">

    <script language="JavaScript">
        function check_all(obj, cName) {
            var checkboxs = document.getElementsByName(cName);
            for (var i = 0; i < checkboxs.length; i++) {
                checkboxs[i].checked = obj.checked;
            }
        }
    </script>
</head>

<body>
    <?php require("navbar.php"); ?>

    <main class="container overflow-hidden">

        <form method="POST" action="cust_b.php">
            <br>
            <div class="row g-3">
                <div class="col-sm-4">
                    <div class="p-3 border bg-light rounded" style="height:380px">
                        <p class="h6 fw-light" style="text-align:center">欄位</p>
                        <input class="form-check-input" type="checkbox" id="c00" name="all" onclick="check_all(this,'check[]')">
                        <label for="c00"><b>全選</b></label><br>
                        <input class="form-check-input" type="checkbox" value="serial" id="c01" name="check[]">
                        <label for="c01">編號</label><br>
                        <input class="form-check-input" type="checkbox" value="name" id="c02" name="check[]">
                        <label for="c02">客戶名稱</label><br>
                        <input class="form-check-input" type="checkbox" value="contact" id="c07" name="check[]">
                        <label for="c07">聯絡人</label><br>
                        <input class="form-check-input" type="checkbox" value="post" id="c03" name="check[]">
                        <label for="c03">郵遞區號</label><br>
                        <input class="form-check-input" type="checkbox" value="address" id="c04" name="check[]">
                        <label for="c04">地址</label><br>
                        <input class="form-check-input" type="checkbox" value="phone" id="c08" name="check[]">
                        <label for="c08">電話</label><br>
                        <input class="form-check-input" type="checkbox" value="cphone" id="c09" name="check[]">
                        <label for="c09">手機</label><br>
                        <input class="form-check-input" type="checkbox" value="fax" id="c10" name="check[]">
                        <label for="c10">傳真</label><br>
                        <input class="form-check-input" type="checkbox" value="mail" id="c06" name="check[]">
                        <label for="c06">信箱</label><br>
                        <input class="form-check-input" type="checkbox" value="busino" id="c05" name="check[]">
                        <label for="c05">統一編號</label><br>
                        <input class="form-check-input" type="checkbox" value="remark" id="c11" name="check[]">
                        <label for="c11">備註</label><br>
                        <input class="form-check-input" type="checkbox" value="indate" id="c12" name="check[]">
                        <label for="c12">建檔日期</label><br>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="p-3 border bg-light rounded" style="height:380px">
                        <p class="h6 fw-light" style="text-align:center">條件</p>
                        <table class="table table-borderless align-middle" style="height: 100px;">
                            <tbody>
                                <tr>
                                    <td style="text-align:right;">編&emsp;&emsp;號:&nbsp;</td>
                                    <td><input type="text" class="form-control" name="form[0]" value=""></td>
                                </tr>
                                <tr>
                                    <td style="text-align:right;">客戶名稱:&nbsp;</td>
                                    <td><input type="text" class="form-control" name="form[1]" value=""></td>
                                </tr>
                                <tr>
                                    <td style="text-align:right;">地&emsp;&emsp;址:&nbsp;</td>
                                    <td><input type="text" class="form-control" name="form[2]" value=""></td>
                                </tr>
                                <tr>
                                    <td style="text-align:right;">統一編號:&nbsp;</td>
                                    <td><input type="text" class="form-control" name="form[3]" value=""></td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="h6 fw-light" style="text-align:center">(未輸入代表全部)</p>
                    </div>
                </div>

                <div class="col-sm-2" style="text-align:center;">
                    <button class="w-auto btn btn-outline-info btn-lg" style="margin-top:150px" type="submit" name="excel"><b>匯出</b></button>
                </div>

            </div>
        </form>


    </main>


    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
<?php
require_once("connection.php");
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>客戶資料</title>

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/navbar-top.css" rel="stylesheet">
    <link href="bootstrap/form-validation.css" rel="stylesheet">

</head>

<body>
    <?php require("navbar.php"); ?>

    <?php if(isset($_POST['add'])){ ?>
    <div class="container">
        <main>
            <br>
            <div class="text-center">
                <img class="d-block mx-auto mb-4" src="bootstrap/icons/person-plus-fill.svg" alt="" width="72" height="57">
            </div>

            <form method="POST" action="cust_b.php">
                <div class="row g-3">
                    <div class="col-sm-10"></div>
                    <div class="col-sm-2">
                        <label for="indate" class="form-label">建檔日期</label>
                        <input type="text" class="form-control" id="indate" name="form[11]" value="<?php echo date("Ymd") ?>">
                    </div>

                    <div class="col-sm-8">
                        <label for="name" class="form-label">客戶名稱</label>
                        <input type="text" class="form-control" id="name" name="form[1]" value="">
                    </div>

                    <div class="col-sm-4">
                        <label for="busino" class="form-label">統一編號</label>
                        <input type="text" class="form-control" id="busino" name="form[4]" value="">
                    </div>

                    <div class="col-sm-12"></div>

                    <div class="col-sm-2">
                        <label for="post" class="form-label">郵遞區號</label>
                        <input type="text" class="form-control" id="post" name="form[2]" value="">
                    </div>

                    <div class="col-sm-10">
                        <label for="post" class="form-label">地址</label>
                        <input type="text" class="form-control" id="address" name="form[3]" value="">
                    </div>

                    <div class="col-sm-12"></div>

                    <div class="col-sm-3">
                        <label for="contact" class="form-label">聯絡人</label>
                        <input type="text" class="form-control" id="contact" name="form[6]" value="">
                    </div>

                    <div class="col-sm-9">
                        <label for="mail" class="form-label">mail</label>
                        <input type="text" class="form-control" id="mail" name="form[5]" value="">
                    </div>

                    <div class="col-sm-12"></div>

                    <div class="col-sm-4">
                        <label for="phone" class="form-label">電話</label>
                        <input type="text" class="form-control" id="phone" name="form[7]" value="">
                    </div>

                    <div class="col-sm-4">
                        <label for="cphone" class="form-label">手機</label>
                        <input type="text" class="form-control" id="cphone" name="form[8]" value="">
                    </div>

                    <div class="col-sm-4">
                        <label for="fax" class="form-label">傳真</label>
                        <input type="text" class="form-control" id="fax" name="form[9]" value="">
                    </div>

                    <div class="col-sm-12"></div>

                    <div class="col-sm-12">
                        <label for="remark" class="form-label">備註</label>
                        <input type="text" class="form-control" id="remark" name="form[10]" value="">
                    </div>

                </div>

                <hr class="my-4">

                <div style="text-align:center">
                    <button class="w-auto ms-3 me-3 btn btn-outline-info btn-lg" type="submit" name="add" onClick="if(confirm('確認是否新增？')) return true;else return false;"><b>儲存</b></button>
                    <button class="w-auto ms-3 me-3 btn btn-outline-info btn-lg" type="button" onclick="location.href='home.php'"><b>取消</b></button>
                </div>
            </form>

        </main>
    </div>


    <?php }elseif(isset($_POST['fix'])){ ?>


        <?php
            $word = $_POST['code'];

            $sql1 = "select * from cust where serial like '" . $word . "' ";
            $result = mysqli_query($conn, $sql1);

            if (mysqli_num_rows($result) <= 0) {
                echo "<script>alert('查無此客戶!請重新輸入');location.href='cust_new.php';</script>";
            } else {
                $row = mysqli_fetch_array($result);
            ?>

                <div class="container">
                    <br>
                    <div class="text-center">
                        <img class="d-block mx-auto mb-4" src="bootstrap/icons/person-lines-fill.svg" alt="" width="72" height="57">
                    </div>

                    <form method="POST" action="cust_b.php">
                        <div class="row g-3">
                            <div class="col-sm-2">
                                <label for="indate" class="form-label">編號</label>
                                <input type="text" class="form-control" id="serial" name="form[0]" value="<?php echo trim($row[0]); ?>" readonly>
                            </div>
                            <div class="col-sm-8"></div>
                            <div class="col-sm-2">
                                <label for="indate" class="form-label">建檔日期</label>
                                <input type="text" class="form-control" id="indate" name="form[11]" value="<?php echo trim($row[11]); ?>" readonly>
                            </div>

                            <div class="col-sm-8">
                                <label for="name" class="form-label">客戶名稱</label>
                                <input type="text" class="form-control" id="name" name="form[1]" value="<?php echo trim($row[1]); ?>">
                            </div>

                            <div class="col-sm-4">
                                <label for="busino" class="form-label">統一編號</label>
                                <input type="text" class="form-control" id="busino" name="form[4]" value="<?php echo trim($row[4]); ?>">
                            </div>

                            <div class="col-sm-12"></div>

                            <div class="col-sm-2">
                                <label for="post" class="form-label">郵遞區號</label>
                                <input type="text" class="form-control" id="post" name="form[2]" value="<?php echo trim($row[2]); ?>">
                            </div>

                            <div class="col-sm-10">
                                <label for="post" class="form-label">地址</label>
                                <input type="text" class="form-control" id="address" name="form[3]" value="<?php echo trim($row[3]); ?>">
                            </div>

                            <div class="col-sm-12"></div>

                            <div class="col-sm-3">
                                <label for="contact" class="form-label">聯絡人</label>
                                <input type="text" class="form-control" id="contact" name="form[6]" value="<?php echo trim($row[6]); ?>">
                            </div>

                            <div class="col-sm-9">
                                <label for="mail" class="form-label">信箱</label>
                                <input type="text" class="form-control" id="mail" name="form[5]" value="<?php echo trim($row[5]); ?>">
                            </div>

                            <div class="col-sm-12"></div>

                            <div class="col-sm-4">
                                <label for="phone" class="form-label">電話</label>
                                <input type="text" class="form-control" id="phone" name="form[7]" value="<?php echo trim($row[7]); ?>">
                            </div>

                            <div class="col-sm-4">
                                <label for="cphone" class="form-label">手機</label>
                                <input type="text" class="form-control" id="cphone" name="form[8]" value="<?php echo trim($row[8]); ?>">
                            </div>

                            <div class="col-sm-4">
                                <label for="fax" class="form-label">傳真</label>
                                <input type="text" class="form-control" id="fax" name="form[9]" value="<?php echo trim($row[9]); ?>">
                            </div>

                            <div class="col-sm-12"></div>

                            <div class="col-sm-12">
                                <label for="remark" class="form-label">備註</label>
                                <input type="text" class="form-control" id="remark" name="form[10]" value="<?php echo trim($row[10]); ?>">
                            </div>

                        </div>

                        <hr class="my-4">

                        <div style="text-align:center;">
                            <button class="w-auto ms-3 me-3 btn btn-outline-info btn-lg" type="reset"><b>回復</b></button>
                            <button class="w-auto ms-3 me-3 btn btn-outline-info btn-lg" type="submit" name="add" onClick="if(confirm('確認是否新增？')) return true;else return false;"><b>新增</b></button>
                            <button class="w-auto ms-3 me-3 btn btn-outline-info btn-lg" type="submit" name="fix" onClick="if(confirm('確認是否修正？')) return true;else return false;"><b>更正</b></button>
                            <button class="w-auto ms-3 me-3 btn btn-outline-info btn-lg" type="submit" name="del" onClick="if(confirm('確認是否刪除？')) return true;else return false;"><b>刪除</b></button>
                            <button class="w-auto ms-3 me-3 btn btn-outline-info btn-lg" type="button" onclick="location.href='cust.php'"><b>取消</b></button>
                        </div>
                    </form>
                </div>

            <?php } ?>


    <?php } ?>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
<?php
require_once("connection.php");
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>訂單資料</title>

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/navbar-top.css" rel="stylesheet">

</head>

<body>
    <?php require("navbar.php"); ?>

    <?php if (isset($_POST['add'])) { ?>

        <div class="container">
            <main>
                <br>
                <div class="text-center">
                    <img class="d-block mx-auto mb-4" src="bootstrap/icons/file-earmark-plus.svg" alt="" width="72" height="57">
                </div>

                <form method="POST" action="custorder_b.php">
                    <div class="row g-3">
                        <div class="col-sm-2">
                            <label for="a1" class="form-label">訂單編號</label>
                            <input type="text" class="form-control" id="a1" name="form[0]" value="<?php echo date("MdyHis"); ?>">
                        </div>

                        <div class="col-sm-6">
                            <label for="custname" class="form-label">客戶名稱</label>
                            <select class="form-select" id="custname" name="form[2]">
                                <option value="" style="display:none;"></option>
                                <?php
                                $sql = "select name from cust ";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_array($result)) {

                                ?>
                                    <option value="<?php echo $row[0]; ?>"><?php echo $row[0]; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-sm-2"></div>

                        <div class="col-sm-2">
                            <label for="a1" class="form-label">日期</label>
                            <input type="text" class="form-control" id="a1" name="form[1]" value="<?php echo date("Ymd") ?>">
                        </div>


                        <div class="col-sm-2">
                            <label for="a2" class="form-label">型號</label>
                            <input type="text" class="form-control" id="a2" name="form[3]" value="">
                        </div>

                        <div class="col-sm-4">
                            <label for="a3" class="form-label">品名</label>
                            <input type="text" class="form-control" id="a3" name="form[4]" value="">
                        </div>

                        <div class="col-sm-2">
                            <label for="a4" class="form-label">數量</label>
                            <input type="text" class="form-control" id="a4" name="form[5]" value="">
                        </div>

                        <div class="col-sm-2">
                            <label for="a5" class="form-label">單價</label>
                            <input type="text" class="form-control" id="a5" name="form[6]" value="">
                        </div>

                        <div class="col-sm-2">
                            <div class="p-3 border bg-light rounded-2" style="text-align:center;height: 60px;margin-top:20px;">
                                <label class="form-label">5%&emsp;</label>
                                <input class="form-radio-input" type="radio" value="1.05" id="r1" name="form[9]">
                                <label class="form-radio-label" for="r1">含&emsp;</label>
                                <input class="form-radio-input" type="radio" value="1" id="r2" name="form[9]" checked>
                                <label class="form-radio-label" for="r2">不含</label>
                            </div>
                        </div>


                        <div class="col-sm-12">
                            <label for="a9" class="form-label">備註</label>
                            <input type="text" class="form-control" id="a9" name="form[10]" value="">
                        </div>

                    </div>

                    <hr class="my-4">

                    <div style="text-align:center">
                        <button class="w-auto ms-3 me-3 btn btn-outline-info btn-lg" type="submit" name="new" onClick="if(confirm('確認是否新增？')) return true;else return false;"><b>新增</b></button>
                        <button class="w-auto ms-3 me-3 btn btn-outline-info btn-lg" type="button" onclick="location.href='home.php'"><b>取消</b></button>
                    </div>
                </form>

            </main>
        </div>



        <?php } elseif (isset($_POST['fix']) || (isset($_SESSION['fix']) && $_SESSION != "")) {
        if (isset($_POST['fix'])) {
            $word = $_POST['code'];
        } else {
            $word = $_SESSION['fix'];
        }

        $sql1 = "select * from custorder where serial like '" . $word . "' ";
        $result = mysqli_query($conn, $sql1);

        if (mysqli_num_rows($result) <= 0) {
            echo "<script>alert('查無此訂單!請重新輸入');location.href='custorder_new.php';</script>";
        } else {
            $row = mysqli_fetch_array($result);
        ?>


            <div class="container">
                <main>
                    <br>
                    <div class="text-center">
                        <img class="d-block mx-auto mb-4" src="bootstrap/icons/file-earmark-text.svg" alt="" width="72" height="57">
                    </div>

                    <form method="POST" action="custorder_b.php">
                        <div class="row g-3">
                            <div class="col-sm-2">
                                <label for="a1" class="form-label">訂單編號</label>
                                <input type="text" class="form-control" id="a1" name="form[0]" value="<?php echo $row[0]; ?>" readonly>
                            </div>

                            <div class="col-sm-8"></div>

                            <div class="col-sm-2">
                                <label for="a1" class="form-label">日期</label>
                                <input type="text" class="form-control" id="a1" name="form[1]" value="<?php echo $row[1]; ?>">
                            </div>


                            <div class="col-sm-5">
                                <label for="custname" class="form-label">客戶名稱</label>
                                <select class="form-select" id="custname" name="form[2]">
                                    <option value="<?php echo $row[2]; ?>"><?php echo $row[2]; ?></option>
                                    <?php
                                    $sql = "select name from cust where name <> '" . $row[2] . "'";
                                    $result1 = mysqli_query($conn, $sql);

                                    while ($row1 = mysqli_fetch_array($result1)) {

                                    ?>
                                        <option value="<?php echo $row1[0]; ?>"><?php echo $row1[0]; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="col-sm-3"></div>

                            <div class="col-sm-2">
                                <div class="p-3 border bg-light rounded-2" style="text-align:center;height: 60px;margin-top:20px;margin-right:20px;">
                                    <label class="form-label">5%&emsp;</label>
                                    <input class="form-radio-input" type="radio" value="1.05" id="r3" name="form[9]" <?php if (trim($row[9]) == "1.05") {
                                                                                                                            echo "checked";
                                                                                                                        } ?>>
                                    <label class="form-radio-label" for="r3">含&emsp;</label>
                                    <input class="form-radio-input" type="radio" value="1" id="r4" name="form[9]" <?php if (trim($row[9]) == "1") {
                                                                                                                        echo "checked";
                                                                                                                    } ?>>
                                    <label class="form-radio-label" for="r4">不含</label>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <label for="a7" class="form-label">總計</label>
                                <input type="text" class="form-control" id="a7" name="form[8]" value="<?php echo $row[8]; ?>" readonly>
                            </div>


                            <div class="col-sm-10">
                                <label class="form-label">備註</label>
                                <input type="text" class="form-control" name="form[10]" value="">
                            </div>

                            <div class="col-sm-2"><br>
                                <button class="w-auto ms-3 btn btn-outline-info" type="submit" name="fix_a" onClick="if(confirm('確認是否修改？')) return true;else return false;"><b>修改</b></button>
                                <button class="w-auto ms-3 btn btn-outline-info" type="submit" name="fix_b" onClick="if(confirm('確認是否刪除整筆訂單？')) return true;else return false;"><b>刪除</b></button>
                            </div>

                            <hr class="my-4">
                        </div>
                    </form>


                    <form method="POST" action="custorder_b.php">
                        <div class="row g-3">
                            <div class="col-sm-2">
                                <label class="form-label">型號</label>
                                <input type="text" class="form-control" name="form[3]" value="">
                            </div>

                            <div class="col-sm-3">
                                <label class="form-label">品名</label>
                                <input type="text" class="form-control" name="form[4]" value="">
                            </div>

                            <div class="col-sm-1">
                                <label class="form-label">數量</label>
                                <input type="text" class="form-control" name="form[5]" value="">
                            </div>

                            <div class="col-sm-2">
                                <label class="form-label">單價</label>
                                <input type="text" class="form-control" name="form[6]" value="">
                            </div>

                            <div class="col-sm-2"></div>

                            <div class="col-sm-2"><br>
                            <input type="hidden" name="form[0]" value="<?php echo $row[0]; ?>">
                            <input type="hidden" name="form[1]" value="<?php echo $row[1]; ?>">
                            <input type="hidden" name="form[2]" value="<?php echo $row[2]; ?>">
                            <input type="hidden" name="form[7]" value="<?php echo $row[7]; ?>">
                            <input type="hidden" name="form[8]" value="<?php echo $row[8]; ?>">
                            <input type="hidden" name="form[9]" value="<?php echo $row[9]; ?>">
                            <input type="hidden" name="form[10]" value="<?php echo $row[10]; ?>">
                                <button class="w-auto ms-5 btn btn-outline-info" type="submit" name="fix_c" onClick="if(confirm('確認是否新增？')) return true;else return false;"><b>新增</b></button>
                            </div>

                            <hr class="my-4">
                        </div>
                    </form>


                    <?php $result = mysqli_query($conn, $sql1);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>

                        <form method="POST" action="custorder_b.php">
                            <div class="row g-3">

                                <div class="col-sm-2">
                                    <label class="form-label">型號</label>
                                    <input type="text" class="form-control" name="form[3]" value="<?php echo $row[3]; ?>">
                                </div>

                                <div class="col-sm-3">
                                    <label class="form-label">品名</label>
                                    <input type="text" class="form-control" name="form[4]" value="<?php echo $row[4]; ?>" readonly>
                                </div>

                                <div class="col-sm-1">
                                    <label class="form-label">數量</label>
                                    <input type="text" class="form-control" name="form[5]" value="<?php echo $row[5]; ?>">
                                </div>

                                <div class="col-sm-2">
                                    <label class="form-label">單價</label>
                                    <input type="text" class="form-control" name="form[6]" value="<?php echo $row[6]; ?>">
                                </div>

                                <div class="col-sm-2">
                                    <label class="form-label">小計</label>
                                    <input type="text" class="form-control" name="form[7]" value="<?php echo $row[7]; ?>" readonly>
                                </div>

                                <div class="col-sm-2"><br>
                                    <input type="hidden" name="form[0]" value="<?php echo $row[0]; ?>">
                                    <button class="w-auto ms-3 btn btn-outline-info" type="submit" name="fix_d" onClick="if(confirm('確認是否修改？')) return true;else return false;"><b>修改</b></button>
                                    <button class="w-auto ms-3 btn btn-outline-info" type="submit" name="fix_e" onClick="if(confirm('確認是否刪除？')) return true;else return false;"><b>刪除</b></button>
                                </div>

                                <hr class="my-4">
                            </div>
                        </form>

                    <?php
                        if (!isset($_POST['fix'])) {
                            $_SESSION['fix'] = "";
                        }
                    } ?>


                    <div style="text-align:center">
                        <button class="w-auto ms-3 me-3 btn btn-outline-info btn-lg" type="button" onclick="location.href='custorder.php'"><b>離開</b></button>
                    </div>


                </main>
            </div>


    <?php }
    } ?>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
<?php
require_once("connection.php");
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>訂單查詢</title>

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/navbar-top.css" rel="stylesheet">
    <link href="bootstrap/form-validation.css" rel="stylesheet">

</head>

<body>
    <?php require("navbar.php"); ?>

    <main class="container-fluid">

        <form method="POST" action="custorder.php">
            <br>
            <div class="row g-3">
                <div class="col-sm-2" style="text-align:right;">
                    <label for="select" class="form-label fs-4">條件&nbsp;:</label>
                </div>
                <div class="col-sm-2">
                    <select class="form-select" id="select" name="select">
                        <option value="name">品名</option>
                        <option value="custname">客戶名稱</option>
                        <option value="code">貨號</option>
                        <option value="date">日期</option>
                        <option value="amount">數量</option>
                        <option value="price">單價</option>
                        <option value="total">總計</option>
                    </select>
                </div>
                <div class="col-sm-2" style="text-align:right;">
                    <label for="name" class="form-label fs-4">關鍵字&nbsp;:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="word" value="">
                </div>

                <div class="col-sm-3" style="text-align:center;">
                    <button class="w-auto btn btn-outline-info btn-lg" style="margin-right:20px;" type="submit" name="find"><b>查詢</b></button>
                </div>

            </div>
        </form>



        <?php if (isset($_POST['find'])) { ?>

            <div class="p-5 rounded">
                <table class="table table-secondary table-striped">
                    <thead>
                        <tr>
                            <th scope="col" nowrap="nowrap">編號</th>
                            <th scope="col" nowrap="nowrap">日期</th>
                            <th scope="col" nowrap="nowrap">客戶名稱</th>
                            <th scope="col" nowrap="nowrap">貨號</th>
                            <th scope="col" nowrap="nowrap">品名</th>
                            <th scope="col" nowrap="nowrap" style="text-align:right;">數量</th>
                            <th scope="col" nowrap="nowrap" style="text-align:right;">單價</th>
                            <th scope="col" nowrap="nowrap" style="text-align:right;">小計</th>
                            <th scope="col" nowrap="nowrap" style="text-align:right;">總計</th>
                            <th scope="col" nowrap="nowrap" style="text-align:right;">5%</th>
                            <th scope="col">備註</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $select = $_POST['select'];
                        $word = $_POST['word'];

                        $sql = "select * from custorder where " . $select . " like '%" . $word . "%'  order by " . $select . " asc ";
                        $result = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td nowrap="nowrap"><?php echo trim($row[0]); ?></td>
                                <td nowrap="nowrap"><?php echo trim($row[1]); ?></td>
                                <td nowrap="nowrap"><?php echo trim($row[2]); ?></td>
                                <td nowrap="nowrap"><?php echo trim($row[3]); ?></td>
                                <td nowrap="nowrap"><?php echo trim($row[4]); ?></td>
                                <td nowrap="nowrap" style="text-align:right;"><?php echo trim($row[5]); ?></td>
                                <td nowrap="nowrap" style="text-align:right;"><?php echo trim($row[6]); ?></td>
                                <td nowrap="nowrap" style="text-align:right;"><?php echo trim($row[7]); ?></td>
                                <td nowrap="nowrap" style="text-align:right;"><?php echo trim($row[8]); ?></td>
                                <td nowrap="nowrap" style="text-align:right;"><?php echo trim($row[9]); ?></td>
                                <td nowrap="nowrap"><?php echo trim($row[10]); ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        <?php } ?>

    </main>


    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
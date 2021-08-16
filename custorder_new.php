<?php
require_once("connection.php");
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>新增或修正</title>

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

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

<body class="text-center">
    <?php require("navbar.php"); ?>

    <div class="container">
        <main class="form-signin position-absolute top-50 start-50 translate-middle">
            <form method="POST" action="custorder_form.php">
                <div class="form-floating">
                    <input type="text" name="code" class="form-control" id="floatingInput" placeholder="訂單編號">
                    <label for="floatingInput">訂單編號</label>
                </div>
                <br>
                <button class="w-90 btn btn-lg btn-info border border-dark border-1 m-1" type="submit" name="add"><b>新增</b></button>
                <button class="w-90 btn btn-lg btn-info border border-dark border-1 m-1" type="submit" name="fix"><b>更新</b></button>
            </form>
        </main>
    </div>


    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
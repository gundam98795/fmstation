<nav class="navbar navbar-expand-md navbar-dark bg-info mb-4">
    <div class="container-fluid" style="font-weight:bold;">
        <a class="navbar-brand" href="home.php">FMstation</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        客戶資訊
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="cust.php">快速查詢</a></li>
                        <li><a class="dropdown-item" href="cust_new.php">新增或修正</a></li>
                        <li><a class="dropdown-item" href="cust_excel.php">轉EXCEL</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        訂單資訊
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="custorder.php">快速查詢</a></li>
                        <li><a class="dropdown-item" href="custorder_new.php">新增或修正</a></li>
                        <li><a class="dropdown-item" href="custorder_excel.php">轉EXCEL</a></li>
                    </ul>
                </li>

            </ul>

            <ul class="navbar-nav navbar-right mb-2 mb-md-0">
                <!-- <img src="bootstrap/icons/person-circle.svg" width="50" height="34">
                <a class="navbar-brand"><?php /* echo $_name; */ ?>&emsp;</a> -->
                <li class="nav-item">
                    <button class="btn btn-outline-light border border-light border-2" type="button" onclick="location.href='logout.php'"><b>登出</b></button>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
include "../private/php/DbConnecter.php";
// echo 'test';
$sql = "SELECT * FROM RequestQuery WHERE id = 1";
$stmt = sqlsrv_query($conn, $sql);
if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

// phpinfo();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Росссети</title>
    <script src="../private/Libs/jqery.js"></script>
    <link rel="stylesheet" href="../private/Libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../private/css/Main.css">
    <script src="../private/Libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="../private/js/Main.js"></script>
</head>

<header style="background-color: #005b9c;">
    <div class="row">
        <div class="col-sm-1">
            <img src="../src/img/logo.png" alt="Россети" srcset="" style="padding: 10px;max-width: 160px;">
        </div>
        <div class="col-sm-9">
            <ul class="nav" style="padding: 10px;" id="main-navigation" style="display:none;">
                <li class="nav-item">
                    <a class="nav-link active text-white" href="#">Новая заявка</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Список заявок</a>
                </li>
            </ul>
        </div>
        <div class="col-sm-1" style="text-align: right;"><span class="nav text-white" style="padding: 10px;" id="loginSplash"></span></div>
    </div>
</header>

<body>
    <div id="authForm" class="center-block" style="margin: 0 auto; max-width: 600px; margin-top: 1em;">
        <div class="row">
            <div class="col-sm-12">
                <div class="block" style="padding: 1em;">
                    <h3 style="text-align: center;">Авторизация</h3>
                    <div style="">
                        <label for="login">Введите логин</label>
                        <input type="text" class="form-control" id="login">
                        <br>
                        <label for="login">Введите пароль</label>
                        <input type="password" class="form-control" id="password">
                        <br>
                        <input type="button" class="form-control btn-primary" id="btnAuth" value="Авторизоваться">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="body">

    </div>
</body>

</html>
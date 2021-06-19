<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登入</title>
    
    <link rel="stylesheet" href="css\\main.css">
    <style>
        <? session_start(); include "css/main.css" ?>
    </style>
    <link rel="shortcut icon" href="logo/nuklogo.ico" type="image/x-icon">
    <script src="https://kit.fontawesome.com/f810d2bb4c.js" crossorigin="anonymous"></script>
    
</head>

<body>
<?
    include("sql_connect.inc.php");
    if($_SESSION['id']==null){
?>
    <header>
        <a href="index.php">國立高雄大學烤肉區租賃系統</a>
    </header>
    <nav>
        <div class="wrap">
            <a href="register.php">註冊</a>
            <a href="login.php" class="highLight">登入</a>
            <a href="queryArea.php">查詢場地</a>
        </div>

    </nav>
    <div class="container">
        <div class="loginArea">
                <form action="loginVerify.php" method="post">
                    <table>
                        <tbody>
                            <tr>
                                <td ><i class="fas fa-user"></i></td>
                                <td ><input type="text" maxLength="20" name="account" placeholder="校內人員請使用學號" required></td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-lock"></i></td>
                                <td><input type="password" maxLength="20" name="password" placeholder="密碼長度小於20字元" required></td>
                            </tr>
                        </tbody>
                    </table>
                    <input type="submit" value="登入">
                </form>
        </div>
    </div>
    <?
        }
        else if($_SESSION['authority']==3){
            echo "已登入。";
            echo '<meta http-equiv=REFRESH CONTENT=1;url=admin.php>';
        }
        else if($_SESSION['authority']==2){
            echo "已登入。";
            echo '<meta http-equiv=REFRESH CONTENT=1;url=undertaker.php>';
        }
        else if($_SESSION['authority']==1){
            echo "已登入。";
            echo '<meta http-equiv=REFRESH CONTENT=1;url=renter.php>';
        }
    ?>

</body>
</html>
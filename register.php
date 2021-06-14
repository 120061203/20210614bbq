<html>
<head>
    <meta charset="utf-8">
    <title>帳號註冊</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
                <a href="register.php" class="highLight">註冊</a>
                <a href="login.php" >登入</a>
                <a href="queryArea.php">查詢場地</a>
            </div>
        </nav>
        <div class="container">
        <div class="loginArea">
                <form action="registerResult.php" method="post">
                    <table>
                        <tbody>
                            <tr>
                                <td ><i class="fas fa-user"></i></td>
                                <td ><input type="text" maxLength="20" name="account" placeholder="登入用ID" required></td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-lock"></i></td>
                                <td><input type="password" maxLength="20" name="password" placeholder="密碼長度小於20字元" required></td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-id-card"></i></i></td>
                                <td><input type="text" maxLength="20" name="name" placeholder="例:丁大中" required></td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-envelope"></i></i></td>
                                <td><input type="email" maxLength="50" name="email" placeholder="例:dazong123@gmail.com" required></td>
                            </tr>
                        </tbody>
                    </table>
                    <input type="submit" value="註冊">
                </form>
        </div>
    </div>
    <?
    }
    else
    {
        echo "已登入。";
        echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
    }
    ?>

        
</body>
</html>

<html>
<head>
    <meta charset="utf-8">
    <title>場地查詢</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        <? session_start(); include "css/main.css" ?>
    </style>
    <link rel="shortcut icon" href="logo/nuklogo.ico" type="image/x-icon">
    <script src="https://kit.fontawesome.com/f810d2bb4c.js" crossorigin="anonymous"></script>
</head>
<link rel="stylesheet" href="css\main.css">

<body>
<header>
    <a href="index.php">國立高雄大學烤肉區租賃系統</a>
</header>

<nav>
    <div class="wrap">
        <?
        if($_SESSION['id']==null){
            ?>
            <a href="register.php">註冊</a>
            <a href="login.php">登入</a>
            <a href="queryArea.php">查詢場地</a>
            <?
        }
        else if($_SESSION['authority']==1){
            ?>
            <a href="logout.php">登出</a>
            <a href="renter.php">進入系統</a>
            <a href="queryArea.php">查詢場地</a>
            <?
        }
        else if($_SESSION['authority']==2){
            ?>
            <a href="logout.php">登出</a>
            <a href="undertaker.php">進入系統</a>
            <a href="queryArea.php">查詢場地</a>
            <?
        }
        else if($_SESSION['authority']==3){
            ?>
            <a href="logout.php">登出</a>
            <a href="admin.php">進入系統</a>
            <a href="queryArea.php">查詢場地</a>
            <?
        }
        ?>
    </div>
</nav>

<div class="container">
    <div class="queryArea">
    <form action="queryAreaResult.php" method="post">
            <table>
                <tbody>
                <tr>
                    <td>日期(起)</td>
                    <td><input type="date" name="campDateStart"></td>
                </tr>
                <tr>
                    <td>日期(迄)</td>
                    <td><input type="date" name="campDateEnd"></td>
                </tr>
                <tr>
                    <td>烤肉借用時段
                    <td>
                        <select name="bbqTimeStart" >
                            <option value="8" selected>-請選擇-</option>
                            <option value="8"  >08:00</option>
                            <option value="9"  >09:00</option>
                            <option value="10" >10:00</option>
                            <option value="11" >11:00</option>
                            <option value="12" >12:00</option>
                            <option value="13" >13:00</option>
                            <option value="14" >14:00</option>
                            <option value="15" >15:00</option>
                            <option value="16" >16:00</option>
                            <option value="17" >17:00</option>
                            <option value="18" >18:00</option>
                        </select>
                    ~
                        <select name="bbqTimeEnd" >
                            <option value="18" selected>-請選擇-</option>
                            <option value="8"  >08:00</option>
                            <option value="9"  >09:00</option>
                            <option value="10" >10:00</option>
                            <option value="11" >11:00</option>
                            <option value="12" >12:00</option>
                            <option value="13" >13:00</option>
                            <option value="14" >14:00</option>
                            <option value="15" >15:00</option>
                            <option value="16" >16:00</option>
                            <option value="17" >17:00</option>
                            <option value="18" >18:00</option>
                        </select>
                    </td>
                </tr>
                </tbody>
            </table>
            <input type="submit" value="查詢">
        </form>
    </div>
</div>



</body>
</html>
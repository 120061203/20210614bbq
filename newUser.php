<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>大量新增</title>
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
if($_SESSION['id']!=null&&$_SESSION['authority']==3){



    ?>
    <header>
        <a href="index.php">國立高雄大學烤肉區租賃系統</a>
    </header>

    <div class="container">
        <div class="newUserArea">
            <form action="newUserResult.php" method="post">
                <table>
                    <tbody>
                    <tr>
                        <td>用戶身分</td>
                        <td>
                            <select name="type" >
                                <option value="0" selected>校內</option>
                                <option value="1" >校外</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>固定編號</td>
                        <td><input type="text" maxLength="20" name="accountFirst" placeholder="例:a10755" required></td>
                    </tr>
                    <tr>
                        <td>新增數量</td>
                        <td><input type="text" maxLength="20" name="accountQuantity" placeholder="最少1最多99" required></td>
                    </tr>
                    <tr>
                        <td>密碼</td>
                        <td><input type="text" maxLength="20" name="password" placeholder="密碼長度小於20字元" required></td>
                    </tr>
                    </tbody>
                </table>
                <input type="submit" value="送出">
            </form>
        </div><!--loginAreaEnd-->
    </div><!--containerEnd-->
    <?
}
else
{
    echo "您尚未登入。";
    echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
}
?>
</body>
</html>
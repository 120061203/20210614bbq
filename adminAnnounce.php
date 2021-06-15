<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>管理員公告</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        <? session_start(); include "css/main.css" ?>
    </style>
    <link rel="shortcut icon" href="logo/nuklogo.ico" type="image/x-icon">
    <script src="https://kit.fontawesome.com/f810d2bb4c.js" crossorigin="anonymous"></script>
</head>
<body>
<?php
include("sql_connect.inc.php");
if($_SESSION['id']!=null&&$_SESSION['authority']==3){
?>
    <header>
        <a href="index.php">國立高雄大學烤肉區租賃系統</a>
    </header>
    <div class="container">
        <div class="adminAnnounceArea">
            <form action="adminAnnounceResult.php" method ="post">
                <table>
                    <tbody>
                        <tr>
                            <td>公告標題</td>
                            <td><input type="text" maxLength="20" name="announce_title" placeholder="小於20字" required></td>
                        </tr>
                        <tr>
                            <td>公告內容</td>
                            <td>
                                <!-- <input type="text" maxLength="100" name="announce_content" placeholder="小於100字" > -->
                                <textarea name="announce_content" maxLength="100" placeholder="小於100字" cols="50" rows="3"></textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <input type="submit" value="發佈公告">
                    
            </form>
        </div><!--adminAnnounceArea end-->
    
    </div><!--container end-->
<?php
}
else
{
    echo "您尚未登入。";
    echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
}
?>    
</body>
</html>
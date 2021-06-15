<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>系統管理員界面</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css">
    <!-- <style>
        <? session_start(); include "css/main.css" ?>
    </style> -->
    <link rel="shortcut icon" href="logo/nuklogo.ico" type="image/x-icon">
    <script src="https://kit.fontawesome.com/f810d2bb4c.js" crossorigin="anonymous"></script>
</head>
<body>
<?
include("sql_connect.inc.php");
if($_SESSION['id']!=null&&($_SESSION['authority']==3))
{



?>
    <header>
        <a href="index.php">國立高雄大學烤肉區租賃系統</a>
    </header>
    <div class="adminArea">
        <div class="renterWall">
            <div class="card">
                <a href="apply.php">
                    <i class="fas fa-comment-medical"></i>
                </a>
                <div class="cardIntro">
                    租賃申請
                </div>
            </div>
            <div class="card">
                <a href="applyEdit.php">
                    <i class="fas fa-history"></i>
                </a>
                <div class="cardIntro">
                    編輯申請
                </div>
            </div>
            <div class="card">
                <a href="newUser.php">
                    <i class="fas fa-users"></i>
                </a>
                <div class="cardIntro">
                    大量註冊
                </div>
            </div>
            <div class="card">
                <a href="userEdit.php">
                    <i class="fas fa-edit"></i>
                </a>
                <div class="cardIntro">
                    編輯帳號
                </div>
            </div>
            <br>
            <div class="card">
                <a href="adminAnnounce.php">
                    <i class="fas fa-bullhorn"></i>
                </a>
                <div class="cardIntro">
                    系統公告
                </div>
            </div>
            <div class="card">
                <a href="adminSaveToCsv.php">
                    <i class="far fa-save"></i>
                </a>
                <div class="cardIntro">
                    資料歸檔
                </div>
            </div>
            <div class="card">
                <a href="logout.php">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
                <div class="cardIntro">
                    帳號登出
                </div>
            </div>
        </div>
    </div>



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
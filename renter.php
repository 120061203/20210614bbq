<html>
<head>
    <meta charset="utf-8">
    <title>租賃人專區</title>
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
    if($_SESSION['id']!=null&&($_SESSION['authority']==1))
    {



?>
        <header>
            <a href="index.php">國立高雄大學烤肉區租賃系統</a>
        </header>
        <div class="renterWall">
                <div class="card">
                    <a href="apply.php">
                        <i class="fas fa-comment-medical"></i>
                    </a>
                    <div class="cardIntro">
                        申請租賃
                    </div>
                </div>
                <div class="card">
                    <a href="historyRenter.php">
                        <i class="fas fa-history"></i>
                    </a>
                    <div class="cardIntro">
                        歷史紀錄
                    </div>
                </div>
                <div class="card">
                    <a href="myForm.php">
                        <i class="fab fa-wpforms"></i>
                    </a>
                    <div class="cardIntro">
                        我的申請
                    </div>
                </div>
                <div class="card">
                    <a href="profileEdit.php">
                        <i class="fas fa-user-circle"></i>
                    </a>
                    <div class="cardIntro">
                        個人資料
                    </div>
                </div>
                <div class="card">
                    <a href="suggestSolve.php">
                        <i class="far fa-envelope"></i>
                    </a>
                    <div class="cardIntro">
                        意見回報
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

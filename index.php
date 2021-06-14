<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>首頁</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        <? session_start(); include "css/main.css" ?>
    </style>
    <link rel="shortcut icon" href="logo/nuklogo.ico" type="image/x-icon">
    <script src="https://kit.fontawesome.com/f810d2bb4c.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <a href="index.php">國立高雄大學烤肉區租賃系統</a>
    </header>
    <?
    include("sql_connect.inc.php");
    ?>
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
        
            <h1>簡介</h1>
            <div class="introduce">
                
                
                <div class="area">
                    <img src="imgs\bbq.jpg" alt="">
                    <div class="introInner">
                        <div class="introTitle">
                        <h2>烤肉區</h2>
                        </div>
                        <div class="introText">
                            爐位數量 : 8<br/>
                            開放時間 : 08:00 至 22:00<br/>
                            收費方式 : 每 4 小時為 1 時段<br/>
                            收費標準 : 校內300元／爐、校外600元／爐<br/>
                            提供設備 : 提供水電、洗手間及夜間照明<br/>
                        </div>
                    </div>
                </div>
                <div class="clearFix"></div>
                <div class="area">
                    <img src="imgs\camp.jpg" alt="">
                    <div class="introInner">
                        <div class="introTitle">
                        <h2>露營區</h2>
                        </div>
                        <div class="introText">
                            營位數量 : 12<br/>
                            開放時間 : 12：30 至翌日 11：30<br/>
                            收費方式 : 以借用營位數量計收<br/>
                            收費標準 : 校內300元／營、校外600元／營<br/>
                            提供設備 : 提供水電、洗手間及夜間照明<br/>
                        </div>
                    </div>
                </div>
                <div class="clearFix"></div>
                <div class="area">
                    <img src="imgs\washBody.jpg" alt="">
                    <div class="introInner">
                        <div class="introTitle">
                        <h2>盥洗區</h2>
                        </div>
                        <div class="introText">
                            對於想要使用本設施的校內校外人士，本校提供有專人打掃的盥洗設備<br>
                            盥洗室內未配備沐浴乳、毛巾等必備梳洗用品，請使用者自行攜帶</br>
                            請使用者在使用後，維持環境整潔，讓下一位使用者也有良好的環境，謝謝</br>
                        </div>
                    </div>
                </div>
                
                
            </div><!-- introduce end -->
    </div><!-- container end -->
    <div class="clearFix"></div>
    <footer>
        <div class="address">
            <a href="https://www.nuk.edu.tw/">國立高雄大學</a>
            <a href="index.php">烤肉區租賃系統</a>
            <p>811726 高雄市楠梓區高雄大學路700號</p>
            <p>700, Kaohsiung University Rd., Nanzih District, Kaohsiung 811, Taiwan, R.O.C.</p>
            <p>© 2020 高雄大學 National University of Kaohsiung</p>

        </div>
    </footer>
</body>
</html>
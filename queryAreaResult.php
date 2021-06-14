<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>查詢場地結果</title>
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
        <?
        include("sql_connect.inc.php");
        ?>
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
    <?
    date_default_timezone_set('Asia/Taipei');

    $day1=$_POST["campDateStart"];
    $day2=$_POST["campDateEnd"];
    $hour1=$_POST["bbqTimeStart"];
    $hour2=$_POST["bbqTimeEnd"];

    $campDateStart  = new DateTime("$day1");
    $campDateEnd    = new DateTime("$day2");
    $bbqTimeStart  = new DateTime();
    $bbqTimeEnd    = new DateTime();

    $campDateStart ->setTime(0,0);
    $campDateEnd   ->setTime(0,0);
    $bbqTimeStart ->setTime("$hour1",0);
    $bbqTimeEnd   ->setTime("$hour2",0);

    $day1=(int)$campDateStart->format('d');
    $day2=(int)$campDateEnd->format('d');

    if($campDateEnd<$campDateStart)
    {
        echo "查詢日期填寫錯誤。";
        echo '<meta http-equiv=REFRESH CONTENT=1;url=queryArea.php>';
    }
    else if($bbqTimeEnd<$bbqTimeStart)
    {
        echo "查詢時間填寫錯誤。";
        echo '<meta http-equiv=REFRESH CONTENT=1;url=queryArea.php>';
    }
    else if ($day2-$day1>10)
    {
        echo "查詢日數上限為一次10日。";
        echo '<meta http-equiv=REFRESH CONTENT=1;url=queryArea.php>';
    }
    else
    {
    ?>
    <div class="container">
        <div class="queryAreaResult">
        <?
        for($i=0;$i<$day2-$day1+1;$i++){
        ?>
            <table>
                <thead>
                    <tr>
                        <th>查詢日期</th>
                        <th>剩餘營位</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                        <?
                            echo $campDateStart->format('Y-m-d');
                        ?>
                        </td>
                        <td>
                        <?
                            //日期
                            $str1=$campDateStart->format('Y-m-d');
                            $str1=$str1.'%';
                            $result=mysql_query
                            ("
                                 SELECT SUM(`camp_quantity`)
                                 FROM `renter_af`
                                 WHERE `use_date`
                                 LIKE '".$str1."' "
                            );
                            $row=mysql_fetch_row($result);
                            //印出剩餘營位的數量
                            echo 12-$row[0];
                        ?>
                        </td>
                    </tr>
                </tbody>
            </table>

            <table>
                <thead>
                    <tr>
                        <th>當日時段</th>
                        <th>剩餘爐位</th>
                    </tr>
                </thead>
                <tbody>
                <?
                    //時段
                    //建立占用資訊的陣列
                    $bbqHoursFill=[];   //佔用情形的陣列 早上8點=[0]
                    for ($x=0;$x<14;$x++) {
                        //陣列初始化
                        $bbqHoursFill[$x]=0;
                    }
                    $result=mysql_query
                    ("
                    SELECT `time_start`,`time_end`,`bbq_quantity`
                    FROM `renter_af` NATURAL JOIN `bbq_af`
                    WHERE `use_date` LIKE '".$str1."'
                    AND `payoff_status`!=2 "
                    );
                    while ($row = mysql_fetch_assoc($result)) {
                        //從資料庫抓多列
                        $fillStart=$row["time_start"];
                        $fillStart=new DateTime("$fillStart");
                        $fillStart=(int)$fillStart->format('H');
                        $fillStart=$fillStart-8;

                        $fillEnd=$row["time_end"];
                        $fillEnd=new DateTime("$fillEnd");
                        $fillEnd=(int)$fillEnd->format('H');
                        $fillEnd=$fillEnd-8;
                        for ($x=$fillStart;$x<$fillEnd;$x++) {
                            //將被佔用爐數填入各個時段
                            $bbqHoursFill[$x]=$bbqHoursFill[$x]+$row["bbq_quantity"];
                        }
                    }

                        //用占用資訊的陣列來查詢烤肉時段可用的爐數
                    $bbqTimeStart ->setTime("$hour1",0);  //每次回圈必須從相同的起始時間開始
                    for ($j=$hour1;$j<=min($hour2,18);$j++) //查詢時段時頭尾皆數
                    {
                    ?>
                    <tr>
                        <td>
                        <?
                            //印出查詢的每個時段
                            echo $bbqTimeStart->format('H:i');
                            echo "~";
                            $bbqTimeStart->modify('+4 hours');
                            echo $bbqTimeStart->format('H:i');
                            $bbqTimeStart->modify('-3 hours');
                        ?>
                        </td>
                        <td>
                        <?
                            //總共有8個爐位 剩餘的爐位=8-佔用的爐位
                            //從起始的查詢時段 index根據j遞增 早上8點=[0]
                            echo ( 8 - $bbqHoursFill[$j-8]);
                        ?>
                        </td>
                    </tr>
                    <?
                    }
                    ?>
                </tbody>
            </table>
        <?
            $campDateStart->modify("+1 day");
        }
    }
    ?>

        </div>
    </div>
    <!-- container end -->
</body>
</html>
<html>
<head>
    <meta charset='utf8'>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>申請結果後端</title>
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
    if($_SESSION['id']!=null){
    ?>



    <header>
        <a href="index.php">國立高雄大學烤肉區租賃系統</a>
    </header>
    <?

    $applicantName=$_POST["applicantName"];
    $peopleQuantity=$_POST["peopleQuantity"];
    $bbqQuantity=$_POST["bbqQuantity"];
    $campQuantity=$_POST["campQuantity"];
    $uniformID=$_POST["uniformID"];
    $taxID=$_POST["taxID"];
    $phone=$_POST["phone"];
    $address=$_POST["address"];
    $receiptName=$_POST["receiptName"];

    //時間、日期處理
    date_default_timezone_set('Asia/Taipei');

    $day1=$_POST["useDate"];
    $hour1=$_POST["bbqTimeStart"];
    $hour2=$_POST["bbqTimeEnd"];

    if     ( ($hour2-$hour1)%4 == 1 ) $hour2=$hour2+3;
    else if( ($hour2-$hour1)%4 == 2 ) $hour2=$hour2+2;
    else if( ($hour2-$hour1)%4 == 3 ) $hour2=$hour2+1;
    if($hour2>22) $hour2=22;

    $serverTime     = new DateTime();
    $campDate       = new DateTime("$day1");
    $bbqTimeStart   = new DateTime("$day1");
    $bbqTimeEnd     = new DateTime("$day1");
    $campDate       ->setTime(0,0);
    $bbqTimeStart   ->setTime("$hour1",0);
    $bbqTimeEnd     ->setTime("$hour2",0);

    //檢查不正確的輸入
    if          //檢查人數
    (
        $bbqQuantity==0&&$campQuantity==0
    )
    {
        echo "兩個都是0你在搞屁。";
        echo '<meta http-equiv=REFRESH CONTENT=1;url=apply.php>';
    }else if($peopleQuantity<=0){
        echo "總人數需要至少1人";
        echo '<meta http-equiv=REFRESH CONTENT=1;url=apply.php>';
    }
    else if     //檢查租用日期相關
    (
        $campDate<$serverTime
    )
    {
        echo "填寫租用日期有誤，請重新提交。";
        echo '<meta http-equiv=REFRESH CONTENT=1;url=apply.php>';
    }
    else
    {
        if($bbqQuantity==0&&$campQuantity>0)$applicationFormType=1;//只借露營
        else if($bbqQuantity>0&&$campQuantity==0)$applicationFormType=2;//只借烤肉
        else $applicationFormType=3;//都借

        if          //檢查烤肉時段是否填錯
        (
            (
                $applicationFormType==2 ||
                $applicationFormType==3
            )
            &&
            (
                ($bbqTimeEnd<$bbqTimeStart) ||
                ($bbqTimeStart<$serverTime)
            )
        )
        {
            //echo $applicationFormType."<br>";
            //echo $bbqTimeStart->format('Y-m-d H:i:s')."<br>";
            //echo $bbqTimeEnd->format('Y-m-d H:i:s')."<br>";
            //echo $serverTime->format('Y-m-d H:i:s')."<br>";
            echo "填寫烤肉時間有誤，請重新提交。";
            echo '<meta http-equiv=REFRESH CONTENT=1;url=apply.php>';
        }
        else
        {
            //查詢填寫的日期與時段查是否還有空的營位或爐位（若無錯誤則提交表單到資料庫）
            $campFlag=0;    //1:沒位子 0:有位子
            $bbqFlag=0;



            //日期
            $str1=$campDate->format('Y-m-d');
            $str1=$str1.'%';
            $result=mysql_query
            (" SELECT SUM(`camp_quantity`)
                     FROM `renter_af`
                     WHERE `use_date` LIKE '".$str1."'
                     AND `payoff_status`!=2"
            );
            $row=mysql_fetch_row($result);
            //營位不足
            $campAvailable=12-$row[0];      //剩餘的營位
            if($campAvailable-$campQuantity<0){
                $campFlag=1;
            }



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

            //用占用資訊的陣列來檢查爐數是否足夠
            for ($x=$hour1-8;$x<$hour2-8;$x++){
                if(8-$bbqHoursFill[$x]-$bbqQuantity<=0){
                    $bbqFlag=1;
                }
            }



            //營位或爐位不足
            if($campFlag==1){
                echo "您申請的日期(";
                echo $campDate->format('Y-m-d');
                echo ")營位數不足，請先利用『場地查詢』確定欲申請日是否有足夠的營位。"."<br>";
            }
            if($bbqFlag==1){
                echo "您申請的時段(";
                echo $bbqTimeStart->format('H:i');
                echo "~~";
                echo $bbqTimeEnd->format('H:i');
                echo ")在某些區間的爐位數不足，請先利用『場地查詢』確定欲申請時段是否有足夠的爐位。"."<br>";
            }
            if($campFlag||$bbqFlag)
            {
                ?>
                <div class="container">
                    <div class="applyForm">
                        <table>
                            <thead>
                            <tr>
                                <th>申請日期</th>
                                <th>申請營位</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <?
                                    echo $campDate->format('Y-m-d');
                                    ?>
                                </td>
                                <td>
                                    <?
                                    echo $campQuantity
                                    ?>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <table>
                            <thead>
                            <tr>
                                <th>申請時段</th>
                                <th>申請爐位</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <?
                                    echo $bbqTimeStart->format('H:i');
                                    echo "~";
                                    echo $bbqTimeEnd->format('H:i');
                                    ?>
                                </td>
                                <td>
                                    <?
                                    echo $bbqQuantity;
                                    ?>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div><!--applyFormEnd-->

                    <div class="queryForm">
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
                                    echo $campDate->format('Y-m-d');
                                    ?>
                                </td>
                                <td>
                                    <?
                                    echo $campAvailable
                                    ?>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <table>
                            <thead>
                            <tr>
                                <th>查詢時段</th>
                                <th>剩餘爐位</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?
                            //$bbqTimeStart ->setTime("$hour1",0);  //每次回圈必須從相同的起始時間開始
                            for ($j=$hour1;$j<=min($hour2-1,18);$j++)  //最後一個時段剛好是結束時間 -1
                            {
                                ?>
                                <tr>
                                    <td>
                                        <?
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
                    </div><!--queryFormEnd-->
                </div><!--containerEnd-->
                <?
            }
            else    //查詢後確認沒有衝突 提交申請表單到資料庫
            {
                $id=$_SESSION['id'];
                $str1=$serverTime->format('YmdHis');
                $str2=$campDate->format('YmdHis');
                $str3=$str1.$id;  //af_id

                //算價錢
                $row=mysql_fetch_row    //租賃人直接申請
                (
                    mysql_query
                    ("
                        SELECT `type`
                        FROM `renter`
                        WHERE `account`='".$id."' "
                    )
                );
                if($_SESSION['authority']>=2) $type=$_POST["type"]; //承辦人協助申請
                else $type=$row[0];

                if($campQuantity>0)$campMoney=$campQuantity*(($type+1)*300);
                else $campMoney=0;
                $bbqMoney=((int)(($hour2-$hour1)/4))*$bbqQuantity*(($type+1)*300);
                $money=$campMoney+$bbqMoney;

                $sql=" INSERT INTO `renter_af` VALUES
                       (
                            '".$str3."',
                            '',
                            '".$id."',
                            '".$applicantName."',
                            '".$peopleQuantity."',
                            '".$str1."',
                            '".$bbqQuantity."',
                            '".$campQuantity."',
                            '".$money."',
                            '0',
                            '".$str2."',
                            '".$applicationFormType."',
                            '0',
                            '0'
                      )";
                mysql_query($sql) or die("無法連接資料庫。".mysql_error());

                $str1=$bbqTimeStart->format('YmdHis');
                $str2=$bbqTimeEnd->format('YmdHis');

                $sql=" INSERT INTO `bbq_af` VALUES
                       (
                            '".$str3."',
                            '".$str1."',
                            '".$str2."'
                       )";
                mysql_query($sql) or die("無法連接資料庫。".mysql_error());

                $sql=" UPDATE `renter` SET
                       `addr`='".$address."',
                       `phone`='".$phone."',
                       `tax_id`='".$taxID."',
                       `receipt_name`='".$receiptName."',
                       `uniform_id`='".$uniformID."'   
                       WHERE `account`='".$id."'                
                       ";
                mysql_query($sql) or die("無法連接資料庫。".mysql_error());
                echo "申請成功";
                echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
            }
        }
    }



    }
    else{
        echo "您尚未登入。";
        echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
    }
    ?>
    </body>
</html>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>申請紀錄</title>

    <link rel="stylesheet" href="css\main.css">
    <link rel="shortcut icon" href="logo/nuklogo.ico" type="image/x-icon">
    <style>
        <? session_start(); include "css/main.css" ?>
    </style>
    <script src="https://kit.fontawesome.com/f810d2bb4c.js" crossorigin="anonymous"></script>
</head>

<body>
 <?
    include("sql_connect.inc.php");
    if
    (
            $_SESSION['id']!=null&&
            ($_SESSION['authority']==0||$_SESSION['authority']==1)
    )
    {



        date_default_timezone_set('Asia/Taipei');
?>
    <header>
        <a href="index.php">國立高雄大學烤肉區租賃系統</a>

    </header>
    <div class="container">
        <div class="historyRenterArea">
            <table>
                <thead>
                <tr>
                    <td>審核狀態</td>
                    <td>使用日期</td>
                    <td>露營區數量</td>
                    <td>烤肉區數量</td>
                    <td>烤肉區使用時段</td>
                    <td>租賃人姓名</td>
                    <td>總人數</td>
                    <td>總價格</td>
                </tr>
                </thead>
                <tbody>
                <?
                    $id=$_SESSION['id'];
                    $serverTime = new DateTime();
                    $str=$serverTime->format("Y-m-d H:i:s");
                    $result=mysql_query
                    ("
                         SELECT *
                         FROM `renter_af` NATURAL JOIN `bbq_af`
                         WHERE `renter_account`='".$id."' AND `time_end`<'".$str."'
                         ORDER BY `use_date`,`time_start`"
                    );
                    while ($row = mysql_fetch_assoc($result))
                    {
                    //從資料庫抓多列
                ?>
                    <tr>
                        <td>
                        <?
                            if($row['payoff_status']==0) echo "還不付錢啊？";
                            else if($row['apply_refund']==2) echo "退費審核通過";
                            else if($row['apply_refund']==3) echo "退費審核不通過";
                            else if($row['payoff_status']==1) echo "審核通過記得來烤肉。";
                            else if($row['payoff_status']==2) echo "審核不通過，請聯絡承辦人。";
                        ?>
                        </td>
                        <td>
                        <?
                            $str=$row['use_date'];
                            $time=new DateTime("$str");
                            echo $time->format("Y-m-d");
                        ?>
                        </td>
                        <td>
                        <?
                            echo $row['camp_quantity'];
                        ?>
                        </td>
                        <td>
                        <?
                            echo $row['bbq_quantity'];
                        ?>
                        </td>
                        <td>
                        <?
                            $str=$row['time_start'];
                            $time=new DateTime("$str");
                            echo $time->format("H:i");
                            echo "~";
                            $str=$row['time_end'];
                            $time=new DateTime("$str");
                            echo $time->format("H:i");
                        ?>
                        </td>
                        <td>
                        <?
                            echo $row['applicant'];
                        ?>
                        </td>
                        <td>
                        <?
                            echo $row['people_quantity'];
                        ?>
                        </td>
                        <td>
                        <?
                            echo $row['sum_price'];
                        ?>
                        </td>
                    </tr>
                    <?
                    }
                    ?>
            </table>
        </div><!--confirmApplyEnd-->
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>歷史申請</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css">
    <style>
        <? session_start(); include "css/main.css" ?>
    </style>
    <link rel="shortcut icon" href="logo/nuklogo.ico" type="image/x-icon">
    <script src="https://kit.fontawesome.com/f810d2bb4c.js" crossorigin="anonymous"></script>
</head>

<body>
    <?
    include("sql_connect.inc.php");
    if(1){//$_SESSION['id']!=null&&$_SESSION['authority']==2



        date_default_timezone_set('Asia/Taipei');
?>
    <header>
        <a href="index.php">國立高雄大學烤肉區租賃系統</a>
    </header>
    <div class="container">
        <div class="historyApplyArea">
            <h1>歷史申請</h1>
            <table>
                <thead>
                <tr>
                    <th>審核狀態</th>
                    <th>使用日期</th>
                    <th>露營區數量</th>
                    <th>烤肉區數量</th>
                    <th>烤肉區使用時段</th>
                    <th>租賃人姓名</th>
                    <th>總人數</th>
                    <th>總價格</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?
                    $result=mysql_query
                    ("
                        SELECT *
                        FROM `renter_af` NATURAL JOIN `bbq_af`
                        ORDER BY `use_date`,`time_start`"
                    );
                    while ($row = mysql_fetch_assoc($result))
                    {
                        //從資料庫抓多列
                ?>
                    <tr>
                    <td>
                    <?
                        if($row['payoff_status']==0) echo "沒繳錢";
                        else if($row['payoff_status']==1) echo "審核通過";
                        else if($row['payoff_status']==2) echo "因故審核不通過";
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
                    <td>
                        <a href="editApply.php?af_id=xxx">編輯</a>
                        <a href="editApply.php?af_id=xxx">刪除</a><!--記得xx放訂單的afid-->
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
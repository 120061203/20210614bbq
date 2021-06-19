<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>我的申請</title>

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
    if($_SESSION['id']!=null&&$_SESSION['authority']==1)
    {



        date_default_timezone_set('Asia/Taipei');
?>
    <header>
        <a href="index.php">國立高雄大學烤肉區租賃系統</a>
    </header>
    <div class="container">
        <div class="myFormArea">
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
                    <td>地址</td>
                    <td>電話</td>
                    <td>收據抬頭</td>
                    <td>統一編號</td>
                    <td>操作</td>
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
                        FROM `renter_af` NATURAL JOIN `bbq_af`,`renter`
                        WHERE `renter_account`='".$id."' 
                        AND `time_end`>'".$str."' 
                        AND `renter_af`.`renter_account`=`renter`.`account`
                        ORDER BY `use_date`,`time_start`"
                    );
                    while ($row = mysql_fetch_assoc($result))
                    {
                    //從資料庫抓多列
                ?>
                    <tr>
                        <td>
                        <?  
                            if($row['apply_refund']==1) echo "退費審核中";
                            else if($row['apply_refund']==2) echo "退費審核通過";
                            else if($row['apply_refund']==3) echo "退費審核不通過";
                            if($row['payoff_status']==0) echo "未繳費";
                            else if($row['payoff_status']==1) echo "已繳費";
                            
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
                        <?
                            echo $row['addr'];
                        ?>
                        </td>
                        <td>
                        <?
                            echo $row['phone'];
                        ?>
                        </td>
                        <td>
                        <?
                            echo $row['receipt_name'];
                        ?>
                        </td>
                        <td>
                        <?
                            echo $row['uniform_id'];
                        ?>
                        </td>
                        <td>
                            <a href="applyRefund.php?af_id=<?echo $row['af_id']?>">申請退費</a>
                            <a href="generatePDF.php?af_id=<?echo $row['af_id']?>">繳費單下載</a>
                        </td>
                    </tr>
                    <?
                    }
                    ?>
                </tbody>
            </table>
        </div><!--myFormEnd-->
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
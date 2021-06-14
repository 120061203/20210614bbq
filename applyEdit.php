<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>租借編輯</title>
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
if($_SESSION['id']!=null&&($_SESSION['authority']==3))
{



date_default_timezone_set('Asia/Taipei');
?>

    <header>
        <a href="index.php">國立高雄大學烤肉區租賃系統</a>
    </header>
    <div class="container">
        <div class="applyEditArea">
            <table>
                <thead>
                    <tr>
                        <th>審核狀態</th>
                        <th>使用日期</th>
                        <th>營位數</th>
                        <th>爐位數</th>
                        <th>烤肉區使用時段</th>
                        <th>申請人姓名</th>
                        <th>統一編號</th>
                        <th>稅籍編號</th>
                        <th>連絡電話</th>
                        <th>地址</th>
                        <th>收據抬頭</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                <?
                $result=mysql_query
                ("
                        SELECT *
                        FROM `renter_af` NATURAL JOIN `bbq_af`,`renter` 
                        WHERE `renter_account`=`account` "
                );
                while ($row = mysql_fetch_assoc($result))
                {
                ?>
                    <tr>
                        <td>
                        <?
                            if($row['payoff_status']==0) echo "沒繳錢";
                            else if($row['payoff_status']==1) echo "通過";
                            else if($row['payoff_status']==2) echo "不通過";
                        ?>
                        </td>
                        <td>
                        <?
                            $campDateStart=$row['use_date'];
                            $campDateStart  = new DateTime("$campDateStart");
                            echo $campDateStart->format("Y-m-d");
                        ?>
                        </td>
                        <td>
                            <?echo $row['camp_quantity']?>
                        </td>
                        <td>
                            <?echo $row['bbq_quantity']?>
                        </td>
                        <td>
                            <?
                            $bbqTimeStart=$row['time_start'];
                            $bbqTimeStart=new DateTime("$bbqTimeStart");
                            $bbqTimeStart=$bbqTimeStart->format("H:i");
                            $bbqTimeEnd=$row['time_end'];
                            $bbqTimeEnd=new DateTime("$bbqTimeEnd");
                            $bbqTimeEnd=$bbqTimeEnd->format("H:i");
                            echo $bbqTimeStart."~".$bbqTimeEnd;
                            ?>
                        </td>
                        <td>
                            <?echo $row['applicant']?>
                        </td>
                        <td>
                            <?echo $row['uniform_id']?>
                        </td>
                        <td>
                            <?echo $row['tax_id']?>
                        </td>
                        <td>
                            <?echo $row['phone']?>
                        </td>
                        <td>
                            <?echo $row['addr']?>
                        </td>
                        <td>
                            <?echo $row['receipt_name']?>
                        </td>
                        <td>
<!--                            <form  method="post" action="applyUpdate.php">-->
<!--                                <button name="afid" value="--><?//echo $row['af_id'];?><!--" type="submit">編輯</button>-->
<!--                            </form>-->
<!--                            <form  method="post" action="applyDelete.php">-->
<!--                                <button name="afid" value="--><?//echo $row['af_id'];?><!--" type="submit">刪除</button>-->
<!--                            </form>-->
                            <a href="applyUpdate.php?afid=<?echo $row['af_id']?>">編輯</a>
                            <a href="applyDelete.php?afid=<?echo $row['af_id']?>">刪除</a>
                        </td>
                    </tr>
                <?
                }
                ?>
                </tbody>
            </table>
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
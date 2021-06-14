<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>審核頁面</title>

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
    if($_SESSION['id']!=null&&$_SESSION['authority']==2){



        date_default_timezone_set('Asia/Taipei');
?>
    <header>
        <a href="index.php">國立高雄大學烤肉區租賃系統</a>
    </header>
    <div class="container">
        <div class="confirmApplyArea">
            <table>
                <thead>
                <tr>
                    <th>時間戳記</th><!--time_stamp-->
                    <th>申請人帳號</th><!--renter_account-->
                    <th>租賃人姓名</th><!--applicant-->
                    <th>總人數</th><!--people_quantity-->
                    <th>烤肉區數量</th><!--bbq_quantity-->
                    <th>露營區數量</th><!--camp_quantity-->
                    <th>總價格</th><!--sum_price-->
                    <th>使用日期</th><!--use_date-->
                </tr>
                </thead>
                <tbody>
                <?
                    $result=mysql_query
                    ("
                    SELECT *
                    FROM `renter_af` NATURAL JOIN `bbq_af`
                    WHERE `payoff_status`=0
                    ORDER BY `use_date`,`time_start`"
                    );
                    while ($row = mysql_fetch_assoc($result))
                    {
                    //從資料庫抓多列
                ?>
                    <tr>
                        <td>
                        <?
                            $str = $row["time_stamp"];
                            $time=new DateTime("$str");
                            echo $time->format("Y-m-d")."<br>";
                            echo $time->format("H:i:s");
                        ?>
                        </td>
                        <td>
                        <?
                            echo $row["renter_account"];
                        ?>
                        </td>
                        <td>
                        <?
                            echo $row["applicant"];
                        ?>
                        </td>
                        <td>
                        <?
                            echo $row["people_quantity"];
                        ?>
                        </td>
                        <td>
                        <?
                            echo $row["bbq_quantity"];
                        ?>
                        </td>
                        <td>
                        <?
                            echo $row["camp_quantity"];
                        ?>
                        </td>
                        <td>
                        <?
                            echo $row["sum_price"];
                        ?>
                        </td>
                        <td>
                        <?
                            $str=$row["use_date"];
                            $time=new DateTime("$str");
                            echo $time->format("Y-m-d");
                        ?>
                        </td>
                    </tr>
                    <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <div class="confirmButton">
                            <div class="yes">
                                <a href="confirmApplyAccept.php?afid=<? echo $row["af_id"]; ?>"><i class="fas fa-check"></i></a>
                            </div>
                            <div class="no">
                                <a href="confirmApplyDeny.php?afid=<? echo $row["af_id"]; ?>"><i class="fas fa-times"></i></a>
                            </div>
                        </div>
                    </td>
                </tr>
            <?
            }
            ?>
            </tbody>
            </table>
        </div><!--confirmApplyAreaEnd-->
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
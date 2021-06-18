<html>
<head>
    <title>審核通過</title>
</head>
<body>
    <?
        session_start();
        include("sql_connect.inc.php");
        if($_SESSION['id']!=null&&$_SESSION['authority']==2) {



            $renterAccount=$_SESSION['id'];
            $afid=$_GET["afid"];

            if
            (
                mysql_query
                (
                      "
                    UPDATE `renter_af`
                    SET `undertaker_account`='".$renterAccount."',`apply_refund`=2
                    WHERE `af_id`='".$afid."' "
                )
            )
            {
                echo "申請ID:\"";
                echo $_GET["afid"];
                echo "\"審核通過。";
                echo '<meta http-equiv=REFRESH CONTENT=1;url=confirmRefund.php>';
            }
            else echo "無法連接資料庫。";
            }



        else
        {
            echo "您尚未登入。";
            echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
        }
    ?>
</body>
</html>
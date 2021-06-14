<html>
<head>
    <title>申請刪除結果</title>
</head>
<body>
<?
session_start();
include("sql_connect.inc.php");
if($_SESSION['id']!=null&&($_SESSION['authority']==3))
{



    session_start();
    include("sql_connect.inc.php");



    $afid=$_GET['afid'];
            mysql_query
            (
                "
                DELETE
                FROM `renter_af`
                WHERE `af_id`='".$afid."' "
            ) or die("無法連接資料庫。".mysql_error());
            mysql_query
            (
                "
                DELETE
                FROM `bbq_af`
                WHERE `af_id`='".$afid."' "
            ) or die("無法連接資料庫。".mysql_error());
            echo "刪除成功。";
            echo "<meta http-equiv=REFRESH CONTENT=1;url=applyEdit.php>"; //Form




}
else
{
    echo "您尚未登入。";
    echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
}
?>
</body>
</html>
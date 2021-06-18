<html>
<head>
    <title>申請退費結果</title>
</head>
<body>
<?
session_start();
include("sql_connect.inc.php");
if($_SESSION['id']!=null&&($_SESSION['authority']==1))
{



    session_start();
    include("sql_connect.inc.php");



    $afid=$_GET['af_id'];
    echo $afid;
            mysql_query
            (
                "
                UPDATE `renter_af`
                SET apply_refund = 1 
                WHERE `af_id`='".$afid."' "
            ) or die("無法連接資料庫。".mysql_error());
            
            echo "申請退費成功。";
            echo "<meta http-equiv=REFRESH CONTENT=1;url=renter.php>"; //Form




}
else
{
    echo "您尚未登入。";
    echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
}
?>
</body>
</html>
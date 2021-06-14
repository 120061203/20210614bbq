<html>
<head>
    <title>帳號刪除結果</title>
</head>
<body>
<?
session_start();
include("sql_connect.inc.php");
if($_SESSION['id']!=null&&($_SESSION['authority']==3))
{



        $account = $_GET['account'];
        mysql_query
        (
            "
                DELETE
                FROM `user`
                WHERE `account`='" . $account . "' "
        ) or die("無法連接資料庫。" . mysql_error());
        mysql_query
        (
            "
                DELETE
                FROM `renter`
                WHERE `account`='" . $account . "' "
        ) or die("無法連接資料庫。" . mysql_error());
        echo "刪除成功。";
        echo "<meta http-equiv=REFRESH CONTENT=1;url=userEdit.php>";    //改成userForm



}
else
{
    echo "您尚未登入。";
    echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
}
?>
</body>
</html>
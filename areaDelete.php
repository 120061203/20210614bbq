<html>
<head>
    <title>場地刪除結果</title>
</head>
<body>
<?
session_start();
include("sql_connect.inc.php");
#$_SESSION['id']!=null&&($_SESSION['authority']==3)S
if($_SESSION['id']!=null&&($_SESSION['authority']==3))
{



        $area_id = $_GET['area_id'];
        mysql_query
        (
            "
                DELETE
                FROM `area`
                WHERE area_id ='" . $area_id . "' "
        ) or die("無法連接資料庫。" . mysql_error());
        echo "刪除成功。";
        echo "<meta http-equiv=REFRESH CONTENT=1;url=areaManage.php>";    //改成userForm

}
else
{
    echo "您尚未登入。";
    echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
}
?>
</body>
</html>
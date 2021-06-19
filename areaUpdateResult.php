<html>
<head>
    <title>修改場地</title>
</head>
<body>
<?
session_start();
include("sql_connect.inc.php");
#$_SESSION['id']!=null&&$_SESSION['authority']==3
if($_SESSION['id']!=null&&$_SESSION['authority']==3)
{

    $areaType = $_POST["areaType"];
    $priceIn = $_POST["priceIn"];
    $priceOut = $_POST["priceOut"];
    $areaId = $_POST["areaId"];
    

    $sql1 = " UPDATE area SET `area_type` = '$areaType',`price_in` = '$priceIn',`price_out` = '$priceOut' WHERE `area_id` = '$areaId' ";
    mysql_query($sql1) or die("無法連接資料庫:".mysql_error());


    echo "修改場地成功";
    echo '<meta http-equiv=REFRESH CONTENT=1;url=areaManage.php>';

}
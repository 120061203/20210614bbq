<html>
<head>
    <title>新增場地</title>
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

    $sql1 = " SELECT MAX(`area_id`) FROM `area` ";
    $areaIdArr = mysql_fetch_array(mysql_query($sql1));
    #echo "Max_id:".$announce_id_arr[0];
    $areaMaxId = $areaIdArr[0] + 1;
    
    

    $sql2 = " INSERT INTO area(`area_id`,`area_type`,`price_in`,`price_out`) VALUES ('".$areaMaxId."','".$areaType."','".$priceIn."','".$priceOut."') ";
    mysql_query($sql2) or die("無法連接資料庫:".mysql_error());

    echo "新增場地成功";
    echo '<meta http-equiv=REFRESH CONTENT=1;url=areaManage.php>';

}
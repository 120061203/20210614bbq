<html>
<head>
    <title>新增公告</title>
</head>
<body>
<?
session_start();
include("sql_connect.inc.php");

if($_SESSION['id']!=null&&$_SESSION['authority']==3)
{



    $announce_title = $_POST["announce_title"];
    $announce_content = $_POST["announce_content"];

    #echo "title:".$announce_title."\n";
    #echo "content:".$announce_content."\n";
    $sql1 = " SELECT MAX(`announce_id`) FROM `announce` ";
    $announce_id_arr = mysql_fetch_array(mysql_query($sql1));
    #echo "Max_id:".$announce_id_arr[0];
    $announceMax_id = $announce_id_arr[0] + 1;
    #echo "Max_id:".$announceMax_id."\n";
    
    $sql2 = " INSERT INTO announce(`announce_id`,`announce_title`,`announce_content`) VALUES ('".$announceMax_id."','".$announce_title."','".$announce_content."') ";
    mysql_query($sql2) or die("無法連接資料庫:".mysql_error());

    echo "新增公告成功";
    echo '<meta http-equiv=REFRESH CONTENT=1;url=admin.php>';

}
else
{
    echo "您尚未登入。";
    echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
}
?>
</body>
</html>
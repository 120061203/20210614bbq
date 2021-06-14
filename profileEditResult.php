<html>
<head>
    <title>資料修改結果</title>
</head>
<body>
<?
session_start();
include("sql_connect.inc.php");
if($_SESSION['id']!=null&&$_SESSION['authority']<=2) {


    $id = $_SESSION['id'];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    //檢查是不是有其中一個以上沒輸入任何東西
    $sql = " UPDATE `user`
        SET `password`='" . $password . "', `name`= '" . $name . "', `email`='" . $email . "'
        WHERE `account`= '" . $id . "' ";
    if (mysql_query($sql)) {
        echo "資料修改成功。";
        if($_SESSION['authority']==2){
            echo '<meta http-equiv=REFRESH CONTENT=1;url=undertaker.php>';
        }
        else if($_SESSION['authority']==1){
            echo '<meta http-equiv=REFRESH CONTENT=1;url=renter.php>';
        }
    } else echo "無法連接資料庫。";



}
else
{
    echo "您尚未登入。";
    echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
}
?>
</body>
</html>
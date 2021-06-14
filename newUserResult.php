<html>
<head>
    <title>大量新增結果</title>
</head>
<body>
<?
session_start();
include("sql_connect.inc.php");
if($_SESSION['id']!=null&&$_SESSION['authority']==3)
{



    $type = $_POST["type"];
    $accountFirst = $_POST["accountFirst"];
    $accountQuantity = $_POST["accountQuantity"];
    $password = $_POST["password"];

    if ($accountQuantity < 1 || $accountQuantity > 99) {
        echo "數量輸入錯誤（最少1最多99）。";
        echo '<meta http-equiv=REFRESH CONTENT=1;url=newUser.php>';
    } else {
        for ($num = 1; $num <= $accountQuantity; $num++) {

            if ($num < 10) $accountLast = "0" . (string)$num;
            else $accountLast = (string)$num;
            $account = $accountFirst . $accountLast;
            $name = $accountFirst ."-". (string)$num . '號';
            if ($type == 0) $email = $account . '@mail.nuk.edu.tw';
            else $email = "";

            $sql1 = " INSERT INTO `user` VALUES ('".$account."','".$password."','1','".$name."','".$email."') ";
            mysql_query($sql1) or die("無法連接資料庫:".mysql_error());
            $sql2 = " INSERT INTO renter(`account`,`type`) VALUES ('".$account."','".$type."') ";
            mysql_query($sql2) or die("無法連接資料庫:".mysql_error());
            echo $account."註冊成功。".'<br>';
            echo '<meta http-equiv=REFRESH CONTENT=1;url=admin.php>';
        }
    }


}
else
{
    echo "您尚未登入。";
    echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
}
?>
</body>
</html>
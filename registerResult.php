<html>
<head>
    <title>註冊結果</title>
</head>
<body>
<?
include("sql_connect.inc.php");
if($_SESSION['id']==null){



            include("sql_connect.inc.php");
            $account=$_POST["account"];
            $password=$_POST["password"];
            $name=$_POST["name"];
            $email=$_POST["email"];

            $sql = " SELECT * FROM `user` where `account` = '$account' ";
            $row = @mysql_fetch_row(mysql_query($sql));

            if($row[0]==$account)   //檢查有沒有重複的帳號
            {
                echo "此帳號已經註冊過了。";
                echo "<meta http-equiv=REFRESH CONTENT=2;url=register.php>";
            }
            else
            {
                $sql1="INSERT INTO `user` VALUES ('".$account."','".$password."','1','".$name."','".$email."')";
                mysql_query($sql1) or die("無法連接資料庫: " . mysql_error( ));
                $sql2="INSERT INTO renter(`account`,`type`) VALUES ('".$account."','1')";
                mysql_query($sql2) or die("無法連接資料庫: " . mysql_error( ));

                echo "註冊成功。";
                echo "<meta http-equiv=REFRESH CONTENT=2;url=login.php>";
            }



}
else
{
    echo "已登入。";
    echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
}
?>
</body>
</html>

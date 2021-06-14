<html>
<head>
    <title>大量註冊</title>
    <link rel="shortcut icon" href="logo/nuklogo.ico" type="image/x-icon">
</head>
<body>
<?
include("sql_connect.inc.php");
$class='a107550';
for($num=1;$num<=9;$num++) {
    $account =$class.(string)$num;
    $password='000';
    $name='資工系'.(string)$num.'號';
    $email=$account.'@mail.nuk.edu.tw';
            {
                $sql1 = "INSERT INTO `user` VALUES ('" . $account . "','" . $password . "','0','" . $name . "','" . $email . "')";
                mysql_query($sql1) or die("無法連接資料庫: " . mysql_error());
                $sql2 = "INSERT INTO renter(`account`) VALUES ('" . $account . "')";
                mysql_query($sql2) or die("無法連接資料庫: " . mysql_error());

                echo $num;
                echo "號註冊成功。".'<br>';
            }
}
?>
</body>
</html>

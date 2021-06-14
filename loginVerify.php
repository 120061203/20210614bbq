<html>
<head>
    <title>登入驗證</title>
</head>
<body>
<?php
session_start();
include("sql_connect.inc.php");

if($_SESSION['id']==null){

$account=$_POST["account"];
$password=$_POST["password"];

//帳號密碼檢查
$select_db=mysql_select_db("rent_db");
$sql=" select * from `user` where `account` = '$account' and `password`='$password' ";
$row=mysql_fetch_row(mysql_query($sql));
$login=mysql_num_rows(mysql_query($sql));
//echo $row[2];//admin = 3 undertaker = 2 renter = 1

if(!$login)
{
    echo "使用者名稱或密碼錯誤";
    echo '<meta http-equiv=REFRESH CONTENT=1;url=login.php>';
}
else if($row[2]==3){
    echo "登入成功。";
    echo '<meta http-equiv=REFRESH CONTENT=1;url=admin.php>';
    $_SESSION['id'] = $account;
    $_SESSION['authority']=$row[2];
}
else if($row[2]==2){
    echo "登入成功。";
    echo '<meta http-equiv=REFRESH CONTENT=1;url=undertaker.php>';
    $_SESSION['id'] = $account;
    $_SESSION['authority']=$row[2];
}
else if($row[2]==0||$row[2]==1){
    echo "登入成功。";
    echo '<meta http-equiv=REFRESH CONTENT=1;url=renter.php>';
    $_SESSION['id'] = $account;
    $_SESSION['authority']=$row[2];
}


}
else{
    echo "已登入。";
    echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
}
?>
</body>
</html>
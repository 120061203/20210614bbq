<html>
<head>
    <title>帳號編輯結果</title>
</head>
<body>
<?
session_start();
include("sql_connect.inc.php");
if($_SESSION['id']!=null&&($_SESSION['authority']==3)) {



    $oldAccount = $_POST['oldAccount'];
    $newAccount = $_POST['newAccount'];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $email = $_POST["email"];

    $row = mysql_num_rows
    (
        mysql_query
        (
            "
            SELECT `account`
            FROM `user`
            WHERE `account`='" . $newAccount . "'            
            "
        )
    );
    if ($row) {
        echo "帳號重複，修改失敗。";
        echo "<meta http-equiv=REFRESH CONTENT=2;url=userEdit.php>";    //From
    } else {
        $sql =
            "
                UPDATE `user`
                SET `account`='" . $newAccount . "', `password`='" . $password . "', `name`='" . $name . "', `email`='" . $email . "'
                WHERE `account`='" . $oldAccount . "'
            ";
        if (mysql_query($sql)) {
            echo "資料修改成功。";
            echo "<meta http-equiv=REFRESH CONTENT=1;url=userEdit.php>";    //改成userForm
        } else echo "無法連接資料庫。";
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>帳戶列表</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css">
    <style>
        <? session_start(); include "css/main.css" ?>
    </style>
    <link rel="shortcut icon" href="logo/nuklogo.ico" type="image/x-icon">
    <script src="https://kit.fontawesome.com/f810d2bb4c.js" crossorigin="anonymous"></script>
</head>

<body>
<?
session_start();
include("sql_connect.inc.php");
if($_SESSION['id']!=null&&($_SESSION['authority']==3))
{
?>



    <header>
        <a href="index.php">國立高雄大學烤肉區租賃系統</a>
    </header>
    <div class="container">
        <div class="userEditArea">
            <table>
                <thead>
                    <tr>
                        <th>帳號</th>
                        <th>姓名</th>
                        <th>E-mail</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                <?
                $result=mysql_query
                ("
                        SELECT *
                        FROM `user`
                        WHERE `user_authority`='1' "
                );

                while ($row = mysql_fetch_assoc($result))
                {
                    //從資料庫抓多列
                    ?>
                    <tr>
                        <td>
                            <?echo $row['account'];?>
                        </td>
                        <td>
                            <?echo $row['name']?>
                        </td>
                        <td>
                            <?echo $row['email']?>
                        </td>
                        <td>
<!--                            <form  method="post" action="userUpdate.php">-->
<!--                                <button name="account" value="--><?//echo $row['account'];?><!--" type="submit">編輯</button>-->
<!--                            </form>-->
<!--                            <form  method="post" action="userDelete.php">-->
<!--                                <button name="account" value="--><?//echo $row['account'];?><!--" type="submit">刪除</button>-->
<!--                            </form>-->
                            <a href="userUpdate.php?account=<?echo $row['account']?>">編輯</a>
                            <a href="userDelete.php?account=<?echo $row['account']?>">刪除</a>
                        </td>
                    </tr>
                    <?
                    //userUpdate改叫userEdit
                }
                ?>
                </tbody>
            </table>
            </form>
        </div>
    </div>



<?
}
else
{
echo "您尚未登入。";
echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
}
?>
</body>
</html>
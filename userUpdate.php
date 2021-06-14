<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>帳戶編輯</title>
    <link rel="stylesheet" href="css\main.css">
    <link rel="shortcut icon" href="logo/nuklogo.ico" type="image/x-icon">
    <style>
        <? session_start(); include "css/main.css" ?>
    </style>
    <script src="https://kit.fontawesome.com/f810d2bb4c.js" crossorigin="anonymous"></script>
</head>
    
<body>
<?
session_start();
include("sql_connect.inc.php");
if($_SESSION['id']!=null&&($_SESSION['authority']==3))
{



        $id=$_GET["account"];
        $row=mysql_fetch_row
        (
            mysql_query
            ("
                SELECT *
                FROM `user`
                WHERE `account`='".$id."' "
            )
        );
    ?>
    <header>
        <h1 style="position:relative;top:20px;">帳戶編輯<h1>
    </header>
        <div class="container">
            <div class="loginArea">
                <form  method="post" action="userEditResult.php">
                    <table>
                            <tbody>
                                <tr>
                                    <td ><i class="fas fa-user"></i></td>
                                    <td><input type="text" maxLength="20" size="10" name="newAccount" placeholder="帳號長度小於20字元" value="<?echo $row[0]?>" required></td>
                                    <td><input type="hidden" name="oldAccount" value="<?echo $row[0]?>"></td>
                                </tr>
                                <tr>
                                    <td><i class="fas fa-lock"></i></td>
                                    <td><input type="text" maxLength="20" size="10" name="password" placeholder="密碼長度小於20字元" value="<?echo $row[1]?>" required></td>
                                </tr>
                                <tr>
                                    <td><i class="fas fa-id-card"></i></i></td>
                                    <td><input type="text" maxLength="20" size="10" name="name" placeholder="例:丁小中" value="<?echo $row[3]?>" required></td>
                                </tr>
                                <tr>
                                    <td><i class="fas fa-envelope"></i></i></td>
                                    <td><input type="text" maxLength="100" size="20" name="email" placeholder="例:a1075501@gmail.com" value="<?echo $row[4]?>" required></td>
                                </tr>
                            </tbody>
                        </table>
                    <input type="submit" value="確認修改">
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
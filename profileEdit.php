<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>資料修改</title>
    <link rel="stylesheet" href="css\main.css">
    <link rel="shortcut icon" href="logo/nuklogo.ico" type="image/x-icon">
    <style>
        <? session_start(); include "css/main.css" ?>
    </style>
    <script src="https://kit.fontawesome.com/f810d2bb4c.js" crossorigin="anonymous"></script>
</head>
    
<body>
    <?
    include("sql_connect.inc.php");
    if($_SESSION['id']!=null&&$_SESSION['authority']<=2)
    {



        $id = $_SESSION['id'];
        $sql_query=" SELECT * FROM `user` where `account`='".$id."' ";
        $result=mysql_query($sql_query);
        $row = mysql_fetch_array($result);
    ?>
    <header>
        <h1 style="position:relative;top:20px;">個人資料修改<h1>
    </header>
        <div class="container">
            <div class="loginArea">
                <form  method="post" action="profileEditResult.php">
                    <table>
                            <tbody>
                                <tr>
                                    <td ><i class="fas fa-user"></i></td>
                                    <td ><span style="position:relativa;margin:0 20px;"><?echo $row[0]?></span></td>
                                </tr>
                                <tr>
                                    <td><i class="fas fa-lock"></i></td>
                                    <td><input type="password" maxLength="20" size="10" name="password" placeholder="請輸入新密碼" value="<?echo $row[1]?>" required></td>
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
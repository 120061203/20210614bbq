<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>意見處理</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        <? session_start(); include "css/main.css" ?>
    </style>
    <link rel="shortcut icon" href="logo/nuklogo.ico" type="image/x-icon">
    <script src="https://kit.fontawesome.com/f810d2bb4c.js" crossorigin="anonymous"></script>
</head>
    <body>
    <?
    include("sql_connect.inc.php");
    #$_SESSION['id']!=null
    if(1 == 1){



    ?>
    <header>
        <a href="index.php">國立高雄大學烤肉區租賃系統</a>
    </header>
    <?
    $id = $_SESSION['id'];
    $suggest_id = $_GET["suggest_id"];
    $sql=" SELECT * FROM `suggest` where `suggest_id`='".$suggest_id."' ";
    $rowSuggest = mysql_fetch_array(mysql_query($sql));
    $sql=" SELECT * FROM `user` where `account`='".$rowSuggest[1]."' ";   
    $rowUser = mysql_fetch_array(mysql_query($sql));
    ?>

        <div class="container">
            <div class="applyArea">
                <form action="suggestReplyResult.php" method="post">
                    <table>
                        <tbody>
                        <tr>
                            <td>用戶名稱</td>
                            <td><?echo $rowUser[3];?></td>
                        </tr>
                        <tr>
                            <td>用戶mail</td>
                            <td><?echo $rowUser[4];?></td>
                        </tr>
                        <tr>
                            <td>意見填寫</td>
                            <td><textarea name="sendContent" rows="6" cols="40" required></textarea></td>
                            <td><input type="hidden"  name="suggest_id" value=<?echo $suggest_id;?>></td>
                            <td><input type="hidden"  name="userEmail" value=<?echo $rowUser[4];?>></td>
                            <td><input type="hidden"  name="userName" value=<?echo $rowUser[3];?>></td>
                        </tr>
                        </tbody>
                    </table>
                    <input type="submit" value="送出">
                </form>
            </div><!--loginAreaEnd--> 
        </div><!--containerEnd-->
    <?
    }
    else{
        echo "您尚未登入。";
        echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
    }
    ?>

</body>
</html>

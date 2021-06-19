<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>場地新增</title>
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
    if($_SESSION['id']!=null){



    ?>
    <header>
        <a href="admin.php">國立高雄大學烤肉區租賃系統</a>
    </header>
        <div class="container">
            <div class="areaAddArea">
                <form action="areaAddResult.php" method="post">
                    <table>
                        <tbody>
                        <tr>
                            <td>場地類型</td>
                            <td><select name="areaType" >
                                    <option value="0" selected>BBQ</option>
                                    <option value="1" >Camp</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td>校內價格</td>
                            <td><input type="int" name="priceIn" ></td>
                        </tr>
                        <tr>
                            <td>校外價格</td>
                            <td><input type="int" name="priceOut"  ></td>
                        </tr>
                        </tbody>
                    </table>
                    <input type="submit" value="新增">
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

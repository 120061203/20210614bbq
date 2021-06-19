<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>場地編輯</title>
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
#$_SESSION['id']!=null&&($_SESSION['authority']==3)
if($_SESSION['id']!=null&&($_SESSION['authority']==3))
{



        $id=$_GET["area_id"];
        $row=mysql_fetch_row
        (
            mysql_query
            ("
                SELECT *
                FROM `area`
                WHERE `area_id`='".$id."' "
            )
        );
    ?>
    <header>
        <a href="admin.php">國立高雄大學烤肉區租賃系統</a>
        
    </header>
        <div class="container">
        <!-- <h1 style="position:relative;top:20px;">場地編輯<h1> -->
            <div class="areaUpdateArea">
            
                <form  method="post" action="areaUpdateResult.php">
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
                                    <td><input type="int" name="priceIn" value=<?echo $row[2]?>></td>
                                </tr>
                                <tr>
                                    <td>校外價格</td>
                                    <td><input type="int" name="priceOut" value=<?echo $row[3]?> ></td>
                                    <td><input type="hidden"  name="areaId" value=<?echo $id;?>></td>
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
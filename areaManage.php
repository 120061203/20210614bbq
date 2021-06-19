<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>場地列表</title>
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
#$_SESSION['id']!=null&&($_SESSION['authority']==3)
if($_SESSION['id']!=null&&($_SESSION['authority']==3))
{
?>



    <header>
        <a href="admin.php">國立高雄大學烤肉區租賃系統</a>
    </header>
    <div class="container">
        <div class="userEditArea">
            <table>
                <thead>
                    <tr>
                        <th>場地ID</th>
                        <th>場地類型</th>
                        <th>校內價格</th>
                        <th>校外價格</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                <?
                $result=mysql_query
                ("
                        SELECT *
                        FROM `area`
                        "
                );

                while ($row = mysql_fetch_assoc($result))
                {
                    //從資料庫抓多列
                    ?>
                    <tr>
                        <td>
                            <?echo $row['area_id'];?>
                        </td>
                        <td>
                            <?if($row['area_type'] == 0){
                                echo "BBQ";
                            }else{
                                echo "Camp";
                            }
                            ?>
                        </td>
                        <td>
                            <?echo $row['price_in']?>
                        </td>
                        <td>
                            <?echo $row['price_out']?>
                        </td>
                        <td>
<!--                            <form  method="post" action="userUpdate.php">-->
<!--                                <button name="account" value="--><?//echo $row['account'];?><!--" type="submit">編輯</button>-->
<!--                            </form>-->
<!--                            <form  method="post" action="userDelete.php">-->
<!--                                <button name="account" value="--><?//echo $row['account'];?><!--" type="submit">刪除</button>-->
<!--                            </form>-->
                            <a href="areaUpdate.php?area_id=<?echo $row['area_id']?>">編輯</a>
                            <a href="areaDelete.php?area_id=<?echo $row['area_id']?>">刪除</a>
                        </td>
                    </tr>
                    <?
                    //userUpdate改叫userEdit
                }
                ?>
                <!-- <a href="areaAdd.php">新增場地</a> -->
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
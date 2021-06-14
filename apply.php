<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>租賃申請</title>
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
    if($_SESSION['id']!=null){



    ?>
    <header>
        <a href="index.php">國立高雄大學烤肉區租賃系統</a>
    </header>
    <?
    $id = $_SESSION['id'];
    $sql=" SELECT * FROM `user` where `account`='".$id."' ";
    $rowUser = mysql_fetch_array(mysql_query($sql));
    $sql=" SELECT * FROM `renter` where `account`='".$id."' ";
    $rowRenter = mysql_fetch_array(mysql_query($sql));
    ?>

        <div class="container">
            <div class="applyArea">
                <form action="applyResult.php" method="post">
                    <table>
                        <tbody>
                        <? if($_SESSION['authority']>=2){//承辦人或系統管理員?>
                        <tr>
                            <td>申請身分</td>
                            <td><select name="type" >
                                    <option value="0" selected>校內</option>
                                    <option value="1" >校外</option>
                                </select></td>
                        </tr>
                        <?}?>
                        <tr>
                            <td>申請人姓名</td>
                            <td><input type="text" maxLength="20" name="applicantName" placeholder="例:丁大中" value="<?echo $rowUser[3];?>" required></td>
                        </tr>
                        <tr>
                            <td>租用總人數</td>
                            <td><input type="text" maxLength="20" name="peopleQuantity" placeholder="例:5" required></td>
                        </tr>
                        <tr>
                            <td>烤肉爐數</td>
                            <td><select name="bbqQuantity" >
                                    <option value="0" selected>0</option>
                                    <option value="1" >1</option>
                                    <option value="2" >2</option>
                                    <option value="3" >3</option>
                                    <option value="4" >4</option>
                                    <option value="5" >5</option>
                                    <option value="6" >6</option>
                                    <option value="7" >7</option>
                                    <option value="8" >8</option>
                                </select></td>
                        </tr>

                        <tr>
                            <td>烤肉起始時間</td>
                            <td><select name="bbqTimeStart" >
                                    <option value="2" selected>-請選擇-</option>
                                    <option value="8" >08:00</option>
                                    <option value="9" >09:00</option>
                                    <option value="10" >10:00</option>
                                    <option value="11" >11:00</option>
                                    <option value="12" >12:00</option>
                                    <option value="13" >13:00</option>
                                    <option value="14" >14:00</option>
                                    <option value="15" >15:00</option>
                                    <option value="16" >16:00</option>
                                    <option value="17" >17:00</option>
                                    <option value="18" >18:00</option>
                                    <option value="19" >19:00</option>
                                    <option value="20" >20:00</option>
                                    <option value="21" >21:00</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td>烤肉結束時間</td>
                            <td><select name="bbqTimeEnd" >
                                    <option value="1" selected>-請選擇-</option>
                                    <option value="9">09:00</option>
                                    <option value="10" >10:00</option>
                                    <option value="11" >11:00</option>
                                    <option value="12" >12:00</option>
                                    <option value="13" >13:00</option>
                                    <option value="14" >14:00</option>
                                    <option value="15" >15:00</option>
                                    <option value="16" >16:00</option>
                                    <option value="17" >17:00</option>
                                    <option value="18" >18:00</option>
                                    <option value="19" >19:00</option>
                                    <option value="20" >20:00</option>
                                    <option value="21" >21:00</option>
                                    <option value="22" >22:00</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td>營位數</td>
                            <td><select name="campQuantity" >
                                    <option value="0" selected>0</option>
                                    <option value="1" >1</option>
                                    <option value="2" >2</option>
                                    <option value="3" >3</option>
                                    <option value="4" >4</option>
                                    <option value="5" >5</option>
                                    <option value="6" >6</option>
                                    <option value="7" >7</option>
                                    <option value="8" >8</option>
                                    <option value="9" >9</option>
                                    <option value="10" >10</option>
                                    <option value="11" >11</option>
                                    <option value="12" >12</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td>租用日期</td>
                            <td><input type="date" name="useDate" required></td>
                        </tr>
                        <tr>
                            <td>統一編號</td>
                            <td><input type="text" maxLength="20" name="uniformID" placeholder="例:19880949(選填)" value="<?echo $rowRenter[6];?>" ></td>
                        </tr>
                        <tr>
                            <td>稅籍編號</td>
                            <td><input type="text" maxLength="20" name="taxID" placeholder="例:B51230000005(選填)" value="<?echo $rowRenter[4];?>" ></td>
                        </tr>
                        <tr>
                            <td>連絡電話</td>
                            <td><input type="text" maxLength="20" name="phone" placeholder="例:0987487487" value="<?echo $rowRenter[2];?>" required></td>
                        </tr>
                        <tr>
                            <td>地址</td>
                            <td><input type="text" maxLength="20" name="address" placeholder="例:台中市市政北七路87號8樓之7" value="<?echo $rowRenter[1];?>" required></td>
                        </tr>
                        <tr>
                            <td>收據抬頭</td>
                            <td><input type="text" maxLength="20" name="receiptName" placeholder="例:國立高雄大學(選填)" value="<?echo $rowRenter[5];?>" ></td>
                        </tr>
                        </tbody>
                    </table>
                    <input type="submit" value="申請">
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

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>最新公告</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        <? session_start(); include "css/main.css" ?>
    </style>
    <link rel="shortcut icon" href="logo/nuklogo.ico" type="image/x-icon">
    <script src="https://kit.fontawesome.com/f810d2bb4c.js" crossorigin="anonymous"></script>
</head>

<body>
<?php
        include("sql_connect.inc.php");
        $announce_id = $_GET["announce_id"];
        
        // echo "maxId".$announce_id_max;

        // echo $announce_id;
            $sql_query = "SELECT * FROM `announce` WHERE announce_id = ".$announce_id; //下sql語法
            $result = mysql_query($sql_query); //執行sql語法，執行完會丟給result
            if (mysql_num_rows($result) == 1) {//if1 有找到這個人
                //flag = 1有這個人
                while ($row = mysql_fetch_array($result)) {//while1
                    
                    // echo'<tr>';
                    // echo'<td>'.$row[0];
                    // echo'<td>'.$row[1];
                    // echo'<td>'.$row[2];//印名字
                    // echo'<td>'.$row[3];
                    // $announce_id = $row['announce_id'];
                    $announce_date = $row['announce_date'];
                    $announce_title = $row['announce_title'];
                    $announce_content = $row['announce_content'];

                    // echo '<td>'.$announce_id."id\n";
                    // echo '<td>'.$announce_date."\n";
                    // echo '<td>'.$announce_title."\n";
                    // echo '<td>'.$announce_content."\n";
                }
            }
                
            
        
        
    ?>

    <header>
        <a href="index.php">國立高雄大學烤肉區租賃系統</a>
    </header>
    <div class="container">
        <div class="announceContentArea">
            <h1>最新公告</h1>
            <div class="announceTitle"><?php echo $announce_title?></div>
            <div class="announceContent"><?php echo $announce_content?></div>
            <div class="announceDate">公告日期:<?php echo $announce_date?></div>
        </div> 
    </div>
    
</body>
</html>
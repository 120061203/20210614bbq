<html>
<head>
    <meta charset='utf8'>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>申請結果後端</title>
    <link rel="stylesheet" href="css\\main.css">
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

    $applicantName=$_POST["applicantName"];
    $sendContent=nl2br($_POST["sendContent"]);

    //時間、日期處理
    date_default_timezone_set('Asia/Taipei');

    // 提交意見表單到資料庫
            
        $id=$_SESSION['id'];

        $sql=" INSERT INTO `suggest` VALUES
                (
                    '',
                    '".$id."',
                    '".$sendContent."',
                    ''
                )";
        mysql_query($sql) or die("無法連接資料庫。".mysql_error());


        
            
    }
    
    else{
        echo "您尚未登入。";
        echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
    }
    require("phpMailer\class.phpmailer.php");
    $mail = new PHPMailer();

    $mail->Host     = "smtp.gmail.com"; // SMTP server
    $mail->Port = 465;  //Gamil的SMTP主機的埠號(Gmail為465)。
    $mail->SMTPSecure = "ssl"; // Gmail的SMTP主機需要使用SSL連線
    $mail->IsSMTP();

    $mail->SMTPAuth = true; // turn on SMTP authentication
    $mail->CharSet = "utf-8"; //郵件編碼

    //這幾行是必須的
    
    $mail->Username = "bbqsystem20210616@gmail.com";
    $mail->Password = "bbqsystemadmin";
    //這邊是你的gmail帳號和密碼
    
    $mail->FromName = "t1";
    // 寄件者名稱(你自己要顯示的名稱)
    $webmaster_email = "bbqsystem20210616@gmail.com";
    //回覆信件至此信箱
    
    
    $email="bbqsystem20210616@gmail.com";
    // 收件者信箱
    $name="t2";
    // 收件者的名稱or暱稱
    $mail->From = $webmaster_email;
    
    
    $mail->AddAddress($email);
    //這不用改
    
    $mail->WordWrap = 50;
    //每50行斷一次行
    
    //$mail->AddAttachment("/XXX.rar");
    // 附加檔案可以用這種語法(記得把上一行的//去掉)
    
    $mail->IsHTML(true); // send as HTML
    
    $mail->Subject = "信件標題";
    // 信件標題
    $mail->Body = "$sendContent";
    //信件內容(html版，就是可以有html標籤的如粗體、斜體之類)
    $mail->AltBody = "信件內容";
    //信件內容(純文字版)
    
    if(!$mail->Send()){
    echo "寄信發生錯誤：" . $mail->ErrorInfo;
    //如果有錯誤會印出原因
    }
    else{
        echo "送交意見成功";
        echo "寄信成功";
        echo '<meta http-equiv=REFRESH CONTENT=500;url=renter.php>';
    }
   
    ?>
    </body>
</html>
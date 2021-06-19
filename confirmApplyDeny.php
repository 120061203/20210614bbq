<html>
<head>
    <title>審核通過</title>
</head>
<body>
    <?
        session_start();
        include("sql_connect.inc.php");
        $renterAccount=$_SESSION['id'];
        $afid=$_GET["afid"];
        if($_SESSION['id']!=null&&$_SESSION['authority']==2) {

            $renterid=$_GET["renterid"];

            $sql="SELECT * FROM `user` WHERE `account`='$renterid'";
            $result=mysql_query($sql);
            while($row=mysql_fetch_array($result)){
                $rentermail=$row["email"];
            }
            if
            (
                mysql_query
                (
                    "
                    UPDATE `renter_af`
                    SET `undertaker_account`='".$renterAccount."',`payoff_status`=1
                    WHERE `af_id`='".$afid."' "
                )
            )
            {
                echo "申請ID:\"";
                echo $_GET["afid"];
                echo "租借人ID:\"";
                echo $_GET["renterid"];
                echo "租借人emil:\"";
                echo $rentermail;
                echo "\"審核不通過。";
                
                
                echo '<meta http-equiv=REFRESH CONTENT=3;url=confirmApply.php>';
            }
            else echo "無法連接資料庫。";
            }



        else
        {
            echo "您尚未登入。";
            echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
        }
    ?>

<?


date_default_timezone_set('Asia/Taipei');








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
    
$mail->FromName = "國立高雄大學";
// 寄件者名稱(你自己要顯示的名稱)
$webmaster_email = $userEmail;
//回覆信件至此信箱
    
    
$email=$rentermail;
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
    
$mail->Subject = "審核不通過";
// 信件標題
$mail->Body = "審核不通過，請恰承辦人";
//信件內容(html版，就是可以有html標籤的如粗體、斜體之類)
$mail->AltBody = "審核通過，請恰承辦人";
//信件內容(純文字版)
    
if(!$mail->Send()){
 echo "寄信發生錯誤：" . $mail->ErrorInfo;
 //如果有錯誤會印出原因
}
else{
    
    echo "寄信成功，已提醒審核未通過";
    echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
}
   
?>
</body>
</html>
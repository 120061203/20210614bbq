<?

session_start();
include("sql_connect.inc.php");
date_default_timezone_set('Asia/Taipei');

$sendContent = $_POST["sendContent"];
$suggest_id = $_POST["suggest_id"];
$userEmail = $_POST["userEmail"];
$userName = $_POST["userName"];

echo $sendContent;
echo $suggest_id;
echo $userEmail;
echo $userName;

$sql1 = " UPDATE suggest SET `reply_content` = '$sendContent' WHERE `suggest_id` = $suggest_id ";
mysql_query($sql1) or die("無法連接資料庫:".mysql_error());


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
    
    
$email=$userEmail;
// 收件者信箱
$name=$userName;
// 收件者的名稱or暱稱
$mail->From = $webmaster_email;
    
    
$mail->AddAddress($email);
//這不用改
    
$mail->WordWrap = 50;
//每50行斷一次行
    
//$mail->AddAttachment("/XXX.rar");
// 附加檔案可以用這種語法(記得把上一行的//去掉)
    
$mail->IsHTML(true); // send as HTML
    
$mail->Subject = "意見回復";
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
    echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
}
   
?>
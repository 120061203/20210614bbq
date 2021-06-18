<html>
<head>
    <title>審核通過</title>
</head>
<body>
    <?
        session_start();
        include("sql_connect.inc.php");
        //include("PHPMailerAutoload.php"); //匯入PHPMailer類別  
        //$mail= new PHPMailer(); //建立新物件        
        //$mail->IsSMTP(); //設定使用SMTP方式寄信        
        //$mail->SMTPAuth = true; //設定SMTP需要驗證        
        //$mail->SMTPSecure = "ssl"; // Gmail的SMTP主機需要使用SSL連線   
        //$mail->Host = "smtp.gmail.com"; //Gamil的SMTP主機        
        //$mail->Port = 465;  //Gamil的SMTP主機的SMTP埠位為465埠。        
        //$mail->CharSet = "big5"; //設定郵件編碼       
        if($_SESSION['id']!=null&&$_SESSION['authority']==2) {

            $renterid=$_GET["renterid"];

            $sql="SELECT * FROM `user` WHERE `account`='$renterid'";
            $result=mysql_query($sql);
            while($row=mysql_fetch_array($result)){
                $rentermail=$row["email"];
            }

            $subject = "高大露營烤肉區申請審核通過"; //信件標題
            $msg = "親愛的使用者,       
            您的註冊申請已審核通過! ";
            $headers = "From: bbqsystem20210616@gmail.com"; //寄件者
  
            if(mail("$rentermail", "$subject", "$msg", "$headers")):
             echo "信件已經發送成功。";
            else:
                echo "信件發送失敗！";
            endif;
            
            $renterAccount=$_SESSION['id'];
            $afid=$_GET["afid"];
            

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
                echo "\"審核通過。";
                
                
                echo '<meta http-equiv=REFRESH CONTENT=1000;url=confirmApply.php>';
            }
            else echo "無法連接資料庫。";
            }



        else
        {
            echo "您尚未登入。";
            echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
        }
    ?>
</body>
</html>
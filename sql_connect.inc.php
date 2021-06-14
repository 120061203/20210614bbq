<meta charset="utf-8">
<?php
    $db_server = 'localhost'; //伺服器(不用改)
    $db_user = 'root'; //使用者
    $db_password = '12345678'; //密碼

    $db_name = 'rent_db'; //資料庫(存放table的資料庫名稱)

    if(isset($db_server) && isset($db_user) && isset($db_password))
    {
        $link=mysql_pconnect($db_server,$db_user,$db_password);
        mysql_select_db($db_name);
        if (!$link)
        {
            echo "無法連接資料庫";
            exit();
        }
    }
?>

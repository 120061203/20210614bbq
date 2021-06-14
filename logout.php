<html>
<head>
    <title>登出</title>
</head>
<body>
    <?
    session_start();
    unset($_SESSION['id']);
    unset($_SESSION['authority']);
    echo '成功登出系統。';
    echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
    ?>
</body>
</html>

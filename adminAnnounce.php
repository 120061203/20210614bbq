<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理員公告</title>
</head>
<body>
    <form action="adminAnnounceResult.php" method ="post">
        <table>
            <tbody>
                <tr>
                    <td>公告標題</td>
                    <td><input type="text" maxLength="20" name="announce_title" placeholder="小於20字" required></td>
                </tr>
                <tr>
                    <td>公告內容</td>
                    <td><input type="text" maxLength="100" name="announce_content" placeholder="小於100字" ></td>
                </tr>
            </tbody>
        </table>
        <input type="submit" value="公告">
                
    </form>
</body>
</html>
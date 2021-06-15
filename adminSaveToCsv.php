<?
    function changeFileNameWithAgent($strFileName)
    {
        $filename = preg_replace('/[\?\*\|\\/\:"><]/', '', $strFileName);
        $agent = $_SERVER['HTTP_USER_AGENT'];
        $strHeader = '';
        if (strpos($agent, "Edge")) {
            $filename = urlencode($filename);
            $filename = str_replace("+", "%20", $filename);
            $strHeader = "Content-Disposition: attachment; filename=" . $filename;
        } else if (strpos($agent, "Firefox")) {
            $filename = urlencode($filename);
            $filename = str_replace("+", "%20", $filename);
            $strHeader = 'Content-Disposition: attachment; filename*="utf8\'\'' . $filename . '"';
        } else if (strpos($agent, "Chrome")) {
            $strHeader = "Content-Disposition: attachment; filename=" . $filename;
        } else if (strpos($agent, "Safari")) {
            $strHeader = 'Content-Disposition: attachment;filename*=UTF-8\'\'' . rawurlencode($filename);
        } else {
            $filename = urlencode($filename);
            $filename = str_replace("+", "%20", $filename);
            $strHeader = "Content-Disposition: attachment; filename=" . $filename;
        }
        return $strHeader;
    }

session_start();
include("sql_connect.inc.php");
date_default_timezone_set('Asia/Taipei');

$strFileName = date('Ymd').".csv";// 檔名 可以隨意
ob_clean();//清理緩衝區 避免開頭出現空行
$fp = fopen('php://output', 'a'); //開啟output流
header('X-Accel-Buffering: no'); //直接下載檔案,這行可以不配置,會預設為4096k才會下載,
header('Content-Type: application/octet-stream');
header(changeFileNameWithAgent($strFileName)); //設定頭部檔名 解決非英文亂碼(中文/日文測試都可以)
header("Content-type:text/csv;");

/**
* 第二步匯出資料,很簡單也很重要
* 程式碼很簡單,第一反應 就這~~~~
* 實際寫錯很容易伺服器崩潰
*/
// 輸出第一行標題 (根據實際情況,可有可無)
$sql1 = "select column_name from INFORMATION_SCHEMA.COLUMNS where table_name='renter_af'";
$retval = mysql_query($sql1);
$arrayHeader = array();
$i = 0;
while($row1 = mysql_fetch_row($retval)){
    #print_r($row1[0]);
    $arrayHeader[$i] = $row1[0];
    #print_r($arrayHeader[$i]);
    $i++;
}
// 轉義為預定字符集, 根據需求轉字符集(不需要轉化可以忽略該行程式碼),
// 將內部字符集轉為SJIS-win,一般專案為UTF-8字符集
// mb_internal_encoding() 設定或獲取內部字符集,有興趣的同學可以去看看
mb_convert_variables('SJIS-win', mb_internal_encoding(), $arrayHeader);
fputcsv($fp, $arrayHeader, ","); 
//初始化必要引數
$intOffset = 0; // mysql中offset引數
$intPageSize = 20; // 查詢條數 根據實際情況更換
$blnFinishedFlg = false;
do {
    // 根據 $intOffset $intPageSize查詢資料庫,少量多次查詢
    $sql2 = " SELECT * FROM `renter_af` WHERE `use_date` < ".date('Ymd');
    $retval = mysql_query($sql2);
    $arrayData = array();
    $i = 0;
    while($row1 = mysql_fetch_row($retval)) {
        $arrayData[$i] = $row1;
        $i++;
    }
    #print_r($arrayData);S

    // 輸出到csv檔案
    foreach($arrayData as $item) {
        mb_convert_variables('SJIS-win', mb_internal_encoding(), $item);
        fputcsv($fp, $item, ",");
        ob_flush();
        flush();
    }
    if ($intPageSize === count($arrayData)) {
        // 獲取到的結果數量等於查詢條數，認為未取完資料繼續查詢, 修改offset值
        $intOffset = $intOffset + $intPageSize;
        $blnFinishedFlg = false;
    } else {
        //小於查詢條數，資料已取完
        $blnFinishedFlg = true;
    }
} while (false === $blnFinishedFlg);

/**
* 第三步關閉檔案流
*/
ob_end_flush();
fclose($fp);

if($_SESSION['id']!=null&&$_SESSION['authority']==3)
{
    
}
else
{
    #echo "您尚未登入。";
    #echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
}

    
?>
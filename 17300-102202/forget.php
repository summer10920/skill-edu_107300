<?php
$ans="";
if(!empty($_POST['mail'])){
    $result=select("user_t6","mail='".$_POST['mail']."'");
    if($result==null) $ans="查無此資料<br>";
    else foreach($result as $row)
        $ans="您的密碼為:".$row['pwd']."<br>";
}
?>
<form method=post>
    請輸入信箱以查詢密碼<br>
    <input name=mail required style="width:400px"><br><?=$ans?>
    <input type=submit value=尋找>
</form>
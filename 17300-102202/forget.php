<?php
$ans="";
if($_POST!=null){
    $result=select("t6_user","mail='".$_POST['mail']."'");
    $ans=($result==null)?"查無此資料<br>":"您的密碼為:".$result[0]['pwd']."<br>";
}
?>
<fieldset>
    <legend>忘記密碼</legend>
    <p>請輸入信箱以查詢密碼</p>
    <form action="" method="post">
        <input type="text" name="mail"><br><?=$ans?>
        <input type="submit" value="尋找">
    </form>
</fieldset>
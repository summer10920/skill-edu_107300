<fieldset>
<legend>帳號管理</legend>
<form action="api.php?do=delmem" method="post">
<table>
    <tr><td>帳號</td><td>密碼</td><td>刪除</td></tr>
<?php
    $result=select("t6_user","id!=1");
    foreach($result as $row){
?>
    <tr>
        <td><?=$row['acc']?></td>
        <td><?=$row['pwd']?></td>
        <td><input type="checkbox" name="del[]" value="<?=$row['id']?>"></td>
    </tr>
<?php
    }
?>
    <tr><td colpsan=3><input type="submit" value="確定刪除"><input type="reset" value="清空選取"></td></tr>
</table>
</form>

<h3>新增會員</h3>
<form action="api.php?do=reg" method="post">
<table>
    <tr align=right><td>*請設定您要註冊的帳號及密碼(最長12個字元)</td></tr>
    <tr align=right><td>Step1:登入帳號<input type="text" name="acc"></td></tr>
    <tr align=right><td>Step2:登入密碼<input type="password" name="pwd"></td></tr>
    <tr align=right><td>Step3:再次確認密碼<input type="password" name="pwd2"></td></tr>
    <tr align=right><td>Step4:信箱(忘記密碼時使用)<input type="password" name="mail"></td></tr>
    <tr><td>
        <input type="submit" value="註冊">
        <input type="reset" value="清除">
    </td></tr>
</table>
</form>
</fieldset>
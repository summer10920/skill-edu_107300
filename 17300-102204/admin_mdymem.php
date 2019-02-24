<h3 class="ct">編輯會員資料</h3>
<?php
    $row=select("user_t9","id=".$_GET['id']);
?>
<form action="api.php?do=mdyuser" method="post">
<table bgcolor=#fff width=100%>
    <tr>
        <td bgcolor=#fc9>帳號</td>
        <td bgcolor=#ffc><?=$row[0]['acc']?></td>
    </tr>
    <tr>
        <td bgcolor=#fc9>姓名</td>
        <td bgcolor=#ffc><input type="text" name="name[<?=$row[0]['id']?>]" value="<?=$row[0]['name']?>"></td>
    </tr>
    <tr>
        <td bgcolor=#fc9>電子信箱</td>
        <td bgcolor=#ffc><input type="text" name="mail[<?=$row[0]['id']?>]" value="<?=$row[0]['mail']?>"></td>
    </tr>
    <tr>
        <td bgcolor=#fc9>聯絡地址</td>
        <td bgcolor=#ffc><input type="text" name="addr[<?=$row[0]['id']?>]" value="<?=$row[0]['addr']?>"></td>
    </tr>
    <tr>
        <td bgcolor=#fc9>連絡電話</td>
        <td bgcolor=#ffc><input type="text" name="tel[<?=$row[0]['id']?>]" value="<?=$row[0]['tel']?>"></td>
    </tr>
    <tr>
        <td colspan=5 align=center>
            <input type="submit" value="編輯">
            <input type="reset" value="重置">
            <input type="button" value="取消" onclick="window.history.back()">
        </td>
    </tr>
</table>
</form>
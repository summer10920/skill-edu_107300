<fieldset>
<legend>會員登入</legend>
<form action="api.php?do=login" method="post">
<table>
    <tr><td>帳號：<input type="text" name="acc"></td></tr>
    <tr><td>密碼：<input type="password" name="pwd"></td></tr>
    <tr><td>
        <input type="submit" value="登入">
        <input type="reset" value="清除">
        <a href="?do=forget">忘記密碼</a>|<a href="?do=reg">尚未註冊</a>
    </td></tr>
</table>
</form>
</fieldset>
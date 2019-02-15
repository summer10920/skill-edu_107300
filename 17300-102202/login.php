<fieldset>
<legend>會員登入</legend>
<form method=post action="api.php?do=login">
    <table>
        <tr>
            <td>帳號</td>
            <td><input type=text name=acc required></td>
        </tr>
        <tr>
            <td>密碼</td>
            <td><input type=password name=pwd required></td>
        </tr>
        <tr>
            <td colspan=2>
                <input type=submit value=登入><input type=reset value=清除><a href=?do=forget>忘記密碼</a>|<a href=?do=register>尚未註冊</a>
            </td>
        </tr>
    </table>
</form>
</fieldset>
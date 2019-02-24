<?php
?>
<h3 class="ct">新增管理帳號</h3>
<form action="api.php?do=addadmin" method="post">
<table>
    <tr>
        <td width=100>帳號</td>
        <td><input type="text" name="acc"></td>
    </tr>
    <tr>
        <td>密碼</td>
        <td><input type="password" name="pwd"></td>
    </tr>
    <tr>
        <td>權限</td>
        <td>
            <input type="checkbox" name="allow[]" value=0> 商品分類與管理<br>
            <input type="checkbox" name="allow[]" value=1> 訂單管理<br>
            <input type="checkbox" name="allow[]" value=2> 會員管理<br>
            <input type="checkbox" name="allow[]" value=3> 頁尾版權區管理<br>
            <input type="checkbox" name="allow[]" value=4> 最新消息管理
        </td>
    </tr>
    <tr align=center>
        <td colspan=2><input type="submit" value="新增"><input type="reset" value="重置"></td>
    </tr>
</table>
</form>

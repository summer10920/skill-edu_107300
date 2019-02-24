<?php
$result=select("admin_t10","id=".$_GET['id']);
foreach($result as $row){
$allow=unserialize($row['access']);
?>
<h3 class="ct">修改管理帳號</h3>
<form action="api.php?do=mdyadmin" method="post">
<table>
    <tr>
        <td width=100>帳號</td>
        <td><input type="text" name="acc[<?=$row['id']?>]" value=<?=$row['acc']?>></td>
    </tr>
    <tr>
        <td>密碼</td>
        <td><input type="password" name="pwd[<?=$row['id']?>]" value=<?=$row['pwd']?>></td>
    </tr>
    <tr>
        <td>權限</td>
        <td>
            <input type="hidden" name="id" value=<?=$row['id']?>>
            <input type="checkbox" name="allow[]" value=0 <?=($allow[0])?"checked":""?>> 商品分類與管理<br>
            <input type="checkbox" name="allow[]" value=1 <?=($allow[1])?"checked":""?>> 訂單管理<br>
            <input type="checkbox" name="allow[]" value=2 <?=($allow[2])?"checked":""?>> 會員管理<br>
            <input type="checkbox" name="allow[]" value=3 <?=($allow[3])?"checked":""?>> 頁尾版權區管理<br>
            <input type="checkbox" name="allow[]" value=4 <?=($allow[4])?"checked":""?>> 最新消息管理
        </td>
    </tr>
    <tr align=center>
        <td colspan=2><input type="submit" value="修改"><input type="reset" value="重置"></td>
    </tr>
</table>
</form>
<?php
}
?>

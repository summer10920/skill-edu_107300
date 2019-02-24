<h3 class="ct">訂單管理</h3>
<input type="button" value="新增管理員" onclick="<?=jlo("?do=admin&redo=newadmin")?>">
<table width="100%" cellpadding=5>
    <tr>
        <td>帳號</td>
        <td>密碼</td>
        <td>管理</td>
    </tr>
    <tr>
        <td>admin</td>
        <td>****</td>
        <td>此帳號為最高權限</td>
    </tr>
<?php
$result=select("admin_t10","id!=1");
foreach($result as $row){
?>
    <tr>
        <td><?=$row['acc']?></td>
        <td><?=$row['pwd']?></td>
        <td>
            <input type="button" value="修改" onclick="<?=jlo("admin.php?do=admin&redo=mdyadmin&id=".$row['id'])?>">
            <input type="button" value="刪除" onclick="<?=jlo("api.php?do=deladmin&id=".$row['id'])?>">
        </td>
    </tr>

<?php
}
?>
</table>
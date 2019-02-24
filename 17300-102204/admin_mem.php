<h3 class="ct">會員管理</h3>
<table bgcolor=#fff width=100%>
    <tr bgcolor=#fc9>
        <td>姓名</td><td>會員帳號</td><td>註冊日期</td><td>操作</td>
    </tr>
<?php
    $result=select("user_t9",0);
    foreach($result as $row){
?>
    <tr bgcolor=#ffc>
        <td><?=$row['name']?></td>
        <td><?=$row['acc']?></td>
        <td><?=$row['date']?></td>
        <td>
            <input type="button" value="修改" onclick="<?=jlo('?do=admin&redo=mdymem&id='.$row['id'])?>">
            <input type="button" value="刪除" onclick="<?=jlo('api.php?do=delmem&id='.$row['id'])?>">
        </td>
    </tr>
<?php
            }
?>
</table>
<h3 class="ct">訂單管理</h3>
<table bgcolor=#fff width=100%>
    <tr bgcolor=#fc9>
        <td>訂單編號</td><td>金額</td><td>會員帳號</td><td>姓名</td><td>下單時間</td><td>操作</td>
    </tr>
<?php
    $result=select("order_t8",0);
    foreach($result as $row){
?>
    <tr bgcolor=#ffc>
        <td><a href="?do=admin&redo=orderdetail&id=<?=$row['id']?>"><?=$row['id']?></a></td>
        <td><?=$row['total']?></td>
        <td><?=$row['acc']?></td>
        <td><?=$row['name']?></td>
        <td><?=$row['date']?></td>
        <td><input type="button" value="刪除" onclick="<?=jlo('api.php?do=delorder&id='.$row['id'])?>"></td>
    </tr>
<?php
            }
?>
</table>
<h3 class="ct">
<?php
    if(!empty($_SESSION['user'])) echo $_SESSION['user']."的購物車";
    else echo "請先登入會員";
?>
</h3>
<table bgcolor=#fff width=100%>
    <tr bgcolor=#fc9>
        <td>編號</td><td>商品名稱</td><td>數量</td><td>庫存量</td><td>單價</td><td>小計</td><td>刪除</td>
    </tr>
<?php
    if(empty($_SESSION['buy'])) echo "<tr align=center><td colspan=7>空的購物車</td></tr>";
    else{
        foreach($_SESSION['buy'] as $key=>$data){
            $row=select("product_t5","id=".$data['id']);
?>
    <form action="?do=order" method="post">
    <tr>
        <td><?=$row[0]['id']?></td>
        <td><?=$row[0]['title']?></td>
        <td><input type="text" name="num[<?=$key?>]" value=<?=$data['num']?>></td>
        <td><?=$row[0]['num']?></td>
        <td><?=$row[0]['price']?></td>
        <td><?=$data['num']*$row[0]['price']?></td>
        <td><input type="button" value="刪除" onclick="<?=jlo('api.php?do=delcart&id='.$row[0]['id'])?>"></td>
    </tr>

<?php
        }
    }
?>
    <tr>
        <td colspan=7>
            <img src="img/0411.jpg" onclick="<?=jlo('?')?>">
            <?=(!empty($_SESSION['buy']))?'<input type=image src="img/0412.jpg" alt="submit">':""?>
        </td>
    </tr>
    </form>
</table>
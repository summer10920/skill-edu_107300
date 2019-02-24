<h3 class="ct">訂單編號<?=$_GET['id']?>的詳細資料</h3>
<?php
    $order=select("order_t8","id=".$_GET['id']);
    $buy=unserialize($order[0]['buy']);
?>
<table bgcolor=#fff width=100%>
    <tr>
        <td bgcolor=#fc9>登入帳號</td><td bgcolor=#ffc colspan=4>
            <?=$order[0]['acc']?>
        </td>
    </tr>
    <tr>
        <td bgcolor=#fc9>姓名</td><td bgcolor=#ffc colspan=4>
            <?=$order[0]['name']?>
        </td>
    </tr>
    <tr>
        <td bgcolor=#fc9>電子信箱</td><td bgcolor=#ffc colspan=4>
            <?=$order[0]['mail']?>
        </td>
    </tr>
    <tr>
        <td bgcolor=#fc9>聯絡地址</td><td bgcolor=#ffc colspan=4>
            <?=$order[0]['addr']?>
        </td>
    </tr>
    <tr>
        <td bgcolor=#fc9>連絡電話</td><td bgcolor=#ffc colspan=4>
            <?=$order[0]['tel']?>
        </td>
    </tr>
    <tr bgcolor=#fc9>
        <td>商品名稱</td><td>編號</td><td>數量</td><td>單價</td><td>小計</td>
    </tr>
<?php
    foreach($buy as $data){
        $row=select("product_t5","id=".$data['id']);
?>
    <tr bgcolor="#ffc">
        <td><?=$row[0]['title']?></td>
        <td><?=$row[0]['id']?></td>
        <td><?=$data['num']?></td>
        <td><?=$row[0]['price']?></td>
        <td><?=$data['num']*$row[0]['price']?></td>
    </tr>
<?php
            }
?>
    <tr bgcolor=#fc9 align=center>
        <td colspan=5>總價：<?=$order[0]['total']?></td>
    </tr>
    <tr>
        <td colspan=5 align=center>
            <input type="button" value="返回" onclick="window.history.back()">
        </td>
    </tr>
</table>
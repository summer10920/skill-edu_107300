<h3 class="ct">
<?php
    foreach($_POST['num'] as $key=>$value) $_SESSION['buy'][$key]['num']=$value;    //修正前面POST取得的SESSION數量資訊
    $user=select("user_t9","acc='".$_SESSION['user']."'");
?>
</h3>
<form action="api.php?do=order" method="post">
<table bgcolor=#fff width=100%>
    <tr>
        <td bgcolor=#fc9>登入帳號</td><td bgcolor=#ffc colspan=4>
            <?=$_SESSION['user']?>
        </td>
    </tr>
    <tr>
        <td bgcolor=#fc9>姓名</td><td bgcolor=#ffc colspan=4>
            <input type="text" name="name" value="<?=$user[0]['name']?>">
        </td>
    </tr>
    <tr>
        <td bgcolor=#fc9>電子信箱</td><td bgcolor=#ffc colspan=4>
            <input type="text" name="mail" value="<?=$user[0]['mail']?>">
        </td>
    </tr>
    <tr>
        <td bgcolor=#fc9>聯絡地址</td><td bgcolor=#ffc colspan=4>
            <input type="text" name="addr" value="<?=$user[0]['addr']?>">
        </td>
    </tr>
    <tr>
        <td bgcolor=#fc9>連絡電話</td><td bgcolor=#ffc colspan=4>
            <input type="text" name="tel" value="<?=$user[0]['tel']?>">
        </td>
    </tr>
    <tr bgcolor=#fc9>
        <td>商品名稱</td><td>編號</td><td>數量</td><td>單價</td><td>小計</td>
    </tr>
<?php
    $total=0;
    foreach($_SESSION['buy'] as $data){
        $row=select("product_t5","id=".$data['id']);
        $total+=$data['num']*$row[0]['price'];
?>
    <tr>
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
        <td colspan=5>總價：<?=$total?><input type="hidden" name="total" value=<?=$total?>></td>
    </tr>
    <tr>
        <td colspan=5 align=center>
            <input type="submit" value="確定送出">
            <input type="button" value="返回修改訂單" onclick="window.history.back()">
        </td>
    </tr>
</table>
</form>
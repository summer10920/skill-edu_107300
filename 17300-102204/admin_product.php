<h3><a href="?do=admin&redo=th">商品分類</a>｜商品管理</h3>
<hr>
<p><input type="button" value="新增商品" onclick=<?=jlo('?do=admin&redo=addproduct')?>></p>
<hr>
<table bgcolor="#fff" width="100%">
    <tr bgcolor="#cff">
        <td>編號</td><td>商品名稱</td><td>庫存量</td><td>狀態</td><td>操作</td>
    </tr>
<?php
    $result=select("product_t5",0);
    foreach($result as $row){
?>
    <tr bgcolor="#ffc">
        <td><?=$row['id']?></td>
        <td><?=$row['title']?></td>
        <td><?=$row['num']?></td>
        <td><?=($row['dpy'])?"販售中":"已下架"?></td>
        <td>
            <input type="button" value="修改" onclick="<?=jlo("?do=admin&redo=mdyproduct&id=".$row['id'])?>">
            <input type="button" value="刪除" onclick="<?=jlo("api.php?do=delproduct&id=".$row['id'])?>"><br>
            <input type="button" value="上架" onclick="<?=jlo("api.php?do=onproduct&id=".$row['id'])?>">
            <input type="button" value="下架" onclick="<?=jlo("api.php?do=offproduct&id=".$row['id'])?>">
        </td>
    </tr>
<?php
    }
?>
</table>

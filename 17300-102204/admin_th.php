<h3>商品分類｜<a href="?do=admin&redo=product">商品管理</a></h3>
<hr>
<form action="api.php?do=addfa&parent=0" method="post">
    <p>新增大類<input type="text" name="title" required><input type="submit" value="新增"></p>
</form>
<?php
    $resultA=select("class_t4","parent=0");
?>
<form action="api.php?do=addson" method="post">
    <p>
        新增中類
        <select name="parent">
<?php
    foreach($resultA as $father) echo '<option value="'.$father['id'].'">'.$father['title'].'</option>';
?>    
        </select>
        <input type="text" name="title" required>
        <input type="submit" value="新增"></p>
</form>
<hr>
<table bgcolor="#fff" width="100%">
<?php
    foreach($resultA as $father){
?>
    <tr bgcolor="#cff">
        <td width=70%><?=$father['title']?></td>
        <td>
            <input type="button" value="修改" onclick="<?=jlo('?do=admin&redo=mdyth&id='.$father['id'])?>">
            <input type="button" value="刪除" onclick="<?=jlo('api.php?do=delcls&id='.$father['id'])?>">
        </td>
    </tr>
<?php
        $resultB=select("class_t4","parent=".$father['id']);
        foreach($resultB as $son){
?>
    <tr bgcolor="#ffc">
        <td><?=$son['title']?></td>
        <td>
            <input type="button" value="修改" onclick="<?=jlo('?do=admin&redo=mdyth&id='.$son['id'])?>">
            <input type="button" value="刪除" onclick="<?=jlo('api.php?do=delcls&id='.$son['id'])?>">
        </td>
    </tr>
<?php

        }
    }
?>
</table>

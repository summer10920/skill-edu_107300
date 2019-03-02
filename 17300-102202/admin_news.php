<fieldset>
<legend>最新文章管理</legend>
<form action="api.php?do=adminnews" method="post">
<table width=100% bgcolor=#fff cellpadding=10>
    <tr><td>編號</td><td>標題</td><td>顯示</td><td>刪除</td></tr>
<?php
$nowpage=(empty($_GET['page']))?1:$_GET['page'];
$begin=($nowpage-1)*3;
$result=select("t7_blog","1 limit ".$begin.",3");
foreach($result as $row){
?> 
    <tr>
        <td><?=$row['id']?></td>
        <td><?=$row['title']?></td>
        <input type="hidden" name="dpy[<?=$row['id']?>]" value=0>
        <td><input type="checkbox" name="dpy[<?=$row['id']?>]" value=1 <?=($row['dpy'])?"checked":""?>></td>
        <td><input type="checkbox" name="del[]" value=<?=$row['id']?>></td>
    </tr>
<?php
}
?>
<tr><td colspan=4 align=center><input type="submit" value="確定修改"></td></tr>
</table>
</form>
<?php
$result=page_link("t7_blog",1,3,$nowpage);
foreach($result as $name=>$data)
    echo '<a href="?do=admin_news&page='.$data.'">'.$name.'</a>';
?>
</fieldset>
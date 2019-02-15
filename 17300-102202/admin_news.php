<?php
$page=(empty($_GET['page']))?1:$_GET['page'];// page=?,then show list'count=?
$start=$page*3-3;
$result=select("blog_t7","1 limit ".$start.",3");
?>
<form method=post action="api.php?do=admin_news">
    <table width=100% cellpadding=5>
        <tr align=center>
            <td>編號</td>
            <td width="80%">標題</td>
            <td>顯示</td>
            <td>刪除</td>
        </tr>
<?php   
$i=$start+1;
foreach($result as $row){
?>
        <tr class="ct">
            <td><?=$i?></td>
            <td><?=$row['title']?></td>
            <td>
                <input type="hidden"  name="dpy[<?=$row['id']?>]" value="0">
                <input type="checkbox" name="dpy[<?=$row['id']?>]" value="1" <?=($row['dpy'])?"checked":""?>>
            </td>
            <td><input type="checkbox" name="del[]" value="<?=$row['id']?>"></td>
        </tr>
<?php
$i++;
}
?>
    </table>
    <div class="ct">
<?php
$pagelink=page_link("blog_t7",0,3,$page);// (table,where,items in page,now page)
foreach($pagelink as $name=>$data){
    if($name=="num")
        foreach($data as $value){
            $size=($value==$page)?"style='font-size:2em'":"";
            echo "<a ".$size."href='?do=admin_news&page=".$value."'>".$value."</a> ";
        }
    else
            echo "<a href='?do=admin_news&page=".$data."'>".$name."</a> ";
}
?>
    </div>
<div class="ct"><input type="submit" value="確定修改"></div>
</form>
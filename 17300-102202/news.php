<fieldset>
<legend>目前位置:首頁＞最新文章區</legend>
<table width=100% bgcolor=#fff cellpadding=10>
    <tr><td width="25%">標題</td><td>內容</td></tr>
<?php
$nowpage=(empty($_GET['page']))?1:$_GET['page'];
$begin=($nowpage-1)*5;
$result=select("t7_blog","dpy=1 limit ".$begin.",5");
foreach($result as $row){
    if(!empty($_GET['id'])&&$_GET['id']==$row['id']) $newstext=$row['text'];
    else $newstext='<a href="?do=news&page='.$nowpage.'&id='.$row['id'].'">'.mb_substr($row['text'],0,30).'...</a>';
    $goodbtn="";
    if(!empty($_SESSION['user'])){
        $check=select("t11_good","user='".$_SESSION['user']."' and blog=".$row['id']);
        if($check!=null) $goodbtn=' | <a href="api.php?do=subgood&id='.$row['id'].'">收回讚</a>';
        else $goodbtn=' | <a href="api.php?do=addgood&id='.$row['id'].'">讚</a>';
    }
?> 
    <tr>
        <td bgcolor="#ffc"><?=$row['title']?><?=$goodbtn?></td>
        <td><?=$newstext?></td>
    </tr>
<?php
}
?>
</table>
<?php
$result=page_link("t7_blog","dpy=1",5,$nowpage);
foreach($result as $name=>$data)
    echo '<a href="?do=news&page='.$data.'">'.$name.'</a>';
?>
</fieldset>
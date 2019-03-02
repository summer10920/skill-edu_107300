<?php
if(empty($_GET['cls'])) $_GET['cls']=1;
switch($_GET['cls']) {
    case 1: $navname="健康新知"; break;
    case 2: $navname="菸害防制"; break;
    case 3: $navname="癌症防治"; break;
    case 4: $navname="慢性病防治"; break;
}
if(empty($_GET['page'])){
    $po_zone="";
    $result=select("t7_blog","cls=".$_GET['cls']);
    foreach($result as $row) 
        $po_zone.='<a href="?do=po&cls='.$_GET['cls'].'&page='.$row['id'].'">'.$row['title'].'</a><br>';
}
else{
    $result=select("t7_blog","id=".$_GET['page']);
    $po_zone=$result[0]['text'];
}
?>
目前位置:首頁＞分類網誌＞<?=$navname?>
<table width=100%>
    <tr valign=top>
        <td width="20%">
            <fieldset>
            <legend>網誌分類</legend>
            <a href="?do=po&cls=1">健康新知</a><br>
            <a href="?do=po&cls=2">菸害防制</a><br>
            <a href="?do=po&cls=3">癌症防治</a><br>
            <a href="?do=po&cls=4">慢性病防治</a>
            </fieldset>
        </td>
        <td>
            <fieldset>
            <legend>文章列表</legend>
            <?=$po_zone?>
            </fieldset>
        </td>
    </tr>
</table>

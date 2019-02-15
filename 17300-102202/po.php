<?php
if(empty($_GET['cls'])) $_GET['cls']=1;

function nav_name(){
    switch($_GET['cls']){
        case 1: return "健康新知";
        case 2: return "菸害防制";
        case 3: return "癌症防治";
        case 4: return "慢性病防治";
    }
}
$navbar=nav_name();

if(empty($_GET['id'])){ //get list
    $result=select("blog_t7","cls=".$_GET['cls']);
    $po_content="";
    foreach ($result as $row)
        $po_content.="<a href='?do=po&cls=".$_GET['cls']."&id=".$row['id']."'>".$row['title']."</a><br>";
}
else{   //get article
    $result=select("blog_t7","id=".$_GET['id']);
    foreach ($result as $row) $po_content=$row['text'];
}
?>
<p>目前位置 : 首頁 > 分類網誌 > <?=$navbar?></p>
<div style="width:20%;float:left">
<fieldset>
<legend>網誌分類</legend>
    <a href="?do=po&cls=1"><p>健康新知</p></a>
    <a href="?do=po&cls=2"><p>菸害防制</p></a>
    <a href="?do=po&cls=3"><p>癌症防治</p></a>
    <a href="?do=po&cls=4"><p>慢性病防治</p></a>
</fieldset>
</div>
<div>
<fieldset>
<legend>文章列表</legend>
<?=$po_content?>
</fieldset>
</div>
<fieldset>
    <legend>目前位置 : 首頁 > 最新文章區</legend>
<?php
$page=(empty($_GET['page']))?1:$_GET['page'];// page=?,then show list'count=?
$start=$page*5-5;
$result=select("blog_t7","1 limit ".$start.",5");
?>
    <table width=100% cellpadding=5>
        <tr align=center>
            <td width="25%" bgcolor=#eee>標題</td>
            <td>內容</td>
        </tr>
<?php   
$show=(empty($_GET['id']))?0:$_GET['id'];//要顯示的文章id
foreach($result as $row){
    if($show==$row['id'])   $news_content=$row['text'];//如果GET有對應到該文章ID
    else  $news_content="<a href='?do=news&page=".$page."&id=".$row['id']."'>".mb_substr($row['text'],0,30)."...</a>";
    
    $good_btn="";
    if(!empty($_SESSION['acc'])){ //有登入者，取得讚狀態
        $result=select("good_t11","user='".$_SESSION['acc']."' and blog='".$row['id']."'");
        if($result==null) $good_btn="｜<a href='api.php?do=goodadd&id=".$row['id']."'>讚</a>";
        else $good_btn="｜<a href='api.php?do=goodsub&id=".$row['id']."'>收回讚</a>";
    }
?>
        <tr>
            <td bgcolor=#eee>
                <?=$row['title']?>
                <?=$good_btn?>
            </td>
            <td><?=$news_content?></td>
        </tr>
<?php
}
?>
    </table>
<?php
$pagelink=page_link("blog_t7",0,5,$page);// (table,where,items in page,now page)
foreach($pagelink as $name=>$data){
    if($name=="num")
        foreach($data as $value){
            $size=($value==$page)?"style='font-size:2em'":"";
            echo "<a ".$size."href='?do=news&page=".$value."'>".$value."</a> ";
        }
    else
            echo "<a href='?do=news&page=".$data."'>".$name."</a> ";
}
?>
</fieldset>
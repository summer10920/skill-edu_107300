<fieldset>
    <legend>目前位置 : 首頁 > 人氣文章區</legend>
<?php
$page=(empty($_GET['page']))?1:$_GET['page'];// page=?,then show list'count=?
$start=$page*5-5;
$result=select("blog_t7","1 order by num desc limit ".$start.",5");
?>
    <table width=100% cellpadding=5>
        <tr>
            <td width="25%" bgcolor=#eee>標題</td>
            <td>內容</td>
            <td width="25%">人氣</td>
        </tr>
<?php   
$show=(empty($_GET['id']))?0:$_GET['id'];//要顯示的文章id
foreach($result as $row){
    $pop_content=mb_substr($row['text'],0,30)."...";
    
    $good_btn="";
    if(!empty($_SESSION['acc'])){ //有登入者，取得讚狀態
        $result=select("good_t11","user='".$_SESSION['acc']."' and blog='".$row['id']."'");
        if($result==null) $good_btn=" - <a href='api.php?do=popadd&id=".$row['id']."'>讚</a>";
        else $good_btn=" - <a href='api.php?do=popsub&id=".$row['id']."'>收回讚</a>";
    }
?>
        <tr>
            <td bgcolor=#eee><?=$row['title']?></td>
            <td>
                <span class="popzone"><?=$pop_content?>
                    <span class="all" style="display:none"><?=$row['text']?></span></span></td>
            <td>
                <?=$row['num']?>個人說<img src="img/02B03.jpg" height=20px>
                <?=$good_btn?>
            </td>
        </tr>
<?php
}
?>
    </table>
    <div id="altt" style="position: absolute; width: 350px; min-height: 100px; color:#fff;background-color:#333; top: 50px; left: 130px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
<?php
$pagelink=page_link("blog_t7",0,5,$page);// (table,where,items in page,now page)
foreach($pagelink as $name=>$data){
    if($name=="num")
        foreach($data as $value){
            $size=($value==$page)?"style='font-size:2em'":"";
            echo "<a ".$size."href='?do=pop&page=".$value."'>".$value."</a> ";
        }
    else
            echo "<a href='?do=pop&page=".$data."'>".$name."</a> ";
}
?>
</fieldset>


<ul class="ssaa" style="list-style-type:decimal;"></ul>

<script>
$(".popzone").hover(function (){
    $("#altt").html("<pre>"+$(this).children(".all").html()+"</pre>");
    $("#altt").show();
});
$(".popzone").mouseout(function(){
    $("#altt").hide();
});
</script>
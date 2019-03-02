<fieldset>
<legend>目前位置:首頁＞人氣文章區</legend>
<table width=100% bgcolor=#fff cellpadding=10>
    <tr><td width="25%">標題</td><td width="50%">內容</td><td>人氣</td></tr>
<?php
$nowpage=(empty($_GET['page']))?1:$_GET['page'];
$begin=($nowpage-1)*5;
$result=select("t7_blog","dpy=1 order by num desc limit ".$begin.",5");
foreach($result as $row){
    $newstext='<div class="ssaa">'.mb_substr($row['text'],0,30).'...<div class="all" style="display:none">'.$row['text'].'</div></div>';
    $goodbtn="";
    if(!empty($_SESSION['user'])){
        $check=select("t11_good","user='".$_SESSION['user']."' and blog=".$row['id']);
        if($check!=null) $goodbtn=' | <a href="api.php?do=subgood&id='.$row['id'].'">收回讚</a>';
        else $goodbtn=' | <a href="api.php?do=addgood&id='.$row['id'].'">讚</a>';
    }
?> 
    <tr>
        <td bgcolor="#ffc"><?=$row['title']?></td>
        <td><?=$newstext?></td>
        <td><?=$row['num']?>個人說<img src="img/02B03.jpg" width=20><?=$goodbtn?></td>
    </tr>
<?php
}
?>
</table>
<?php
$result=page_link("t7_blog","dpy=1",5,$nowpage);
foreach($result as $name=>$data)
    echo '<a href="?do=pop&page='.$data.'">'.$name.'</a>';
?>
</fieldset>
<div id="altt" style="position: absolute; width: 350px; min-height: 100px; background-color: rgb(255, 255, 204); top: 50px; left: 130px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
<script>
$(".ssaa").hover(function (){
    $("#altt").html("<pre>"+$(this).children(".all").html()+"</pre>")
    $("#altt").show()
})
$(".ssaa").mouseout(function(){
    $("#altt").hide()
})
</script>
<h3>最新消息</h3>

<?php
if(empty($_GET['id'])){
?>
    <p>*點擊標題觀看詳細資訊</p>
    <table bgcolor="#fff" width=100% cellpadding=10>
        <tr bgcolor="#f98">
            <td>標題</td>
        </tr>
    <?php
    $result=select("maqe_t6",0);
    foreach($result as $row){
    ?>
        <tr bgcolor="#fc9">
            <td><a href="?do=news&id=<?=$row['id']?>"><?=$row['title']?></a></td>
        </tr>
    <?php
    }
    ?>
    </table>
<?php
}else{
?>
    <table bgcolor="#fff" width=100% cellpadding=10>
    <?php
    $result=select("maqe_t6","id=".$_GET['id']);
    foreach($result as $row){
    ?>
        <tr>
            <td bgcolor="#f98">標題</td><td bgcolor="#fc9"><?=$row['title']?></td>
        </tr>
        <tr>
            <td bgcolor="#f98">內文</td><td bgcolor="#fc9"><?=$row['text']?></td>
        </tr>
    <?php
    }
    ?>
    </table>
<?php
}
?>
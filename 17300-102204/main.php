<table bgcolor="#ffc">
<?php
if(empty($_GET['sonid'])) {//因可能faid不存在但為全商品顯示，所以用sonid來分辨即可
    $who=(empty($_GET['faid']))?'0':"id=".$_GET['faid'];
    $resultA=select("class_t4",$who);
    foreach($resultA as $father){
        $resultB=select("class_t4","parent=".$father['id']);
        foreach($resultB as $son){
            $resultC=select("product_t5","cls=".$son['id']);
            foreach($resultC as $row){
?>
<tr>
    <td rowspan=4>
        <a href="index.php?do=detial&id=<?=$row['id']?>">
            <img width=200 src="upload/<?=$row['img']?>">
        </a>
    </td>
    <td bgcolor="#ff0"><?=$row['title']?></td>
</tr>
<tr>
    <td>
        售價：<?=$row['price']?>
        <a style="float:right" href="index.php?do=detial&id=<?=$row['id']?>">
            <img src="img/0402.jpg">
        </a>
    </td>
</tr>
<tr>
    <td>規格：<?=$row['spec']?></td>
</tr>
<tr>
    <td>簡介：<?=$row['text']?></td>
</tr>
<?php
            }
        }
    }
}
else{
    $resultC=select("product_t5","cls=".$_GET['sonid']);
    foreach($resultC as $row){
?>
<tr>
    <td rowspan=4>
        <a href="index.php?do=detial&id=<?=$row['id']?>">
            <img width=200 src="upload/<?=$row['img']?>">
        </a>
    </td>
    <td bgcolor="#ff0"><?=$row['title']?></td>
</tr>
<tr>
    <td>
        售價：<?=$row['price']?>
        <a style="float:right" href="index.php?do=detial&id=<?=$row['id']?>">
            <img src="img/0402.jpg">
        </a>
    </td>
</tr>
<tr>
    <td>規格：<?=$row['spec']?></td>
</tr>
<tr>
    <td>簡介：<?=$row['text']?></td>
</tr>
<?php
    }
}
?>
</table>
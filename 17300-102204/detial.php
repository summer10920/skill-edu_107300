<table bgcolor=#ffc>
<?php
    $resultC=select("product_t5","id=".$_GET['id']);    //get product's cls
    $row=$resultC[0];
    $resultB=select("class_t4","id=".$row['cls']);      //get product's cls's parent
    $cls2=$resultB[0];
    $resultA=select("class_t4","id=".$cls2['parent']);  //get product's cls's parent's name
    $cls1=$resultA[0];
?>
<tr align=center>
    <td colspan=2><h3><?=$row['title']?></h3></td>
</tr>
<tr>
    <td rowspan=5><img width=200 src="upload/<?=$row['img']?>"></td>
    <td>分類<?=$cls1['title']?>><?=$cls2['title']?></td>
</tr>
<tr>
<td>價格：<?=$row['id']?></td>
</tr>
<tr>
    <td>價格：<?=$row['price']?></td>
</tr>
<tr>
    <td>簡介：<?=$row['text']?></td>
</tr>
<tr>
    <td>庫存量：<?=$row['num']?></td>
</tr>
<form action="api.php?do=importcart" method="post">
<tr align=center bgcolor=#ff0>
    <td colspan=2>
        訂購數量
        <input type="hidden" name="id" value=<?=$row['id']?>>
        <input type="text" name="num" value=1>
        <input type="image" src="img/0402.jpg" alt="submit">
    </td>
</tr>
</form>
</table>
<?php
$result=select("movie_t7","id=".$_GET['id']);
$row=$result[0];
switch($row['cls']){case 1:$level="普遍級";break;case 2:$level="保護級";break;case 3:$level="輔導級";break;case 4:$level="限制級";}
?>
<div class="tab rb" style="width:87%;">
    <div style="background:#FFF; width:100%; color:#333; text-align:left">
    <video src="upload/<?=$row['video']?>" width="300px" height="250px" controls="" style="float:right;"></video>
    <font style="font-size:20px"> <img src="upload/<?=$row['img']?>" width="200px" height="250px" style="margin:10px; float:left">
    <p style="margin:3px">影片名稱 ：<?=$row['title']?><br>
        <input type="button" value="線上訂票" onclick="<?=jlo('booking.php?do=step1&id='.$row['id'])?>" style="padding:2px 4px" class="b2_btu">
    </p>
    <p style="margin:3px">影片分級 ： <img src="img/03C0<?=$row['cls']?>.png" style="display:inline-block;"><?=$level?> </p>
    <p style="margin:3px">影片片長 ： <?=$row['length']?></p>
    <p style="margin:3px">上映日期 ： <?=$row['date']?></p>
    <p style="margin:3px">發行商 ： <?=$row['corp']?></p>
    <p style="margin:3px">導演 ： <?=$row['maker']?></p>
    <br>
    <br>
    <p style="margin:10px 3px 3px 3px; word-break:break-all"> 劇情簡介：<?=$row['text']?><br>
    </p>
    </font>
    <table width="100%" border="0">
        <tbody>
        <tr>
            <td align="center"><input type="button" value="院線片清單" onclick="<?=jlo('index.php')?>"></td>
        </tr>
        </tbody>
    </table>
    </div>
</div>

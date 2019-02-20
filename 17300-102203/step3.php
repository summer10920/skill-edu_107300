<?php
$result=select("book_t8","id=".$_GET['id']);
$row=$result[0];
$seat=unserialize($row['seat']);
?>
<div class="tab rb" style="width:87%;">
      <div style="background:#ccc; width:100%; color:#333; text-align:left">
<table border=1 width="100%">
  <tr>
    <td colspan=2>感謝您的訂購，您的訂單編號是：<?=date("Ymd",strtotime($row['date'])).str_pad($row['id'],4,'0',STR_PAD_LEFT)?></td>
  </tr>
  <tr>
    <td>電影名稱</td>
    <?php $result=select("movie_t7","id=".$row['movie']);?>
    <td><?=$result[0]['title']?></td>
  </tr>
  <tr>
    <td>日期</td>
    <td><?=$row['date']?></td>
  </tr>
  <tr>
    <td>場次時間</td>
    <td><?=$se_time[$row['time']]?></td>
  </tr>
  <tr>
    <td colspan=2>座位：<br>
<?php
  foreach($seat as $value) echo (floor($value/5)+1)."排".($value%5)."號<br>"; //flloor=無條件捨,%=餘數
?>
  共<?=count($seat)?>張電影票
    </td>
  </tr>
</table>
        <div class="ct"><button onclick=<?=jlo('index.php')?>>確認</button></div>
      </div>
    </div>
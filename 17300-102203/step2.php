<form action="api.php?do=order" method=post>
<input type="hidden" name="movie" value="<?=$_POST['movie_id']?>">
<input type="hidden" name="date" value="<?=$_POST['date']?>">
<input type="hidden" name="time" value="<?=$_POST['time']?>">
<div class="tab rb" style="width:87%;">
      <div style="background:#FFF; width:100%; color:#333; text-align:left">
        <div style="text-align:center">

<?php 
  $result=select("book_t8","date='".$_POST['date']."' and time=".$_POST['time']);
  $seat=array();
  foreach($result as $row) $seat=array_merge($seat,unserialize($row['seat']));
        for($i=1;$i<=20;$i++)
					{
            if(in_array($i,$seat)) echo '<img src="img/03D03.png" style="margin-right:25px">';
            else{
              echo '
                <img src="img/03D02.png">
								<input type="checkbox" name="seat[]" value='.$i.' class="seat">
							';
            }
						if($i%5 == 0)	echo "<br>";
					}
?>
        </div>
        <div style="background:#ccc;width: 50%;color:#333;text-align:left;margin: 0 auto;padding: 0 25%;">
<?php $result=select("movie_t7","id=".$_POST['movie_id']);?>
          您選擇的電影是：<?=$result[0]['title']?><br>
          您選擇的時刻是：<?=$se_time[$_POST['time']]?><br>
          您已經勾選了<span id=seat>0</span>張票，最多可以購買四張票
        </div>
        <div class="ct"><input type="button" value="上一步" onclick="window.history.back()"><input type="submit" value="訂購"></div>
      </div>
    </div>
</form>
<script>
num=0;
$(".seat").change(function(){
  if(this.checked) (num<4)?num++:this.checked=false;
  else num--;
  $("#seat").text(num);
});
</script>



    
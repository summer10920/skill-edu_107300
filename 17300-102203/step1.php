<form action="booking.php?do=step2" method="post">
  <div class="tab rb" style="width:87%;">
    <div style="background:#FFF; width:100%; color:#333; text-align:left">
      <table>
        <tr>
          <td>電影</td>
          <td>
            <select name="movie_id" id="slt1" onchange=getdate() required>
              <option value="">請選擇電影</option>
<?php
$result=select("movie_t7","dpy=1 and date>='".$on_day."'");
foreach($result as $row) {
?>
    <option value=<?=$row['id']?> <?=(!empty($_GET['id'])&&$_GET['id']==$row['id'])?"selected":""?>><?=$row['title']?></option>;
<?php }?>
            </select>
          </td>
        </tr>
        <tr>
          <td>日期</td>
          <td>
            <select name="date" id="slt2" onchange=gettime() required>
            </select>
          </td>
        </tr>
        <tr>
          <td>場次</td>
          <td>
            <select name="time" id="slt3" required>
            </select>
          </td>
        </tr>
        <tr>
          <td colspan=2><input type="submit" value="確定"></td>
        </tr>
      </table>
    </div>
  </div>
</form>
<script>
if($("#slt1").val().length>0) getdate();  //初始若有value，就跑getdate
function getdate(){
  idx=$("#slt1").val();
  $.post("api.php?do=getdate",{idx},function(result){
    $("#slt2").html(result);
    gettime();
  });
}
function gettime(){
  movie=$("#slt1").val();
  date=$("#slt2").val();
    today=(date=='<?=date("Y-m-d")?>')?1:0;
  $.post("api.php?do=gettime",{movie,date,today},function(result){
    $("#slt3").html(result);
  });
}
</script>


    
<div class="half" style="vertical-align:top;">
      <h1>預告片介紹</h1>
      <div class="rb tab" style="width:95%;">
        <div id="abgne-block-20111227">
          <ul class="lists">
            <div class="ct show" style="height:68%;position:absolute;left:80px">
              <img id=show_img src="img/03A01.jpg" style="width:auto">
              <div id=show_text>電影名稱</div>
            </div>
          </ul>
          <ul class="controls" style="height:100px">
            <li style="padding:40px 0"><img style="height:100%" src="img/a.jpg" onclick=pp(1)></li>
<?php
  $show_ef=select("effect_t5","1");
  foreach($show_ef as $row) $item=$row['once'];
  $result=select("slider_t5","dpy=1");
  $i=0;
  foreach($result as $row){
?>
            <li style="height:100%" id="ssaa<?=$i?>" class="im"><img height="100%" src="img/<?=$row['img']?>" alt=<?=$row['text']?> onclick=ani(<?=$i?>)></li>
<?php
  $i++;
  }
?>
            <li style="padding:40px 0"><img style="height:100%"  src="img/b.jpg" onclick=pp(2)></li>
          </ul>
        </div>
      </div>
    </div>
<script>
  var nowpage=0,num=<?=$i?>; //image 0~9
  function pp(x){
    var s,t;
    if(x==1&&nowpage-1>=0) nowpage--;
    if(x==2&&(nowpage+1)<num-3) nowpage++;
    $(".im").hide()
    for(s=0;s<=3;s++){
      t=s*1+nowpage*1;
      $("#ssaa"+t).show();
    }
  }
  pp(1);
  
  function ani(idx){
    switch(<?=$item?>){
      case 1:
        $(".show").fadeToggle(function(){
          $(".show").fadeToggle(chg(idx));
        });
      break;
      case 2:
        $(".show").slideToggle(function(){
          $(".show").slideToggle(chg(idx));
        });
      break;
      case 3:
        $(".show").animate({left:'-400px'},function(){
          $(".show").css('left','400px');
          $(".show").animate({left:'80px'},chg(idx));
        });
      break;
    }
    run=idx;
  }
  function chg(idx){
    $("#show_img").attr("src" , $("#ssaa"+idx).children().attr("src"));
    $("#show_text").text( $("#ssaa"+idx).children().attr("alt") );
  }
  run=0;
  function auto(){
    run=(run==num-1)?0:run+1;
    ani(run);
  }
  setInterval(auto, 3000);
</script>
    <div class="half">
      <h1>院線片清單</h1>
      <div class="rb tab" style="width:95%;">
        <table width="100%" style="font-size:12px">
          <tbody>
            <tr>
<?php
    $page=(empty($_GET['page']))?1:$_GET['page'];
    $start=$page*4-4;
    
    $result=select("movie_t7","dpy=1 and date>='".$on_day."' limit ".$start.",4");
    foreach($result as $row){
        switch($row['cls']){case 1:$level="普遍級";break;case 2:$level="保護級";break;case 3:$level="輔導級";break;case 4:$level="限制級";break;}
?>
              <td width="210" height="160" style="float:left">
                <img src="upload/<?=$row['img']?>" style="height:100px;float:left;margin-right:10px;">
                <p><?=$row['title']?></p>
                <p>分級：<img src="img/03C0<?=$row['cls']?>.png" style="height:1.5em"> <?=$level?><br>
                上映日期：<?=$row['date']?></p>
                <a href='index.php?do=info&id=<?=$row['id']?>'><button>劇情簡介</button></a>
                <a href='booking.php?do=step1&id=<?=$row['id']?>'><button>線上訂票</button></a>
              </td>
<?php
}
?>
            </tr>
          </tbody>
        </table>
        <div class="ct">
<?php 
$result=page_link("movie_t7","dpy=1 and date>='".$on_day."'",4,$page);
foreach($result as $name=>$link) echo '<a href="index.php?page='.$link.'">'.$name.'</a>';
?>
        </div>
      </div>
    </div>
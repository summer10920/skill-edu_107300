<?php
include "sql.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0055)?do=meg -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>卓越科技大學校園資訊系統</title>
<link href="./news_files/css.css" rel="stylesheet" type="text/css">
<script src="./news_files/jquery-1.9.1.min.js"></script>
<script src="./news_files/js.js"></script>
</head>

<body>
<div id="cover" style="display:none; ">
	<div id="coverr">
    	<a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;" onclick="cl(&#39;#cover&#39;)">X</a>
        <div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;"></div>
    </div>
</div>
<iframe style="display:none;" name="back" id="back"></iframe>
	<div id="main">
		<a title="<?=$title_text?>" href="?"><div class="ti" style="background:url(&#39;<?=$title_img?>&#39;); background-size:cover;"></div><!--標題--></a>
        	<div id="ms">
             	<div id="lf" style="float:left;">
            		<div id="menuput" class="dbor">
                    <!--主選單放此-->
                                                    <span class="t botli">主選單區</span>
<?=$menu_text?>
                                                </div>
                    <div class="dbor" style="margin:3px; width:95%; height:20%; line-height:100px;">
                    	<span class="t">進站總人數 : 
						<?=$total_num?>                        </span>
                    </div>
        		</div>
                <div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
				<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;"><?=$maqe_text?></marquee>
                    <div style="height:32px; display:block;"></div>
<!-- t9 start -->
                                        <!--正中央-->
<!-- from index code start -->
<div style="width:95%; padding:2px; height:190px; margin-top:10px; padding:5px 10px 5px 10px; position:relative;">
    <span class="t botli" style="text-align:left">更多最新消息顯示區</span>
            <?php
                $now_page=empty($_GET['p'])?1:$_GET['p'];
                $str=$now_page*5-5;
            ?>
    <ol class="ssaa" style="list-style-type:decimal;" start="<?=$str+1?>">
<!-- from admin_image+sql+index code start -->
            <?php
                $result=select("news_t9","1 limit $str,5"); //資料不只一個名稱，所以還沒轉成$row。這裡要注意一下
                foreach($result as $row) 
                    echo "<li style='width:220px'>".mb_substr($row['text'],0,10)."<span class='all' style='display:none'>".$row['text']."</li>";
            ?>
<!-- from admin_image+sql+index code end -->
    </ol>
    <div id="altt" style="position: absolute; width: 350px; min-height: 100px; background-color: rgb(255, 255, 204); top: 50px; left: 220px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>

        <script>
            $(".ssaa li").hover(
                function (){
                    $("#altt").html("<pre>"+$(this).children(".all").html()+"</pre>")
                    $("#altt").show()
                }
            )
            $(".ssaa li").mouseout(
                function(){
                    $("#altt").hide()
                }
            )
        </script>
</div>
<!-- from index code end -->
<!-- from admin_image code start -->
<div style="text-align:center;">
        <?php
            $pagelink=page_link("news_t9",0,5,$now_page);
            foreach($pagelink as $name=>$data)
                if(is_array($data)) foreach($data as $value) {
                    $size=($value==$now_page)?50:30;
                    echo "<a class='bl' style='font-size:".$size."px;' href='?p=".$value."'>".$value."</a>";
                }
                else
                    echo "<a class='bl' style='font-size:30px;' href='?p=".$data."'>".$name."</a>";
        ?>
</div>
<!-- from admin_image code end -->
<!-- t9 end -->
	                </div>
                <div id="alt" style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
                    	<script>
						$(".sswww").hover(
							function ()
							{
								$("#alt").html(""+$(this).children(".all").html()+"").css({"top":$(this).offset().top-50})
								$("#alt").show()
							}
						)
						$(".sswww").mouseout(
							function()
							{
								$("#alt").hide()
							}
						)
                        </script>
                                 <div class="di di ad" style="height:540px; width:23%; padding:0px; margin-left:22px; float:left; ">
                	<!--右邊-->   
                	<button style="width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;" onclick="lo(&#39;<?=$btnlink?>&#39;)"><?=$btn?></button>
                	<div style="width:89%; height:480px;" class="dbor">
                    	<span class="t botli">校園映象區</span>

<div class="cent" style="width:80%;margin:10px auto">
	<img src="img/01E01.jpg" onclick="pp(1)">
<?php
	foreach($img_ary as $key=>$value) {
		echo "<img class='im' id='ssaa".($key)."' src='".$value."' width=150 height=103>";
	}
?>
	<img src="img/01E02.jpg" onclick="pp(2)">
</div>

<script>
	var nowpage=0,num=<?=count($img_ary)?>;
	function pp(x){
		var s,t;
		if(x==1&&nowpage-1>=0) {nowpage--;}
		if(x==2&&(nowpage+1)<=num-3) {nowpage++;}
		$(".im").hide()
		for(s=0;s<=2;s++){
			t=s*1+nowpage*1;
			$("#ssaa"+t).show()
		}
	}
	pp(1);
</script>
                    </div>
                </div>
                            </div>
             	<div style="clear:both;"></div>
            	<div style="width:1024px; left:0px; position:relative; background:#FC3; margin-top:4px; height:123px; display:block;">
				<span class="t" style="line-height:123px;"><?=$bottom_text?></span>
                </div>
    </div>

</body></html>
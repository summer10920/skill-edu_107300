<?php
include "sql.php";
$main_content=(empty($_GET['do']))?"main":$_GET['do'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>┌精品電子商務網站」</title>
<link href="./home_files/css.css" rel="stylesheet" type="text/css">
<script src="./home_files/js.js"></script>
<script src="scripts/jquery-1.9.1.min.js"></script>
</head>

<body>
<iframe name="back" style="display:none;"></iframe>
	<div id="main">
    	<div id="top">
        	<a href="?">
            	<img src="./home_files/0416.jpg">
            </a>
                        <div style="padding:10px;">
                <a href="index.php">回首頁</a> |
                <a href="?do=news">最新消息</a> |
                <a href="?do=look">購物流程</a> |
                <a href="?do=buycart">購物車</a> |
                                <?=(empty($_SESSION['user']))?'<a href="?do=login">會員登入</a> |':'<a href="api.php?do=userlogout">會員登出</a> |'?>
                                <a href="?do=adminlogin">管理登入</a>
           </div>
                <marquee>
                <?php
                        $result=select("maqe_t6",0);
                        foreach($result as $row) echo $row['title']."　　　";
                ?>
                </marquee>
                        </div>
        <div id="left" class="ct">
        	<div style="min-height:400px;">
                        <a href="?">全部商品</a>
<?php
$resultA=select("class_t4","parent=0");
foreach($resultA as $father){
        echo '<a onmouseover="show('.$father['id'].')" href="?faid='.$father['id'].'">'.$father['title'].'</a>';
        $resultB=select("class_t4","parent=".$father['id']);
        foreach ($resultB as $son) echo '<a class="son fa'.$father['id'].'" href="?sonid='.$son['id'].'" style="display:none;background: #f2dabf;">'.$son['title'].'</a>';
}
?>
                    </div>
<script>
function show(who){
    $('.son').css('display','none');
    $('.fa'+who).css('display','block');
}
</script>
                        <span>
            	<div>進站總人數</div>
                <div style="color:#f00; font-size:28px;">
                	00005                </div>
            </span>
                    </div>
        <div id="right">
        <?php include $main_content.".php"; ?>
        	        </div>
        <div id="bottom" style="line-height:70px;background:url(icon/bot.png); color:#FFF;" class="ct">
                <?php
                $footer=select("footer_t11","1");
                echo $footer[0]['once'];
                ?>
        </div>
    </div>

</body></html>
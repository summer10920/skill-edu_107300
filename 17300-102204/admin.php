<?php
include "sql.php";
if(empty($_SESSION['admin'])) plo("index.php?do=adminlogin");
$result=select("admin_t10","acc='".$_SESSION['admin']."'");
$access=unserialize($result[0]['access']);
$admin_zone=(empty($_GET['do']))?"admin_admin":$_GET['do']."_".$_GET['redo'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0057)?do=admin -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>┌精品電子商務網站」</title>
<link href="./Manage Page_files/css.css" rel="stylesheet" type="text/css">
<script src="./Manage Page_files/js.js"></script>
<script src="scripts/jquery-1.9.1.min.js"></script>
</head>

<body>
<iframe name="back" style="display:none;"></iframe>
	<div id="main">
    	<div id="top">
        	<a href="?">
            	<img src="./Manage Page_files/0416.jpg">
            </a>
                            <img src="./Manage Page_files/0417.jpg">
                   </div>
        <div id="left" class="ct">
        	<div style="min-height:400px;">
        	            	<a href="?do=admin&redo=admin">管理權限設置</a>
<?php if($access[0]) {?><a href="?do=admin&redo=th">商品分類與管理</a><?php }?>
<?php if($access[1]) {?><a href="?do=admin&redo=order">訂單管理</a><?php }?>
<?php if($access[2]) {?><a href="?do=admin&redo=mem">會員管理</a><?php }?>
<?php if($access[3]) {?><a href="?do=admin&redo=bot">頁尾版權管理</a><?php }?>
<?php if($access[4]) {?><a href="#">最新消息管理</a><?php }?>
            	        	<a href="api.php?do=adminlogout" style="color:#f00;">登出</a>
                    </div>
                    </div>
        <div id="right">
		<?php include $admin_zone.".php"?>
        	        </div>
        <div id="bottom" style="line-height:70px; color:#FFF; background:url(icon/bot.png);" class="ct">
			<?php
				$footer=select("footer_t11","1");
				echo $footer[0]['once'];
			?>
		</div>
    </div>

</body></html>
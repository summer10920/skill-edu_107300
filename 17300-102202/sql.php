<?php
//  更改時區
date_default_timezone_set('Asia/Taipei');
//  SQL連結之物件 註1
$dblink=new PDO("mysql:host=127.0.0.1;dbname=php_v2q2;charset=utf8","root","");
//open session;
session_start();
// php轉址
function plo($link){
    return header("location:".$link);
}
// JS轉址
function jlo($link){
	return "location.href='".$link."'";
}
//select SQL
function select($table,$where){	//TABLE名稱,條件
	global $dblink;
	return $dblink->query("SELECT * FROM ".$table." WHERE ".$where)->fetchAll();
}
//分頁導覽 註2
function page_link($table,$where,$range,$now_page){			//TABLE名稱,條件,單頁範圍比數,目前頁碼
	$total=count(select($table,$where));					//計算該table有多少筆總數
	$many=ceil($total/$range);								//總頁數為 總數除以單頁範圍，無條件進位(ceil)
	$page_nav['<']=($now_page==1)?1:$now_page-1;			//左箭頭的頁碼依目前頁有不同定義，不是1就是少1
	for($i=1;$i<=$many;$i++) $page_nav[$i]=$i;				//一連串的數字與頁碼定義
	$page_nav['>']=($now_page==$many)?$now_page:$now_page+1;	//左箭頭的頁碼依目前頁有不同定義，不是1就是少1
	return $page_nav;
}
//insert SQL單筆 註3
function insert($ary,$table){	//陣列,TABLE名稱
	global $dblink;
	$table_name="id";
	$table_val="null";
	foreach($ary as $name=>$value){
		$table_name.=",".$name;
		$table_val.=",'".$value."'";
	}
	$dblink->exec("INSERT INTO ".$table." (".$table_name.") VALUES(".$table_val.")");
	return $dblink->lastInsertId();	//取得這筆的ID回傳
}
//update SQL 註4
function update($ary,$table){
	global $dblink;
	foreach($ary as $name=>$data){
		switch($name){
			case 'dpy': //dpy的前端必須先對所有ID對象設定$value=0 or 1
				foreach($data as $idx=>$value)		//$idx=索引,$value=0 or 1
					$dblink->exec("UPDATE ".$table." SET dpy=".$value." WHERE id=".$idx);	//指定的變1
			break;
			case 'once':
				$dblink->exec("UPDATE ".$table." SET once='".$data."' WHERE 1");
			break;
			case 'num+1':
				$dblink->exec("UPDATE ".$table." SET num=num+1 WHERE id=".$data);
			break;
			case 'num-1':
				$dblink->exec("UPDATE ".$table." SET num=num-1 WHERE id=".$data);
			break;
			default:
				foreach($data as $idx=>$value)
					$dblink->exec("UPDATE ".$table." SET ".$name."='".$value."' WHERE id=".$idx);
			break;
		}
	}
}
//delete SQL
function delete($ary,$table){
	global $dblink;
	foreach($ary as $name=>$data){
		switch($name){
			case 'del':
				if(!is_array($data))
					$dblink->exec("DELETE  FROM ".$table." WHERE id=".$data);
				else
					foreach($data as $idx)
						$dblink->exec("DELETE  FROM ".$table." WHERE id=".$idx);
			break;
			case 'delat':
				$dblink->exec("DELETE  FROM ".$table." WHERE ".$data);
			break;
		}
	}
}
//add file	單筆，不要整個$_FILES丟過來
function addfile($file){
	$name=date("YmdHis")."_".$file["name"];
	copy($file["tmp_name"],"upload/".$name);
	return $name;
}
/*  註1
PDO是一種可以連線任何品牌的SQL連線方式。(mysql,mssql,oracle等等都可以)
PHP5.4有列入為內建物件導向，使用前需要new物件並存放到變數$dblink
之後舉凡任何sql的insert,update,select,delete都能透過PDO的函式執行

***宣告前先提供連線資訊，帳號，密碼***
連線資訊為 "類型:host=位置;dbname=資料庫名;charset=編碼"

本解析會用到的PDO function為
query()->fetchAll()	//執行SQL取得多筆資料以陣列回傳(fetchAll需搭配query)
exec()		//語法執行，會回傳受影響之筆數
*/

/* 註2
產生一個array，紀錄key與value。key=文字，value=頁碼。
讓前端以此array逐一列印出來。同時用link的URL來做網址。例如
foreach($result as $key=>$value)
	echo '<a href="?gage='.$value.'">'.$key.'</a> ';
這樣你會得到一連串的超連結	
*/

/* 註3
SQL新增語法=INSERT INTO table (name1,name2,name3...)VALUES(val1,val2,val3...) 
因此你需要整理成以上字串，再透過exec()去執行結果
整理時，forech幫忙加上,，最後跑完最後再刪除最後的,
*/

/*註4
題目大部分提出修改的有單筆或多筆。兩者的處理方式只差別前端用一維或二維陣列包過來的
修改方式有三種不同做法，分類出是dpy(顯不顯示之修改)，once(單值修改)，跟普通的資料修改
利用array的$name(key值)來判斷要哪種的[修改動作]

dpy在前端有兩種，單筆的radio(第一題)，多筆的checkbox(四大題都有)
dpy:radio就是包dpy(修改動作)跟data(ID)就夠了，因為知道目標值要改1
dpy:checked就是包dpy(修改動作)跟data(value+id)，data是個二維陣列，需要知道各筆的value跟id會是什麼

once:資料庫只有一筆，所以可以取得data(值)就好，where條件為1

default: 其他考量，可能有單筆或多筆。就不管全部都要做成二維陣列
$array as $name=>$data
	$data as $idx=>$value
$name=欄位名稱
$idx=索引
$value=修改值
*/
?>
<?php
/***********************Q2***********************/
//t3
$t3today=date("m月d號 l");	//今日日期
if(empty($_SESSION['visit'])){	//新訪客時
    $_SESSION['visit']=123;
    $result=select("t3_visit","date='".date("Y-m-d")."'");
    if($result==null){	//如果找不到今天資料則新增一筆今日，同時宣告拜訪數為1
        $ary['date']=date("Y-m-d");
        $ary['num']=1;
        insert($ary,"t3_visit");
        $_SESSION['visit_num']=1;//拜訪數回存
    }
    else{
        $ary['num+1']=$result[0]['id'];//更新拜訪數+1
        update($ary,"t3_visit");
        $_SESSION['visit_num']=$result[0]['num']+1;//剛取得的拜訪數+1回存
    }
}
$result=select("t3_visit",1);
$t3total=0;
foreach($result as $row) $t3total+=$row['num'];//計算所有拜訪數總值
//t4
$admin_active=(!empty($_SESSION['user'])&&$_SESSION['user']=='admin')?"admin_main":"main";
$content_zone=(empty($_GET['do']))?$admin_active:$_GET['do'];
//t6
$t6userbtn=(empty($_SESSION['user']))?'<a href="?do=login">會員登入</a>':'歡迎，'.$_SESSION['user'].' <a style="border: solid 1px #000000" href="api.php?do=logout">登出</a>';
//t14
$usermenu='
<a class="blo" href="?do=po">分類網誌</a>
<a class="blo" href="?do=news">最新文章</a>
<a class="blo" href="?do=pop">人氣文章</a>
<a class="blo" href="#">講座訊息</a>
<a class="blo" href="?do=que">問卷調查</a>
';
$adminmenu='
<a class="blo" href="?do=admin_user">帳號管理</a>
<a class="blo" href="#">分類網誌</a>
<a class="blo" href="?do=admin_news">最新文章管理</a>
<a class="blo" href="#">講座管理</a>
<a class="blo" href="?do=admin_que">問卷調查</a>
';
$menu=(!empty($_SESSION['user'])&&$_SESSION['user']=='admin')?$adminmenu:$usermenu;
?>
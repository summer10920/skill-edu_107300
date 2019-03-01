<?php
//  更改時區
date_default_timezone_set('Asia/Taipei');
//  SQL連結之物件 註1
$dblink=new PDO("mysql:host=127.0.0.1;dbname=php_v2q1;charset=utf8","root","");
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
	echo "INSERT INTO ".$table." (".$table_name.") VALUES(".$table_val.")";
	$dblink->exec("INSERT INTO ".$table." (".$table_name.") VALUES(".$table_val.")");
	return $dblink->lastInsertId();	//取得這筆的ID回傳
}
//update SQL 註4
function update($ary,$table){
	global $dblink;
	foreach($ary as $name=>$data){
		switch($name){
			case 'dpy':
				if(!is_array($data)){	//radio的dpy，只有(被選定的)一個為1，其他為0
					$dblink->exec("UPDATE ".$table." SET dpy=0 WHERE 1");	//全部先變0
					$dblink->exec("UPDATE ".$table." SET dpy=1 WHERE id=".$data);	//指定的變1
				}
				else{	//checkbox的dpy,前端必須先多設$value=0 or 1
					foreach($data as $idx=>$value)		//$idx=索引,$value=0 or 1
						$dblink->exec("UPDATE ".$table." SET dpy=".$value." WHERE id=".$idx);	//指定的變1
				}
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
//add file	單筆，不要整個$_FILES丟過藍
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
/***********************Q1********************/
//t10 前台登入按鈕
if(!empty($_SESSION['admin'])){
	$btn="後台管理";
	$btn_link="admin.php";
}
else{
	$btn="管理登入";
	$btn_link="login.php";
}

//t3
$result=select("t3_title","dpy=1");
$t3img="upload/".$result[0]['img'];
$t3title=$result[0]['title'];

//t4
$result=select("t4_maqe","dpy=1");
$t4maqe="";
foreach($result as $row) $t4maqe.=$row['text']."　　";

//t5
$result=select("t5_mvim","dpy=1");
foreach($result as $row) $t5mvim[]="upload/".$row['file'];

//t6
$result=select("t6_img","dpy=1");
$t6img='<img src="img/01E01.jpg" onclick="pp(1)">';
foreach($result as $key=>$row)
	$t6img.='<img src="upload/'.$row['file'].'" width=150 height=103 id="ssaa'.$key.'" class="im">';
$t6img.='<img src="img/01E02.jpg" onclick="pp(2)">';
$t6total=count($result);

//t7
if(empty($_SESSION['visit'])){
	$_SESSION['visit']="welcome";
	$result=select("t7_total",1);
	$post['once']=$result[0]['once']+1;
	update($post,"t7_total");
}
$result=select("t7_total",1);
$t7total=$result[0]['once'];

//t8
$result=select("t8_footer",1);
$t8footer=$result[0]['once'];

//t9
$result=select("t9_news","dpy=1");
$t9total=count($result);
$max=($t9total>5)?5:$t9total;
$t9news="";
for($i=0;$i<$max;$i++)
	$t9news.='<li>'.mb_substr($result[$i]['text'],0,10).'<span class="all" style="display:none">'.$result[$i]['text'].'</span></li>';

//t9 more
$nowpage=(empty($_GET['page']))?1:$_GET['page'];
$t9beign=($nowpage-1)*5;
$result=select("t9_news","dpy=1 limit ".$t9beign.",5");
$t9more="";
foreach($result as $row)
	$t9more.='<li class=sswww>'.mb_substr($row['text'],0,10).'<span class="all" style="display:none">'.$row['text'].'</span></li>';

$result=page_link("t9_news","dpy=1",5,$nowpage);
$t9page="";
foreach($result as $name=>$data){
	if($nowpage==$name)
		$t9page.=' <a class="bl" style="text-decoration:none;font-size:60px" href="?page='.$data.'">'.$name.'</a> ';
	else
		$t9page.=' <a class="bl" style="text-decoration:none;font-size:30px;" href="?page='.$data.'">'.$name.'</a> ';
}
//t12
$t12menu="";
$result=select("t12_menu","dpy=1 and parent=0");
foreach($result as $row){
	$t12menu.='<div class="mainmu"><a style="color:#000; font-size:13px; text-decoration:none;" href="'.$row['link'].'">'.$row['title'];
	$subresult=select("t12_menu","parent=".$row['id']);
	foreach($subresult as $sub)
		$t12menu.='<div class="mainmu2 mw" style="display:none"><a style="color:#000; font-size:13px; text-decoration:none;" href="'.$sub['link'].'">'.$sub['title'].'</a></div>';
	$t12menu.='</a></div>';
}
?>
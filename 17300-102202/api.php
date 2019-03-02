<?php
include "sql.php";
switch ($_GET['do']){
	case 'login':
		$result=select("t6_user","acc='".$_POST['acc']."'");
		if($result==null) echo"<script>alert('查無帳號');".jlo("index.php?do=login").";</script>";
		$result=select("t6_user","acc='".$_POST['acc']."' and pwd='".$_POST['pwd']."'");
		if($result==null) echo"<script>alert('密碼錯誤');".jlo("index.php?do=login").";</script>";
		else{
			$_SESSION['user']=$_POST['acc'];
			plo("index.php");
		}
	break;
	case 'logout':
		unset($_SESSION['user']);
		plo("index.php");
	break;
	case 'reg':
		if($_POST['acc']==""||$_POST['pwd']==""||$_POST['pwd2']==""||$_POST['mail']=="")
			echo"<script>alert('不可空白');window.history.back();</script>";
		else{
			$result=select("t6_user","acc='".$_POST['acc']."'");
			if($result!=null) echo"<script>alert('帳號重複');window.history.back();</script>";
			else{
				unset($_POST['pwd2']);
				insert($_POST,"t6_user");
				echo"<script>alert('註冊完成，歡迎加入');".jlo("index.php").";</script>";
			}
		}
	break;
	case 'addgood':
		$post['user']=$_SESSION['user'];
		$post['blog']=$_GET['id'];
		insert($post,"t11_good");
		$readd['num+1']=$_GET['id'];
		update($readd,"t7_blog");
		echo "<script>window.history.back()</script>";
	break;
	case 'subgood':
		$post['delat']="user='".$_SESSION['user']."' and blog=".$_GET['id'];
		delete($post,"t11_good");
		$readd['num-1']=$_GET['id'];
		update($readd,"t7_blog");
		echo "<script>window.history.back()</script>";
	break;
	case 'vote':
		update($_POST,"t13_vote");
		plo("index.php?do=que");
	break;
	case 'delmem':
		delete($_POST,"t6_user");
		plo("index.php?do=admin_user");
	break;
	case 'adminnews':
		update($_POST,"t7_blog");
		delete($_POST,"t7_blog");
		plo("index.php?do=admin_news");
	break;
	case 'addque':
		$new['text']=$_POST['title'];
		$new['parent']=0;
		$getid=insert($new,"t13_vote");
		foreach($_POST['text'] as $data){
			$myson['text']=$data;
			$myson['parent']=$get;
			insert($myson,"t13_vote");
		}
		plo("index.php");
	break;
}

?>
<?php
include "sql.php";
switch($_GET['do']){
	case 'check':
		$result=select("t10_admin","acc='".$_POST['acc']."' and pwd='".$_POST['pwd']."'");
		if($result!=null) {
			$_SESSION['admin']=$_POST['acc'];
			plo("admin.php");
		}
		else echo "<script>alert('帳號或密碼輸入錯誤');".jlo('login.php').";</script>";
	break;
	case 'logout':
		unset($_SESSION['admin']);
		plo("login.php");
	break;
	case 'addtitle':
		$_POST['img']=addfile($_FILES['file']);	//將FILE上傳檔案後取得新檔案名，歸入為$_POST['img']
		insert($_POST,"t3_title");
		plo("admin.php");
	break;
	case 'mdytitle':
		update($_POST,"t3_title");
		delete($_POST,"t3_title");
		plo("admin.php");
	break;
	case 'chgtitle':
		$post['img'][$_POST['id']]=addfile($_FILES['file']);
		update($post,"t3_title");
		plo("admin.php");
	break;
	case 'addmaqe':
		insert($_POST,"t4_maqe");
		plo("admin.php?do=admin&redo=ad");
	break;
	case 'mdymaqe':
		update($_POST,"t4_maqe");
		delete($_POST,"t4_maqe");
		plo("admin.php?do=admin&redo=ad");
	break;
	case 'addmvim':
		$_POST['file']=addfile($_FILES['file']);
		insert($_POST,"t5_mvim");
		plo("admin.php?do=admin&redo=mvim");
	break;
	case 'mdymvim':
		update($_POST,"t5_mvim");
		delete($_POST,"t5_mvim");
		plo("admin.php?do=admin&redo=mvim");
	break;
	case 'chgmvim':
		$_POST['file'][$_POST['id']]=addfile($_FILES['file']);
		update($_POST,"t5_mvim");
		plo("admin.php?do=admin&redo=mvim");
	break;
	case 'addimage':
		$_POST['file']=addfile($_FILES['file']);
		insert($_POST,"t6_img");
		plo("admin.php?do=admin&redo=image");
	break;
	case 'mdyimage':
		update($_POST,"t6_img");
		delete($_POST,"t6_img");
		plo("admin.php?do=admin&redo=image");
	break;
	case 'chgimage':
		$_POST['file'][$_POST['id']]=addfile($_FILES['file']);
		update($_POST,"t6_img");
		plo("admin.php?do=admin&redo=image");
	break;
	case 'mdytotal':
		update($_POST,"t7_total");
		plo("admin.php?do=admin&redo=total");
	break;
	case 'mdyfooter':
		update($_POST,"t8_footer");
		plo("admin.php?do=admin&redo=bottom");
	break;
	case 'addnews':
		insert($_POST,"t9_news");
		plo("admin.php?do=admin&redo=news");
	break;
	case 'mdynews':
		print_r($_POST);
		update($_POST,"t9_news");
		delete($_POST,"t9_news");
		plo("admin.php?do=admin&redo=news");
	break;
	case 'addadmin':
		insert($_POST,"t10_admin");
		plo("admin.php?do=admin&redo=admin");
	break;
	case 'mdyadmin':
		update($_POST,"t10_admin");
		delete($_POST,"t10_admin");
		plo("admin.php?do=admin&redo=admin");
	break;
	case 'addmenu':
		insert($_POST,"t12_menu");
		plo("admin.php?do=admin&redo=menu");
	break;
	case 'mdymenu':
		update($_POST,"t12_menu");
		delete($_POST,"t12_menu");
		plo("admin.php?do=admin&redo=menu");
	break;
	case 'submenu':
		foreach($_POST as $name=>$data){
			switch($name){
				case substr($name,0,3)=="new": 
					$new[substr($name,4)]=$data;
				break;
				case substr($name,0,3)=="old": 
					$old[substr($name,4)]=$data;
				break;
			}
		}
		if($new!=null)
			for($i=0;$i<count($new['del']);$i++){
				if($new['del'][$i]) continue;
				$newpost['title']=$new['title'][$i];
				$newpost['link']=$new['link'][$i];
				$newpost['parent']=$_GET['id'];
				insert($newpost,"t12_menu");
			}
		update($old,"t12_menu");
		delete($old,"t12_menu");
		plo("admin.php?do=admin&redo=menu");
	break;
}
?>
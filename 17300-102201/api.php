<?php
include "sql.php";
switch($_GET["do"]){
  case 'check':
    $row=select("admin_t10","acc='".$_POST['acc']."' and pwd='".$_POST['ps']."'");
    $num=count($row);
    if($num) {
      $_SESSION['admin']=$_POST['acc'];
      plo("admin.php");
    }
    else echo "<script>alert('帳號或密碼輸入錯誤');window.history.back();</script>";
  break;
  case 'logout':
    unset($_SESSION['admin']);
    plo("login.php");
  break;
  case 'add_title':
    $_POST['file']=addfile($_FILES);//因為FILES無法歸入POST，另外處理再回傳新名字;
    insert($_POST,"title_t3");
    plo("admin.php");
  break;
  case 'tii':
    update($_POST,"title_t3");
    delete($_POST,"title_t3");
    plo("admin.php");
  break;
  case 'mdy_title':
    $newpost['file'][$_POST['id']]=addfile($_FILES);//因為FILES無法歸入POST，另外處理再回傳新名字，同時將idx與filename合併為一個array
    update($newpost,"title_t3");
    plo("admin.php");
  break;
  case 'add_meqe':
    insert($_POST,"maqe_t4");
    plo("admin.php?do=admin&redo=ad");
  break;
  case 'meqe':
    update($_POST,"maqe_t4");
    delete($_POST,"maqe_t4");
    plo("admin.php?do=admin&redo=ad");
  break;
  case 'add_mvim':
    $_POST['file']=addfile($_FILES);//因為FILES無法歸入POST，另外處理再回傳新名字;
    insert($_POST,"mvim_t5");
    plo("admin.php?do=admin&redo=mvim");
  break;
  case 'mvim':
    update($_POST,"mvim_t5");
    delete($_POST,"mvim_t5");
    plo("admin.php?do=admin&redo=mvim");
  break;
  case 'mdy_mvim':
    $newpost['file'][$_POST['id']]=addfile($_FILES);//因為FILES無法歸入POST，另外處理再回傳新名字，同時將idx與filename合併為一個array
    update($newpost,"mvim_t5");
    plo("admin.php?do=admin&redo=mvim");
  break;
  case 'add_image':
    $_POST['file']=addfile($_FILES);//因為FILES無法歸入POST，另外處理再回傳新名字;
    insert($_POST,"img_t6");
    plo("admin.php?do=admin&redo=image");
  break;
  case 'image':
    update($_POST,"img_t6");
    delete($_POST,"img_t6");
    plo("admin.php?do=admin&redo=image");
  break;
  case 'mdy_image':
    $newpost['file'][$_POST['id']]=addfile($_FILES);//因為FILES無法歸入POST，另外處理再回傳新名字，同時將idx與filename合併為一個array
    update($newpost,"img_t6");
    plo("admin.php?do=admin&redo=image");
  break;
  case 'total':
    update($_POST,"total_t7");
    plo("admin.php?do=admin&redo=total");
  break;
  case 'bottom':
    update($_POST,"footer_t8");
    plo("admin.php?do=admin&redo=bottom");
  break;
  case 'add_news':
    insert($_POST,"news_t9");
    plo("admin.php?do=admin&redo=news");
  break;
  case 'news':
    update($_POST,"news_t9");
    delete($_POST,"news_t9");
    plo("admin.php?do=admin&redo=news");
  break;
  case 'add_admin':
    if($_POST['pwd']!=$_POST['pwd2']) echo "<script>alert('密碼不一致');window.history.back();</script>";
    else {
      unset($_POST['pwd2']); //pwd2清掉，否則sql公用會無法新增(SQL沒有pwd2的欄位)
      insert($_POST,"admin_t10");
      plo("admin.php?do=admin&redo=admin");
    }
  break;
  case 'admin':
    update($_POST,"admin_t10");
    delete($_POST,"admin_t10");
    plo("admin.php?do=admin&redo=admin");
  break;
  case 'add_menu':
    insert($_POST,"menu_t12");
    plo("admin.php?do=admin&redo=menu");
  break;
  case 'menu':
    update($_POST,"menu_t12");
    delete($_POST,"menu_t12");
    plo("admin.php?do=admin&redo=menu");
  break;
  case 'mdy_menu':
    foreach($_POST as $name=>$data) {
      if(substr($name,0,3)=="new") $new_ary[substr($name,4)]=$data;
      else $old_ary[$name]=$data;
    }
    for($i=0;$i<count($new_ary['text']);$i++){
      $newpost['text']=$new_ary['text'][$i];
      $newpost['link']=$new_ary['link'][$i];
      $newpost['dpy']=$new_ary['dpy'][$i];
      $newpost['parent']=$new_ary['parent'][$i];
      insert($newpost,"menu_t12");
    }
    update($old_ary,"menu_t12");
    delete($old_ary,"menu_t12");
    plo("admin.php?do=admin&redo=menu");
  break;
}
?>
<?php
include "sql.php";
switch($_GET['do']){
    case 'adminlogin':
        $result=select("admin_t10","acc='".$_POST['acc']."' and pwd='".$_POST['pwd']."'");
        if($result==null) echo "fail";
        else {
            $_SESSION['admin']=$_POST['acc'];
            echo "ok";
        }
    break;
    case 'adminlogout':
        unset($_SESSION['admin']);
        plo("index.php");
    break;
    case 'addadmin':
        $access=array_fill(0,5,0);
        foreach($_POST['allow'] as $value) $access[$value]=1;
        $_POST['access']=serialize($access);
        unset($_POST['allow']);
        insert($_POST,"admin_t10");
        plo("admin.php");
    break;
    case 'mdyadmin':
        $access=array_fill(0,5,0);
        foreach($_POST['allow'] as $value) $access[$value]=1;
        $_POST['access'][$_POST['id']]=serialize($access);
        unset($_POST['allow'],$_POST['id']);
        update($_POST,"admin_t10");
        plo("admin.php");
    break;
    case 'deladmin':
        $post['del']=[$_GET['id']];
        delete($post,"admin_t10");
        plo("admin.php");
    break;
    case 'addfa':
        $_POST['parent']=0;
        insert($_POST,"class_t4");
        plo("admin.php?do=admin&redo=th");
    break;
    case 'addson':
        insert($_POST,"class_t4");
        plo("admin.php?do=admin&redo=th");
    break;
    case 'mdycls':
        update($_POST,"class_t4");
        plo("admin.php?do=admin&redo=th");
    break;
    case 'delcls':
        $post['del']=$_GET['id'];
        delete($post,"class_t4");
        plo("admin.php?do=admin&redo=th");
    break;
    case 'getson':
        print_r($_POST);
        $result=select("class_t4","parent=".$_POST['idx']);
        foreach($result as $row){
            $lockson=($_POST['cls']!=null&&$row['id']==$_POST['cls'])?"selected":"";
            echo '<option value="'.$row['id'].'"'.$lockson.'>'.$row['title'].'</option>';
        } 
    break;
    case 'addproduct':
    $_POST['img']=addfile($_FILES['img']);
        insert($_POST,"product_t5");
        plo("admin.php?do=admin&redo=product");
    break;
    case 'mdyproduct':
        if(!empty($_FILES['img']['name'])) $_POST['img'][$_POST['id']]=addfile($_FILES['img']);
        unset($_POST['id']);
        print_r($_POST);
        update($_POST,"product_t5");
        plo("admin.php?do=admin&redo=product");
    break;
    case 'delproduct':
        $post['del']=$_GET['id'];
        delete($post,"product_t5");
        plo("admin.php?do=admin&redo=product");
    break;
    case 'onproduct':
        $post['dpy'][$_GET['id']]=1;
        update($post,"product_t5");
        plo("admin.php?do=admin&redo=product");
    break;
    case 'offproduct':
        $post['dpy'][$_GET['id']]=0;
        update($post,"product_t5");
        plo("admin.php?do=admin&redo=product");
    break;
    case 'checkacc':
        if($_POST['acc']=="admin") echo "不得使用admin作為帳號註冊";
        else if($_POST['acc']=="") echo "尚未填入帳號";
        else{
            $result=select("user_t9","acc='".$_POST['acc']."'");
            if($result!=null) echo "帳號重複";
            else echo "可使用此帳號";
        }
    break;
    case 'userlogin':
        $result=select("user_t9","acc='".$_POST['acc']."' and pwd='".$_POST['pwd']."'");
        if($result==null) echo "fail";
        else {
            $_SESSION['user']=$_POST['acc'];
            echo "ok";
        }
    break;
    case 'userlogout':
        unset($_SESSION['user']);
        plo("index.php");
    break;
    case 'adduser':
        $_POST['date']=date("Y-m-d");
        insert($_POST,"user_t9");
    break;
    case 'importcart':
        $_SESSION['buy'][$_POST['id']]=$_POST;
        if(empty($_SESSION['user'])) plo("index.php?do=login");
        else plo("index.php?do=buycart");
    break;
    case 'delcart':
        unset($_SESSION['buy'][$_GET['id']]);
        plo("index.php?do=buycart");
    break;
    case 'order':
        $_POST['acc']=$_SESSION['user'];
        $_POST['date']=date("Y-m-d");
        $_POST['buy']=serialize($_SESSION['buy']);
        unset($_SESSION['buy']);
        insert($_POST,"order_t8");
        echo '<script>alert("訂購成功\n感謝您的選購");'.jlo("index.php").';</script>';
    break;
    case 'delorder':
        $post['del']=$_GET['id'];
        delete($post,"order_t8");
        plo('admin.php?do=admin&redo=order');
    break;
    case 'mdyuser':
        update($_POST,"user_t9");
        plo('admin.php?do=admin&redo=mem');
    break;
    case 'delmem':
        $post['del']=$_GET['id'];
        delete($post,"user_t9");
        plo('admin.php?do=admin&redo=mem');
    break;
    case 'mdyfooter':
        update($_POST,"footer_t11");
        plo('admin.php?do=admin&redo=bot');
    break;
}
?>
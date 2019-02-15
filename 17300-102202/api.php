<?php
include "sql.php";
switch($_GET['do']){
    case 'login':
        $check=select("user_t6","acc='".$_POST['acc']."'");
        if($check==null) echo "<script>alert('查無帳號');window.history.back();</script>";
        else{
            $check=select("user_t6","acc='".$_POST['acc']."' and pwd='".$_POST['pwd']."'");
            if($check==null) echo "<script>alert('密碼錯誤');window.history.back();</script>";
            else{
                foreach($check as $row) $_SESSION['acc']=$row['acc'];
                plo("index.php");
            }
        }
    break;
    case 'reg':
        $check=select("user_t6","acc='".$_POST['acc']."'");
        if($check!=null) echo "帳號重複";
        else{
            insert($_POST,"user_t6");
            echo "帳號註冊成功";
        }
    break;
    case 'goodadd':
        $post['num'][$_GET['id']]="num+1";
        update($post,"blog_t7");
        $goodpost['user']=$_SESSION['acc'];
        $goodpost['blog']=$_GET['id'];
        insert($goodpost,"good_t11");
        plo("index.php?do=news");
    break;
    case 'goodsub':
        $post['num'][$_GET['id']]="num-1";
        update($post,"blog_t7");
        $sqlpost['sql']="user='".$_SESSION['acc']."' and blog=".$_GET['id'];
        delete($sqlpost,"good_t11");
        plo("index.php?do=news");
    break;
    case 'popadd':
        $post['num'][$_GET['id']]="num+1";
        update($post,"blog_t7");
        $goodpost['user']=$_SESSION['acc'];
        $goodpost['blog']=$_GET['id'];
        insert($goodpost,"good_t11");
        plo("index.php?do=pop");
    break;
    case 'popsub':
        $post['num'][$_GET['id']]="num-1";
        update($post,"blog_t7");
        $sqlpost['sql']="user='".$_SESSION['acc']."' and blog=".$_GET['id'];
        delete($sqlpost,"good_t11");
        plo("index.php?do=pop");
    break;
    case 'vote':
        update($_POST,"vote_t13");
        plo("index.php?do=que");
    break;
    case 'del_member':
        delete($_POST,"user_t6");
        plo("index.php?do=admin_user");
    break;
    case 'admin_news':
        update($_POST,"blog_t7");
        delete($_POST,"blog_t7");
        plo("index.php?do=admin_news");
    break;
    case 'addque':
        $title_ary['text']=$_POST['title'];  //取得title data
        insert($title_ary,"vote_t13");   //新增title to sql
        $result=select("vote_t13","text='".$_POST['title']."'");    //查title的id
        foreach($result as $row) $theid=$row['id'];     //取得id
        for($i=0;$i<count($_POST['text']);$i++){
            $newpost['text']=$_POST['text'][$i];
            $newpost['parent']=$theid;
            insert($newpost,"vote_t13");   //新增title to sql
        }
        plo("index.php?do=admin_que");
    break;
}
?>
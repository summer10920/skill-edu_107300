<?php
include "sql.php";

switch ($_GET['do']) {
    case 'login':
        $result=select("admin_t3","acc='".$_POST['acc']."' and pwd='".$_POST['pwd']."'");
        if($result==null) echo "<script>alert('帳號或密碼輸入錯誤');window.history.back();</script>";
        else {
            $_SESSION['admin']=$_POST['acc'];
            plo("admin.php");
        }
    break;
    case 'addslider':
        $_POST['img']=addfile($_FILES);
        insert($_POST,"slider_t5");
        plo("admin.php?do=admin&redo=rr");
    break;
    case 'slider':
        $newpost['once']=$_POST['once'];
        update($newpost,"effect_t5");
        unset($_POST['once']);
        update($_POST,"slider_t5");
        delete($_POST,"slider_t5");
        plo("admin.php?do=admin&redo=rr");
    break;
    case 'addmovie':
        $_POST['date']=$_POST['partdate'][0]."-".$_POST['partdate'][1]."-".$_POST['partdate'][2];
        unset($_POST['partdate']);
        $_POST['img']=addfile($_FILES['img']);
        $_POST['video']=addfile($_FILES['video']);
        insert($_POST,"movie_t7");
        plo("admin.php?do=admin&redo=vv");
    break;
    case 'movie':
        update($_POST,"movie_t7");
        delete($_POST,"movie_t7");
        plo("admin.php?do=admin&redo=vv");
    break;
    case 'mdymovie':
        $_POST['date'][$_GET['id']]=$_POST['partdate'][0]."-".$_POST['partdate'][1]."-".$_POST['partdate'][2];
        unset($_POST['partdate']);
        if(!empty($_FILES['img']['name'])) $_POST['img'][$_GET['id']]=addfile($_FILES['img']);
        if(!empty($_FILES['video']['name'])) $_POST['video'][$_GET['id']]=addfile($_FILES['video']);
        update($_POST,"movie_t7");
        plo("admin.php?do=admin&redo=vv");
    break;
    case 'getdate':
        $result=select("movie_t7","id=".$_POST['idx']); //只會一筆，所以找[0]即可
        // echo $on_day."|".$result[0]['date']."<br>"; //前者三天前，後者為上傳日。後者>前者才成立
        $days=(strtotime($result[0]['date'])-strtotime($on_day))/3600/24; //兩者相差
        echo "<option value='".date("Y-m-d")."' selected>".date("Y-m-d")."</option>";
        for($i=1;$i<=$days;$i++){
            $date=date("Y-m-d",strtotime("+".$i."day"));
            echo "<option value='".$date."'>".$date."</option>";
        }
    break;
    case 'gettime':
        $result=select("book_t8","movie=".$_POST['movie']." and date='".$_POST['date']."'"); 
        $ary=array();
        foreach($result as $row) $ary[$row['time']]+=count(unserialize($row['seat'])); //字串轉回陣列
        print_r($ary);
        echo $start=(date("H")>14&&$_POST['today'])?floor(date("H")/2-6):0; 
        //if nowtime pm3 -> 15/2-6=1(無條件捨去) -> se_time[1]=1600~1800
        for($i=$start;$i<5;$i++){
            $total=20-$ary[$i];
            echo "<option value='".$i."'>".$se_time[$i]. "剩餘座位 ".$total."</option>";
        }
    break;
    case 'order':
        $_POST['seat']=serialize($_POST['seat']);
        // print_r($_POST);
        insert($_POST,"book_t8");
        $insert_id=insertid();
        plo("booking.php?do=step3&id=".$insert_id);
    break;
    case 'delbook':
        $post['sql']='id='.$_GET['id'];
        delete($post,"book_t8");
        plo("admin.php?do=admin&redo=order");
        break;
    case 'delmanyodr':
        if($_POST['switem']==1) $post['sql']="date='".$_POST['date']."'";
        else $post['sql']="movie=".$_POST['movie'];
        print_r($post);
        delete($post,"book_t8");
        plo("admin.php?do=admin&redo=order");
    break;
}
?>
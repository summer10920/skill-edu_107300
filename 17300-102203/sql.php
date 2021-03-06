<?php  
/*********************前段為公用*************************/
//修正系統時間
date_default_timezone_set('Asia/Taipei');
//連結SQL
$dblink=new PDO("mysql:host=localhost;dbname=php_q3;charset=utf8","root","");

//PHP 轉址
function plo($link){
    return header("location:".$link);
}
//JS 轉址
function jlo($link){//q3改版，拿掉script
    return "location.href='".$link."'";
}
//select sql
function select($table,$sql){
    global $dblink;
    // echo "select * from ".$table." where ".$sql;
    if($sql) return $dblink->query("select * from ".$table." where ".$sql)->fetchAll();
    else return $dblink->query("select * from ".$table)->fetchAll();
}

//q3改版，分頁導航做成array  這裡可以再簡化，減少前端的code
function page_link($table,$sql,$range,$now_page){
    $total=count(select($table,$sql));
    $page_many=ceil($total/$range);
    $pagelink['<']=($now_page==1)?1:$now_page-1;
    for($i=1;$i<=$page_many;$i++) $pagelink[$i]=$i;
    $pagelink['>']=($now_page==$page_many)?$now_page:$now_page+1;
    return $pagelink;
}

//insret sql，單筆
function insert($post,$table){
    global $dblink;
    $insertA="id,";
    $insertB="'null',";
    foreach($post as $name=>$data) {
        $insertA.="".$name.",";
        $insertB.="'".$data."',";
    }
    $sql="insert into ".$table." (".substr($insertA,0,-1).") values(".substr($insertB,0,-1).")";
    echo $sql;
    return $dblink->exec($sql);
}
//find last insert's id
function insertid(){
    global $dblink;
    return $dblink->lastInsertId();
}
//update sql
function update($post,$table){
    global $dblink;
    foreach($post as $name=>$data) {
        switch($name){
            case 'dpy':
                if(!is_array($data)){   //非array為radio性質且單值，所以就要清全部再補1
                    $dblink->exec("update ".$table." set dpy='0' where 1");
                    $dblink->exec("update ".$table." set dpy='1' where id=".$data);
                }
                else{
                    foreach($data as $idx=>$value){ //array=checkbox性質，前端都做成全部提交記錄是0還是1
                        $dblink->exec("update ".$table." set dpy=".$value." where id=".$idx);
                    }
                }
            break;
            case 'once': //一次性資料，沒有索引所以是where 1
                $dblink->exec("update ".$table." set once='".$data."' where 1");
            break;
            default:
                foreach($data as $idx=>$value) {
                $value=(substr($value,0,-2)=="num")? $value : "'".$value."'";    //如果num後面有2個字(+1 or-1)則為算式就不要引號
                $dblink->exec("update ".$table." set ".$name."=".$value." where id=".$idx);
            }
        }
    }
}
//delete sql
function delete($post,$table){
    global $dblink;
    foreach($post as $name=>$data) {
        switch ($name){
            case 'del':
                if(!is_array($data)) return $dblink->exec("delete from ".$table." where id=".$data);
                else foreach($data as $value) $dblink->exec("delete from ".$table." where id=".$value);
            break;
            case 'sql':
                return $dblink->exec("delete from ".$table." where ".$data);
            break;
        }
    }
}
//add file
function addfile($file){    //改版本，不用拆解，丟進來之前，前端先指定array。上傳一律到upload
    $name=date("YmdHis")."_".$file["name"]; //前綴時間命名
    copy($file["tmp_name"], "upload/".$name);
    return $name;
}
?>
<?php
/*********************後為Q3使用*************************/
//使用session
session_start();

//for t3
$admin_zone = (!empty($_GET['do'])&&!empty($_GET['redo'])) ? $_GET['do']."_".$_GET['redo'] : "admin_main";
$admin_menu = (empty($_SESSION['admin'])) ? "" : '<div class="ct a rb" style="position:relative; width:101.5%; left:-1%; padding:3px; top:-9px;"><a href="#">網站標題管理</a>| <a href="#">動態文字管理</a>| <a href="?do=admin&redo=rr">預告片海報管理</a>| <a href="?do=admin&redo=vv">院線片管理</a>| <a href="?do=admin&redo=order">電影訂票管理</a></div>';

//for t6 t8
$on_day=date("Y-m-d",strtotime("-2day"));

//for t8 t9
$se_time=["14:00~16:00","16:00~18:00","18:00~20:00","20:00~22:00","22:00~24:00"];
?>

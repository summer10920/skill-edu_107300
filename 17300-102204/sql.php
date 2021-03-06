<?php  
/*********************前段為公用*************************/
//修正系統時間
date_default_timezone_set('Asia/Taipei');
//連結SQL
$dblink=new PDO("mysql:host=localhost;dbname=php_q4;charset=utf8","root","");

//PHP 轉址
function plo($link){
    return header("location:".$link);
}
//JS 轉址
function jlo($link){//改版，拿掉script
    return "location.href='".$link."'";
}
//select sql
function select($table,$sql){
    global $dblink;
    // echo "select * from ".$table." where ".$sql;     //有問題就echo出來看
    if($sql) return $dblink->query("select * from ".$table." where ".$sql)->fetchAll();
    else return $dblink->query("select * from ".$table)->fetchAll();
}

//分頁導航做成array  這裡可以再簡化，減少前端的code
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
/*********************後為Q4使用*************************/
//使用session
session_start();
/*
2個原版型index.php與admin.php修改幅度不大
本題大部分都是新建之版型php，所以任何語法直接寫在原頁就好
因此不會特地放在這裡多一步驟。
*/
?>

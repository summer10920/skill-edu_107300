<?php  
/*********************前段為公用*************************/
//修正系統時間
date_default_timezone_set('Asia/Taipei');
//連結SQL
$dblink=new PDO("mysql:host=localhost;dbname=php_q1;charset=utf8","root","");

//PHP 轉址
function plo($link){
    return header("location:".$link);
}
//JS 轉址
function jlo($link){
    return "<script>document.location.href='".$link."'</script>";
}
//select sql
function select($table,$sql){
    global $dblink;
    if($sql) return $dblink->query("select * from ".$table." where ".$sql)->fetchAll();
    else return $dblink->query("select * from ".$table)->fetchAll();
}
//分頁導航做成array
function page_link($table,$sql,$range,$now_page){
    $total=count(select($table,$sql));
    $page_many=ceil($total/$range);
    $pagelink['<']=($now_page==1)?1:$now_page-1;
    for($i=1;$i<=$page_many;$i++) $pagelink['num'][]=$i;
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
    return $dblink->exec($sql);
}
//insret sql，多筆且只對new_開頭有反應 (by q1 use)
function inserts_new($post,$table){
    global $dblink;
    foreach($post as $name=>$data) {
        if(substr($name,0,3)=="new") $new_ary[]=substr($name,4,0)[$data];
    }
    return $new_ary;
}
//update sql
function update($post,$table){
    global $dblink;
    foreach($post as $name=>$data) {
        switch($name){
            case 'dpy':
                if(!is_array($data)){   //非array=radio性質且單值，所以就要清全部再補1
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
                foreach($data as $idx=>$value) $dblink->exec("update ".$table." set ".$name."='".$value."' where id=".$idx);
        }
    }
}
//delete sql
function delete($post,$table){
    global $dblink;
    foreach($post as $name=>$data) {
        if($name=="del"){
            if(!is_array($data)) return $dblink->exec("delete from ".$table." where id=".$data);
            else foreach($data as $value) $dblink->exec("delete from ".$table." where id=".$value);
        }
    }
}
//add file
function addfile($file){
    $name=date("YmdHis")."_".$file["file"]["name"]; //前綴時間命名
    copy($file["file"]["tmp_name"], "img/".$name);
    return $name;
}
?>
<?php
/*********************後為Q1使用*************************/
//使用session
session_start();

//是否登入來做按鈕的顯示方式
if(empty($_SESSION['admin'])){
    $btn="管理登入";
    $btnlink="login.php";
}
else{
    $btn="回後台管理";
    $btnlink="admin.php";
}
//for t3
$result=select("title_t3","dpy=1");
foreach($result as $row){
    $title_img="img/".$row["file"];
    $title_text=$row["text"];
}
//for t4
$maqe_text="";
$result=select("maqe_t4","dpy=1");
foreach($result as $row){
    $maqe_text.=$row["text"]."　　";
}
//for t5
$result=select("mvim_t5","dpy=1");
foreach($result as $row){
    $mvim_ary[]="img/".$row["file"];
}
//for t6
$result=select("img_t6","dpy=1");
foreach($result as $row){
    $img_ary[]="img/".$row["file"];
}
//for t7
$result=select("total_t7",1);
foreach($result as $row){
    $total_num=$row["once"];
}
if(empty($_SESSION['who'])) {
    $_SESSION['who']=87;
    $newtotal['once']=$total_num+1;
    update($newtotal,"total_t7");
    
    $result=select("total_t7",1);
    foreach($result as $row){
        $total_num=$row["once"];
    }
}
//for t8
$result=select("footer_t8",1);
foreach($result as $row){
    $bottom_text=$row["once"];
}
//for t9 to index.php
$news_total=count(select("news_t9","dpy=1"));
$result=select("news_t9","dpy=1 limit 5");
foreach($result as $row){
    $news_text[]=$row["text"];
}
//for t12
$result=select("menu_t12","dpy=1 and parent=0");
$menu_text="";
foreach($result as $row){
    $menu_text.='
                        <div class="mainmu">
                            <a style="color:#000; font-size:13px; text-decoration:none;" href="'.$row['link'].'">'.$row['text'].'</a>
    ';
    $sub=select("menu_t12","dpy=1 and parent=".$row['id']);
    if(!empty($sub))
        foreach($sub as $row) 
            $menu_text.='<div class="mainmu2 mw" style="display:none"><a style="color:#000; font-size:13px; text-decoration:none;" href="'.$row['link'].'">'.$row['text'].'</a></div>';
    $menu_text.='
                        </div>
    ';
}
// <div class="mainmu">
//     <a href="admin.php">網站標題管理</a>
//         <div class="mainmu2 mw" style="display:none"><a href="admin.php">網站標題管理</a></div>
//         <div class="mainmu2 mw" style="display:none"><a href="admin.php">網站標題管理</a></div>
//     </a>
// </div>
?>
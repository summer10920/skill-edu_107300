<fieldset>
<?php
$layout=0;//初始
if(!empty($_GET['join'])) $layout=1;//投票
if(!empty($_GET['final'])) $layout=2;//結果
switch($layout){
    case 0:
    $result=select("vote_t13","parent=0");
?>
        <legend>目前位置 : 首頁 > 問卷調查</legend>
        <table width=100% cellpadding=5>
            <tr>
                <td>編號</td><td>問卷題目</td><td>投票總數</td><td>結果</td><td>狀態</td>
            </tr>
<?php
    $login_state="";
    $i=1;
    foreach($result as $row){
    if(!empty($_SESSION['acc'])) $login_state="<a href='?do=que&join=".$row['id']."&title=".$row['text']."'>參與投票</a>";
    else $login_state="請先登入";

    $get_num=select("vote_t13","parent=".$row['id']);
    $total_num=0;
    $que_title=$row['text'];
    foreach($get_num as $value) $total_num+=$value['num'];
?>
            <tr>
                <td><?=$i?></td>
                <td><?=$row['text']?></td>
                <td><?=$total_num?></td>
                <td><a href="?do=que&final=<?=$row['id']?>&title=<?=$que_title?>&total=<?=$total_num?>">結果</a></td>
                <td><?=$login_state?></td>
            </tr>
<?php
        $i++;
    }
?>
        </table>
<?php
    break;
    case 1:
    $result=select("vote_t13","parent=".$_GET['join']);
?>
        <legend>目前位置 : 首頁 > 問卷調查 > <?=$_GET['title']?></legend>
        <h5><?=$_GET['title']?></h5>
        <form method=post action='api.php?do=vote'>
<?php
    foreach($result as $row) echo "<input type=radio name=num[".$row['id']."] value=num+1>".$row['text']."<br>";
?>
        <input type=submit value=我要投票>
        </form>
<?php
    break;
    case 2:
    $result=select("vote_t13","parent=".$_GET['final']);
?>
        <legend>目前位置 : 首頁 > 問卷調查 > <?=$_GET['title']?></legend>
        <table cellpadding=5>
<?php
    $i=1;
    foreach($result as $row){
        $pse=($_GET['total']!=0)?($row['num']/$_GET['total']*100):0;

?>
            <tr>
                <td width=30%><?=$i?>. <?=$row['text']?></td>
                <td><div style="width:<?=$pse?>px;height:1em;background:#222;display:inline-block;"></div><?=$row['num']?>票(<?=$pse?>)%</td>
            </tr>
<?php
        $i++;
    }
?>
            <tr class="ct">
                <td colspan=2><a href="?do=que"><button>返回</button></a></td>
            </tr>
        </table>
<?php
    break;
}
?>
</fieldset>




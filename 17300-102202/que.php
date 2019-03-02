<?php
$layout=0;
if(!empty($_GET['vote'])) $layout=1;
if(!empty($_GET['show'])) $layout=2;
switch ($layout) {
    case 0:
            ?>
            <fieldset>
            <legend>目前位置:首頁＞問卷調查</legend>
            <table width=100%>
                <tr><td>編號</td><td>問卷題目</td><td>投票總數</td><td>結果</td><td>狀態</td></tr>
            <?php
            $result=select("t13_vote","parent=0");
            foreach($result as $row){
                $check=select("t13_vote","parent=".$row['id']);
                $total=0;
                foreach($check as $num) $total+=$num['num'];

                $votebtn=(empty($_SESSION['user']))?"請先登入":"<a href='?do=que&vote=".$row['id']."&title=".$row['text']."'>參與投票</a>"
            ?> 
                <tr>
                    <td><?=$row['id']?></td>
                    <td><?=$row['text']?></td>
                    <td><?=$total?></td>
                    <td><a href="?do=que&show=<?=$row['id']?>&title=<?=$row['text']?>&total=<?=$total?>">結果</a></td>
                    <td><?=$votebtn?></td>
                </tr>
            <?php
            }
            ?>
            </table>
            </fieldset>
            <?php
    break;
    case 1:
            ?>
            <fieldset>
            <legend>目前位置:首頁＞問卷調查＞<?=$_GET['title']?></legend>
            <h3><?=$_GET['title']?></h3>
            <form action="api.php?do=vote" method="post">
            <?php
            $result=select("t13_vote","parent=".$_GET['vote']);
            foreach($result as $row) echo '<input type="radio" name="num+1" value='.$row['id'].'>'.$row['text'].'<br>';
            ?>
            <input type="submit" value="我要投票">
            </form>
            </fieldset>
            <?php
    break;
    case 2:
            ?>
            <fieldset>
            <legend>目前位置:首頁＞問卷調查＞<?=$_GET['title']?></legend>
            <h3><?=$_GET['title']?></h3>
            <ol>
            <table cellpadding=10>
            <?php
            $result=select("t13_vote","parent=".$_GET['show']);
            foreach($result as $row) {
                $pse=($_GET['total']!=0)?($row['num']/$_GET['total']*100):0;
            ?>
                <tr>
                    <td width=400><li><?=$row['text']?></li></td>
                    <td><div style="width:<?=$pse?>px;height:1em;background:#222;display:inline-block;"></div><?=$row['num']?>票 (<?=$pse?>%)</td>
                </tr>
            <?php
            }
            ?>
            </table>
            </ol>
            </fieldset>
            <?php
    break;
}
?>


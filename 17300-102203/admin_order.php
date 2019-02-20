<form action="api.php?do=delmanyodr" method="post">
    <div style="width:100%;height:430px;overflow-y:scroll">
    <input type="radio" name="switem" value="1" required>依據日期
    <input type="text" name="date">
    <input type="radio" name="switem" value="2">依據電影名稱
    <select name="movie" required>
<?php
    $result=select("book_t8","1 order by id desc");
    $movie=select("movie_t7",0);
    foreach ($movie as $row) echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';
?>
    </select>
    <input type="submit" value="刪除">
</form>
<hr>

        <table width="100%" class="vvlist">
            <tr>
                <td>訂單編號</td><td>電影名稱</td><td>日期</td><td>場次時間</td><td>訂購數量</td><td>訂購位置</td><td>操作</td>
            </tr>
<?php
    foreach($result as $row){
        $seat=unserialize($row['seat']);
?>
            <tr>
                <td>
                    <?=date("Ymd",strtotime($row['date'])).str_pad($row['id'],4,'0',STR_PAD_LEFT)?>
                </td>
                <td>
                    <?php $moviename=select("movie_t7","id=".$row['movie']);?>
                    <?=$moviename[0]['title']?>
                </td>
                <td>
                    <?=$row['date']?>
                </td>
                <td>
                    <?=$se_time[$row['time']]?>
                </td>
                <td>
                    <?=count($seat)?>
                </td>
                <td>
                    <?php foreach($seat as $value) echo (floor($value/5)+1)."排".($value%5)."號<br>"; //flloor=無條件捨,%=餘數?>
                </td>
                <td><input type="button" value="刪除" onclick="<?=jlo('api.php?do=delbook&id='.$row['id'])?>"></td>
            </tr>
<?php
    }
?>
        </table>
    </div>
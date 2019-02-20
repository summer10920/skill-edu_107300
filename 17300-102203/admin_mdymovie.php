<?php
$result=select("movie_t7","id=".$_GET['id']);
foreach($result as $row){
list($yy,$mm,$dd)=preg_split('/-/',$row['date']);//忽略'-'值，拆成年月日
echo $yy;
?>
<form action="api.php?do=mdymovie&id=<?=$row['id']?>" method="post" enctype="multipart/form-data">
<table width="100%">
    <tr>
        <td rowspan=8 valign=top>影片資料</td>
        <td>片　　名：</td>
        <td><input type="text" name="title[<?=$row['id']?>]" style="width:100%" value="<?=$row['title']?>"></td>
    </tr>
    <tr>
        <td>分　　級：</td>
        <td>
            <select name="cls[<?=$row['id']?>]" required>
                <option value="">請選擇分級</option>
                <option value="1" <?=$row['cls']==1?"selected":""?>>普遍級</option>
                <option value="2" <?=$row['cls']==2?"selected":""?>>保護級</option>
                <option value="3" <?=$row['cls']==3?"selected":""?>>輔導級</option>
                <option value="4" <?=$row['cls']==4?"selected":""?>>限制級</option>
            </select> (普遍級、保護級、輔導級、限制級)
        </td>
    </tr>
    <tr>
        <td>片　　長：</td>
        <td><input type="text" name="length[<?=$row['id']?>]" style="width:100%" value="<?=$row['length']?>"></td>
    </tr>
    <tr>
        <td>上映日期</td>
        <td>
            <select name="partdate[]" required>
                <option value="">西元年</option>
                <?php for($i=2019;$i<2025;$i++) {?>
                    <option value="<?=$i?>" <?=$yy==$i?"selected":""?>><?=$i?></option>
                <?php }?>
            </select>年
            <select name="partdate[]" required>
                <option value="">月份</option>
                <?php for($i=1;$i<13;$i++) {?>
                    <option value="<?=$i?>" <?=$mm==$i?"selected":""?>><?=$i?></option>
                <?php }?>
            </select>月
            <select name="partdate[]" required>
                <option value="">日期</option>
                <?php for($i=1;$i<32;$i++) {?>
                    <option value="<?=$i?>" <?=$dd==$i?"selected":""?>><?=$i?></option>
                <?php }?>
            </select>日
        </td>
    </tr>
    <tr>
        <td>發 行 商：</td>
        <td><input type="text" name="corp[<?=$row['id']?>]" style="width:100%" value="<?=$row['length']?>"></td>
    </tr>
    <tr>
        <td>導　　演：</td>
        <td><input type="text" name="maker[<?=$row['id']?>]" style="width:100%" value="<?=$row['maker']?>"></td>
    </tr>
    <tr>
        <td>預告影片：</td>
        <td><input type="file" name="video" style="width:100%"><br><span style="color:#f00">檔案請使用英文檔名</span></td>
    </tr>
    <tr>
        <td>電影海報：</td>
        <td><input type="file" name="img" style="width:100%"><br><span style="color:#f00">檔案請使用英文檔名</span></td>
    </tr>
    <tr>
        <td valign=top>劇情簡介</td>
        <td colspan=2>
            <textarea name="text[<?=$row['id']?>]" style="width:100%"><?=$row['text']?></textarea>
        </td>
    </tr>
</table>
<div class="ct"><input type="submit" value="修改確定"><input type="reset" value="重置"></div>
</form>
<?php
}
?>
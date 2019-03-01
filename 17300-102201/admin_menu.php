<p class="t cent botli">選單管理</p>
<form action="api.php?do=mdymenu" method="post">
    <table width="100%">
    	<tr class="yel">
        	<td width="34%">主選單名稱</td><td width="34%">選單連結網址</td><td>次選單數</td><td width="7%">顯示</td><td width="7%">刪除</td><td></td>
        </tr>
<?php
    $result=select("t12_menu","parent=0");
    foreach ($result as $row){
        $son=select("t12_menu","parent=".$row['id']);
?>
        <tr>
            <td><input type="text" name="title[<?=$row['id']?>]" value="<?=$row['title']?>" style="width:90%"></td>
            <td><input type="text" name="link[<?=$row['id']?>]" value="<?=$row['link']?>" style="width:90%"></td>
            <td><?=count($son)?></td>
            <input type="hidden" name="dpy[<?=$row['id']?>]" value=0>
            <td><input type="checkbox" name="dpy[<?=$row['id']?>]" <?=($row['dpy']==1)?"checked":""?> value=1></td>
            <td><input type="checkbox" name="del[]" value="<?=$row['id']?>"></td>
            <td><input type="button" value="編輯次選單" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;view.php?do=submenu&id=<?=$row['id']?>&#39;)"></td>
        </tr>
<?php
}
?>
    </table>
    <table style="margin-top:40px; width:70%;">
     <tbody><tr>
      <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;view.php?do=addmenu&#39;)" value="新增主選單"></td>
      <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
     </tr>
    </tbody></table>    
</form>
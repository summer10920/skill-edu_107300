<p class="t cent botli">動態文字廣告管理</p>
<form action="api.php?do=mdymaqe" method="post">
    <table width="100%">
    	<tr class="yel">
        	<td width="68%">動態文字廣告</td><td width="7%">顯示</td><td width="7%">刪除</td>
                    </tr>
<?php
    $result=select("t4_maqe",1);
    foreach ($result as $row){
?>
    <tr>
        <td><input type="text" name="text[<?=$row['id']?>]" value="<?=$row['text']?>" style="width:90%"></td>
        <input type="hidden" name="dpy[<?=$row['id']?>]" value=0>
        <td><input type="checkbox" name="dpy[<?=$row['id']?>]" <?=($row['dpy']==1)?"checked":""?> value=1></td>
        <td><input type="checkbox" name="del[]" value="<?=$row['id']?>"></td>
    </tr>
<?php
}
?>
</table>
           <table style="margin-top:40px; width:70%;">
     <tbody><tr>
      <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;view.php?do=addmaqe&#39;)" value="新增網站標題圖片"></td>
      <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
     </tr>
    </tbody></table>    
    </form>
<p class="t cent botli">動畫圖片管理</p>
<form action="api.php?do=mdymvim" method="post">
    <table width="100%">
    	<tr class="yel">
        	<td width="68%">動畫圖片</td><td width="7%">顯示</td><td width="7%">刪除</td><td></td>
                    </tr>
<?php
    $result=select("t5_mvim",1);
    foreach ($result as $row){
?>
    <tr>
        <td><embed src="upload/<?=$row['file']?>" width=300></td>
        <input type="hidden" name="dpy[<?=$row['id']?>]" value=0>
        <td><input type="checkbox" name="dpy[<?=$row['id']?>]" <?=($row['dpy']==1)?"checked":""?> value=1></td>
        <td><input type="checkbox" name="del[]" value="<?=$row['id']?>"></td>
        <td><input type="button" value="更換動畫" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;view.php?do=chgmvim&id=<?=$row['id']?>&#39;)"></td>
    </tr>
<?php
}
?>
</table>
           <table style="margin-top:40px; width:70%;">
     <tbody><tr>
      <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;view.php?do=addmvim&#39;)" value="新增動畫影片"></td>
      <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
     </tr>
    </tbody></table>
</form>
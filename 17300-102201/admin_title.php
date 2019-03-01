<p class="t cent botli">網站標題管理</p>
<form action="api.php?do=mdytitle" method="post">
    <table width="100%">
    	<tr class="yel">
        	<td width="45%">網站標題</td><td width="23%">替代文字</td><td width="7%">顯示</td><td width="7%">刪除</td><td></td>
                    </tr>

<?php
    $result=select("t3_title",1);
    foreach ($result as $row){
?>
    <tr>
        <td><img src="upload/<?=$row['img']?>" width=300 height=30></td>
        <td><input type="text" name="title[<?=$row['id']?>]" value="<?=$row['title']?>"></td>
        <td><input type="radio" name="dpy" <?=($row['dpy']==1)?"checked":""?> value=<?=$row['id']?>></td>
        <td><input type="checkbox" name="del[]" value="<?=$row['id']?>"></td>
        <td><input type="button" value="更新圖片" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;view.php?do=chgtitle&id=<?=$row['id']?>&#39;)"></td>
    </tr>
<?php
}
?>
</table>
           <table style="margin-top:40px; width:70%;">
     <tbody><tr>
      <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;view.php?do=addtitle&#39;)" value="新增網站標題圖片"></td>
      <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
     </tr>
    </tbody></table>    
    </form>


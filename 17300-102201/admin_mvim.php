<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
                                    <p class="t cent botli">動畫圖片管理</p>
        <form method="post" action="api.php?do=mvim">
    <table width="100%">
    	<tbody><tr class="yel">
        	<td width="68%">動畫圖片</td><td width="7%">顯示</td><td width="7%">刪除</td><td></td>
                    </tr>
    </tbody>
<?php
$result=select("mvim_t5",0);
foreach($result as $row){
?>
    <tr>
        <td class="cent"><embed src="img/<?=$row['file']?>" width=50%></td>
        <td>
            <input type=hidden value=0 name=dpy[<?=$row['id']?>]>
            <input type=checkbox value=1 name=dpy[<?=$row['id']?>] <?=($row["dpy"])?"checked":""?>>
        </td>
        <td><input type=checkbox value=<?=$row['id']?> name=del[]></td>
        <td><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;view.php?do=mdy_mvim&id=<?=$row['id']?>&#39;)" value="更換動畫"></td>
    </tr>
<?php
}
?>
    </table>
           <table style="margin-top:40px; width:70%;">
     <tbody><tr>
      <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;view.php?do=add_mvim&#39;)" value="新增動畫圖片"></td><td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
     </tr>
    </tbody></table>    

        </form>
</div>
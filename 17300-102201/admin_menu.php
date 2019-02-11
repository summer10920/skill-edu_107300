<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
                                    <p class="t cent botli">選單管理</p>
        <form method="post" action="api.php?do=menu">
    <table width="100%">
    	<tbody><tr class="yel">
        	<td width="33%">主選單名稱</td><td width="33%">選單連結網址</td><td width="10%">次選單數</td><td width="7%">顯示</td><td width="7%">刪除</td><td></td>
                    </tr>
    </tbody>
<?php
$result=select("menu_t12","parent=0");
foreach($result as $row){
?>
    <tr>
        <td><input type=text value=<?=$row['text']?> name=text[<?=$row['id']?>] style="width:90%"></td>
        <td><input type=text value=<?=$row['link']?> name=link[<?=$row['id']?>] style="width:90%"></td>
        <td><?=count(select("menu_t12","parent=".$row['id']))?></td>
        <td>
            <input type=hidden value=0 name=dpy[<?=$row['id']?>]>
            <input type=checkbox value=1 name=dpy[<?=$row['id']?>] <?=($row["dpy"])?"checked":""?>>
        </td>
        <td><input type=checkbox value=<?=$row['id']?> name=del[]></td>
        <td><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;view.php?do=mdy_menu&id=<?=$row['id']?>&#39;)" value="編輯次選單"></td>
    </tr>
<?php
}
?>
    </table>
           <table style="margin-top:40px; width:70%;">
     <tbody><tr>
      <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;view.php?do=add_menu&#39;)" value="新增主選單"></td><td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
     </tr>
    </tbody></table>    

        </form>
                                    </div>
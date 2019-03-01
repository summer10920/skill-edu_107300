<p class="t cent botli">管理者帳號管理</p>
<form action="api.php?do=mdyadmin" method="post">
    <table width="100%">
    	<tr class="yel">
        	<td width="34%">帳號</td><td width="34%">密碼</td><td width="14%">刪除</td>
        </tr>
<?php
    $result=select("t10_admin",1);
    foreach ($result as $row){
?>
    <tr>
        <td><input type="text" name="acc[<?=$row['id']?>]" value="<?=$row['acc']?>" style="width:90%"></td>
        <td><input type="text" name="pwd[<?=$row['id']?>]" value="<?=$row['pwd']?>" style="width:90%"></td>
        <td><input type="checkbox" name="del[]" value="<?=$row['id']?>"></td>
    </tr>
<?php
}
?>
</table>
           <table style="margin-top:40px; width:70%;">
     <tbody><tr>
      <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;view.php?do=addadmin&#39;)" value="新增管理者帳號"></td>
      <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
     </tr>
    </tbody></table>    
</form>

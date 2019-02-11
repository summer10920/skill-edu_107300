<?php //copy from admin_title ?>

<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
                                    <p class="t cent botli">管理者帳號管理</p>
        <form method="post" action="api.php?do=admin">
    <table width="100%">
    	<tbody><tr class="yel">
        	<td width="38%">帳號</td><td width="37%">密碼</td><td width="7%">刪除</td>
                    </tr>
    </tbody>
<?php
$result=select("admin_t10","1 limit 1, 999");//LIMIT沒有ALL值，所以給一個極大數字即可
foreach($result as $row){
?>
    <tr>
        <td><input type=text value=<?=$row['acc']?> name=acc[<?=$row['id']?>] style="width:90%"></td>
        <td><input type=password value=<?=$row['pwd']?> name=pwd[<?=$row['id']?>] style="width:90%"></td>
        <td><input type=checkbox value=<?=$row['id']?> name=del[]></td>
    </tr>
<?php
}
?>
    </table>
           <table style="margin-top:40px; width:70%;">
     <tbody><tr>
      <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;view.php?do=add_admin&#39;)" value="新增管理者帳號"></td><td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
     </tr>
    </tbody></table>    

        </form>
                                    </div>
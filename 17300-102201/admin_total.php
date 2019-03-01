<p class="t cent botli">進站總人數管理</p>
<form action="api.php?do=mdytotal" method="post">
    <table width="100%">
<?php
    $result=select("t7_total",1);
?>
    <tr>
        <td bgcolor=#ff0>進站總人數:</td>
        <td><input type="text" name="once" value="<?=$result[0]['once']?>" style="width:90%"></td>
    </tr>
<?php
?>
</table>
<table style="margin-top:40px; width:100%;">
     <tbody><tr>
      <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
     </tr>
</tbody></table>
</form>
<p class="t cent botli">頁尾版權資料管理</p>
<form action="api.php?do=mdyfooter" method="post">
    <table width="100%">
<?php
    $result=select("t8_footer",1);
?>
    <tr>
        <td bgcolor=#ff0>頁尾版權資料:</td>
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
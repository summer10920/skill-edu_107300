<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
                                    <p class="t cent botli">進站總人數管理</p>
        <form method="post" action="api.php?do=bottom">
    <table style="margin:auto">
<?php
$result=select("footer_t8",0);
foreach($result as $row){
?>
    <tr>
        <td align=right bgcolor=orange>頁尾版權資料：</td>
        <td><input type=text value="<?=$row['once']?>" name=once></td>
    </tr>
    <tr class="cent">
        <td colspan=2><input type=submit value=修改確定><input type=reset value=重置></td>
    </tr>
<?php
}
?>
    </table>
        </form>
</div>
<h3>修改頁尾版權區</h3>
<?php
    $result=select("footer_t11",0);
?>
<form action="api.php?do=mdyfooter" method="post">
    <p>
        頁尾宣告內容<input type="text" name="once" value="<?=$result[0]['once']?>"><br>
        <input type="submit" value="編輯"><input type="reset" value="重置">
    </p>
    
</form>
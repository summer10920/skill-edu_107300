<h3>修改分類</h3>
<?php
    $result=select("class_t4","id=".$_GET['id']);
?>
<form action="api.php?do=mdycls" method="post">
    <p>分類名稱<input type="text" name="title[<?=$_GET['id']?>]" value="<?=$result[0]['title']?>"><input type="submit" value="修改"></p>
</form>
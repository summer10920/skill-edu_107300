<?php
$product=select("product_t5","id=".$_GET['id']);    //查商品資料
$getson=select("class_t4","id=".$product[0]['cls']);   //查該商品自哪個class son
$getfa=select("class_t4","id=".$getson[0]['parent']);   //查該商品自哪個class father
?>
<h3>修改商品</h3>
<hr>
<form action="api.php?do=mdyproduct" method="post" enctype="multipart/form-data">
<table>
    <tr>
        <td>所屬大類</td>
        <td>
            <select id="fa" onchange="getson()">
<?php
$result=select("class_t4","parent=0");
foreach($result as $row) {
    $lockfa=($row['id']==$getfa[0]['id'])?"selected":"";    //自動select
    echo'<option value="'.$row['id'].'" '.$lockfa.'>'.$row['title'].'</option>';
}
?>
            </select>
        </td>
    </tr>
    <tr>
        <td>所屬中類</td>
        <td>
            <select name="cls[<?=$product[0]['id']?>]">
            </select>
        </td>
    </tr>
    <tr>
        <td>商品編號</td>
        <td>系統自動產生</td>
    </tr>
    <tr>
        <td>商品名稱</td>
        <td><input type="text" name="title[<?=$product[0]['id']?>]" value="<?=$product[0]['title']?>"></td>
    </tr>
    <tr>
        <td>商品價格</td>
        <td><input type="text" name="price[<?=$product[0]['id']?>]" value="<?=$product[0]['price']?>"></td>
    </tr>
    <tr>
        <td>規格</td>
        <td><input type="text" name="spec[<?=$product[0]['id']?>]" value="<?=$product[0]['spec']?>"></td>
    </tr>
    <tr>
        <td>庫存量</td>
        <td><input type="text" name="num[<?=$product[0]['id']?>]" value="<?=$product[0]['num']?>"></td>
    </tr>
    <tr>
        <td>商品圖片</td>
        <td><input type="hidden" name="id" value="<?=$product[0]['id']?>"><input type="file" name="img">可不選擇</td>
    </tr>
    <tr>
        <td>商品介紹</td>
        <td><textarea name="text[<?=$product[0]['id']?>]"><?=$product[0]['text']?></textarea></td>
    </tr>
    <tr>
        <td colspan=2>
            <input type="submit" value="修改">
            <input type="reset" value="重置">
            <input type="button" value="返回" onclick="window.history.back()">
        </td>
    </tr>
</table>
</form>
<script>
getson();
function getson(){
    idx=$('#fa').val();
    cls="<?=$getson[0]['id']?>";    //送參數到api處理自動select
    $.post("api.php?do=getson",{idx,cls},function(check){
        $('select[name="cls[<?=$product[0]['id']?>]"]').html(check);
    });
}

</script>

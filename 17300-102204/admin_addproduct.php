<h3>新增商品</h3>
<hr>
<form action="api.php?do=addproduct" method="post" enctype="multipart/form-data">
<table>
    <tr>
        <td>所屬大類</td>
        <td>
            <select id="fa" onchange="getson()">
<?php
$result=select("class_t4","parent=0");
foreach($result as $row) echo'<option value="'.$row['id'].'">'.$row['title'].'</option>';
?>
            </select>
        </td>
    </tr>
    <tr>
        <td>所屬中類</td>
        <td>
            <select name="cls">
            </select>
        </td>
    </tr>
    <tr>
        <td>商品編號</td>
        <td>系統自動產生</td>
    </tr>
    <tr>
        <td>商品名稱</td>
        <td><input type="text" name="title"></td>
    </tr>
    <tr>
        <td>商品價格</td>
        <td><input type="text" name="price"></td>
    </tr>
    <tr>
        <td>規格</td>
        <td><input type="text" name="spec"></td>
    </tr>
    <tr>
        <td>庫存量</td>
        <td><input type="text" name="num"></td>
    </tr>
    <tr>
        <td>商品圖片</td>
        <td><input type="file" name="img"></td>
    </tr>
    <tr>
        <td>商品介紹</td>
        <td><textarea name="text"></textarea></td>
    </tr>
    <tr>
        <td colspan=2>
            <input type="submit" value="新增">
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
    $.post("api.php?do=getson",{idx},function(check){
        $('select[name="cls"]').html(check);
    });
}

</script>

<form action="api.php?do=addque" method="post">
<fieldset>
    <legend>新增問卷</legend>
    問卷名稱<input type="text" name="title"><br>
    <div id="option">
        <p>選項<input type="text" name="text[]"></p>
    </div>
    <input type="button" value="更多" onclick="addop()">
    <input type="submit" value="新增">
    <input type="reset" value="清空">
</fieldset>
</form>
<script>
function addop(){
    data='<p>選項<input type="text" name="text[]"></p>';
    $("#option").append(data);
}
</script>
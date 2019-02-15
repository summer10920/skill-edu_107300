<fieldset>
    <legend>新增問卷</legend>
    <form action="api.php?do=addque" method="post">
    <table cellpadding=5 id="vote">
        <tr>
            <td>問卷名稱</td>
            <td><input type="text" name="title"></td>
        </tr>
        <tr>
            <td>選項</td>
            <td><input type="text" name="text[]"></td>
        </tr>
    </table>
    <input type="button" value=更多 onclick="add_option()">
    <input type="submit" value=新增>
    <input type="reset" value=清空>
</fieldset>
</form>

<script>
function add_option(){
    var data=`
        <tr>
            <td>選項</td>
            <td><input type="text" name="text[]"></td>
        </tr>
        `;
    $("#vote").append(data);
}
</script>




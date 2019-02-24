<h3 class="ct">會員註冊</h3>
<table bgcolor="#fff" cellpadding=10 width=100%>
    <tr>
        <td bgcolor="#f93" width=30%>姓名</td>
        <td bgcolor="#fc9" width=70%><input type="text" name="name" id=""></td>
    </tr>
    <tr>
        <td bgcolor="#f93">帳號</td>
        <td bgcolor="#fc9"><input type="text" name="acc" id="checkuser"><input type="button" value="檢查帳號" onclick="checkacc(0)"></td>
    </tr>
    <tr>
        <td bgcolor="#f93">密碼</td>
        <td bgcolor="#fc9"><input type="password" name="pwd" id=""></td>
    </tr>
    <tr>
        <td bgcolor="#f93">電話</td>
        <td bgcolor="#fc9"><input type="text" name="tel" id=""></td>
    </tr>
    <tr>
        <td bgcolor="#f93">住址</td>
        <td bgcolor="#fc9"><input type="text" name="addr" id=""></td>
    </tr>
    <tr>
        <td bgcolor="#f93">電子信箱</td>
        <td bgcolor="#fc9"><input type="text" name="mail" id=""></td>
    </tr>
    <tr class="ct">
        <td colspan=2><input type="button" value="送出" onclick="checkacc(1)"></td>
    </tr>
</table>
<script>
function checkacc(idx){
    acc=$("input[name='acc']").val();
    $.post("api.php?do=checkacc",{acc},function(check){
        switch (idx) {
            case 0:
                alert(check);
            break;
            case 1:
                if(check!="可使用此帳號")  alert(check);
                else {
                    name=$("input[name='name']").val();
                    pwd=$("input[name='pwd']").val();
                    tel=$("input[name='tel']").val();
                    addr=$("input[name='addr']").val();
                    mail=$("input[name='mail']").val();
                    $.post("api.php?do=adduser",{acc,name,pwd,tel,addr,mail},function(check){
                        alert("註冊完成，返回登入頁");
                        <?=jlo("?do=login")?>;
                    });
                }
            break;
        }
    });
}
</script>
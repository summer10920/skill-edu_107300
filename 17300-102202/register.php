<fieldset>
<legend>會員註冊</legend>
*請設定您要註冊的帳號及密碼(最長12個字元)
<form method=post>
<table>
    <tr>
        <td>Step1:登入帳號</td>
        <td><input name=acc></td>
    </tr>
    <tr>
        <td>Step2:登入密碼</td>
        <td><input name=pwd></td>
    </tr>
    <tr>
        <td>Step3:再次確認密碼</td>
        <td><input name=rpwd></td>
    </tr>
    <tr>
        <td>Step4:信箱(忘記密碼時使用)</td>
        <td><input name=mail></td>
    </tr>
    <tr>
        <td colspan=2><input type=button value=註冊 onclick="check_new()"><input type=reset value=清除></td>
    </tr>
</table>
</form>
</fieldset>
<script>
function check_new(){
    var acc=$("input[name=acc]").val();
    var pwd=$("input[name=pwd]").val();
    var rpwd=$("input[name=rpwd]").val();
    var mail=$("input[name=mail]").val();
    if(acc==""||pwd==""||rpwd==""||mail=="") alert("不可空白");
    else if(pwd!=rpwd) alert("密碼不一致");
    else
        $.post("api.php?do=reg",{acc,pwd,mail},function(check){
            alert(check);
        });
}
</script>
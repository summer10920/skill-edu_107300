<h3>第一次購物</h3>
<a href="?do=registr"><img src="img/0413.jpg"></a>
<h3>會員登入</h3>

<?php
    $num1=rand(10,99);
    $num2=rand(10,99);
    $ans=$num1+$num2;
    if(!empty($_SESSION['user'])) plo("index.php");
?>
<p>
    帳號 <input type="text" name="acc"><br>
    密碼 <input type="password" name="pwd"><br>
    驗證碼 <?=$num1?>+<?=$num2?>=<input type="text" name="ans">
</p>
<p class="ct">
    <input type="button" value="確認" onclick="submit()">
    <input type="button" value="返回" onclick=<?=jlo('index.php')?>>
</p>

<script>
function submit(){
    if($("input[name=ans]").val()!=<?=$ans?>) alert("對不起，您輸入的驗證有誤請您重新登入");
    else {
        acc=$("input[name=acc]").val();
        pwd=$("input[name=pwd]").val();
        $.post("api.php?do=userlogin",{acc,pwd},function(check){
            if(check=="fail") alert("帳號密碼錯誤");
            else <?=jlo("index.php")?>;
        });
    }
}
</script>
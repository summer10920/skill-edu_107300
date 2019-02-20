<?php if(!empty($_SESSION['admin'])) plo("admin.php")?>
<form action="api.php?do=login" method="post">
    <div class="ct" style="margin:100px 0">
        帳號：<input type="text" name="acc"><br><br>
        密碼：<input type="password" name="pwd"><br><br>
        <input type="submit" value="登入">
    </div>
</form>